<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageUploadedPreview extends Component
{

    public $items = [];

    public function mount($model)
    {
        if ($model instanceof HasMedia) { 
            $this->model = $model;
            $this->items = $model->getMedia();
        }

    }

    public function removeMedia($mediaId)
    {
        if($media = Media::find($mediaId)){
            $id = $media->id;
            $media->delete();
            $this->items = $this->items->where('id', '!=', $id);
        }

        if( count($this->items) === 0 ) {
            $this->dispatchBrowserEvent('emptyModelMedia');
        }
    }

    public function render()
    {
        return view('livewire.image-uploaded-preview');
    }
}
