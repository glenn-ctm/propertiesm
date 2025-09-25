<?php

namespace App\Models\Traits;

trait WithTemporaryMedia {
    public function updateMediaUploads($mediaediaIds = []) {
        $class = get_class($this);
        $id = $this->id;
        $mediaModel = config('media-library.media_model');

        $mappedIds = collect($mediaediaIds)->map(function ($id) {
            if( !is_numeric($id) ){
                return session()->pull("chunked_{$id}", 0);
            }
            return $id;
        })->toArray();

        $mediaModel::query()
            ->whereIn('id', $mappedIds)
            ->update([
                'model_type' => $class,
                'model_id' => $id,
            ]);
    }
}