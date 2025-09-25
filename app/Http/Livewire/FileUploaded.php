<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\TempMedia;

class FileUploaded extends Component
{

    public $collectionName = 'default';
    public $name = 'media';
    public $model = null;

    public $old = [];

    public function mount() {
        $this->old = old($this->name, []);
    }

    private function uploadedFiles() {

        if( $this->model instanceof HasMedia ) {
            return $this->model->media()->where('collection_name', $this->collectionName)->get();
        } else {
            return [];
        }
    }

    private function uploadedOldFiles() {
        if( !count($this->old) ) {
            return [];
        }

        $mappedIds = collect($this->old)->map(function ($id) {
            if( !is_numeric($id) ){
                return session()->get("chunked_{$id}", 0);
            }
            return $id;
        })->toArray();

        return Media::whereIn('id', $mappedIds)->get();
    }

    public function removeMedia($id) {

        if( !($this->model instanceof HasMedia) ) {
            return;
        }

        $this->model->media()
            ->where('id', $id)
            ->where('collection_name', $this->collectionName)
            ->delete();

        $this->dispatchBrowserEvent('removedMedia', [
                'id' => $id,
                'totalUploads' => $this->model->media()->where('collection_name', $this->collectionName)->count(),
            ]);
    }

    public function removeMediaOld($id) {

        if( !is_numeric($id) ){
            $id = session()->pull("chunked_{$id}", 0);
        }

        Media::where('model_type', TempMedia::class)
                ->where('id', $id)
                ->delete();

        $this->old = collect($this->old)->reject(function ($value, $key) use($id) {
            return intval($value) === $id;
        })->reject(function ($value, $key) {
            return $value === null;
        })->toArray();

        $this->dispatchBrowserEvent('removedMedia', [
                'id' => $id,
                'totalUploads' => count($this->old),
            ]);
    }

    public function render()
    {
        return view('livewire.file-uploaded', [
            'id' => $this->id,
            'uploadedFiles' => $this->uploadedFiles(),
            'uploadedOldFiles' => $this->uploadedOldFiles()
        ]);
    }
}
