<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\MediaLibrary\HasMedia;
class FileUpload extends Component
{
    public $isMultiple = false;
    public $name = 'media';
    public $autoUpload = true;
    public $collectionName = 'default';
    public $accepts = [
        'image/jpeg', 'image/png', 'image/gif',
        'audio/mpeg3', 'audio/wav',
        'video/mp4'
    ];

    public $model = null;

    public function render()
    {
        $old = collect(old($this->name, []))->filter()->toArray();
        return view('livewire.file-upload', [
            'id' => $this->id,
            'totalUploads' => $this->model instanceof HasMedia ? $this->model->media()->where('collection_name', $this->collectionName)->count() + count($old) : count($old),
        ]);
    }
}
