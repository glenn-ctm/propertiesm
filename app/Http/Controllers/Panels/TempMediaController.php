<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\TempMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class TempMediaController extends Controller
{
    protected $tmpDirectoryName = 'filepond_tmp';

    public function store(Request $request)
    {
        set_time_limit(0);

        $id = Str::random(40);

        if ( $request->hasHeader('Upload-Length') ) {
            Storage::makeDirectory("{$this->tmpDirectoryName}/{$id}");
            return response($id, 200);
        }

        $input = $request->file( $request->header('Upload-Input-Name', 'filepond') );

        if ($input === null) {
            return response('filepond is required', 422, [
                'Content-Type' => 'text/plain',
            ]);
        }

        $file = is_array($input) ? $input[0] : $input;

        if (! ($newFile = $file->storeAs("{$this->tmpDirectoryName}/{$id}", $file->getClientOriginalName(), 'local'))) {
            return response('Could not save file', 500);
        }

        $filePath = Storage::disk('local')->path($newFile);

        $media = TempMedia::create()->addMedia($filePath)->toMediaCollection($request->header('Upload-Collection-Name', 'default'));

        header('X-Content-Transfer-Id: ' . $media->id);

        return response($media->id, 200);

    }

    public function update(Request $request, $id)
    {
        set_time_limit(0);

        // location of patch files
        $dir = storage_path("app/{$this->tmpDirectoryName}/{$id}/");

        // exit if is get
        if ( $request->isMethod('head') ) {
            $patch = glob($dir . '.patch.*');
            $offsets = [];
            $size = '';
            $last_offset = 0;
            foreach ($patch as $filename) {
    
                // get size of chunk
                $size = filesize($filename);
    
                // get offset of chunk
                list($dir, $offset) = explode('.patch.', $filename, 2);
    
                // offsets
                array_push($offsets, $offset);
    
                // test if is missing previous chunk
                // don't test first chunk (previous chunk is non existent)
                if ($offset > 0 && !in_array($offset - $size, $offsets)) {
                    $last_offset = $offset - $size;
                    break;
                }
    
                // last offset is at least next offset
                $last_offset = $offset + $size;
            }
    
            return response('', 200, [
                'Upload-Offset' => $last_offset
            ]);
        }
    
        // get patch data
        $offset = $request->header('Upload-Offset', 0);
        $length = $request->header('Upload-Length', 0);
    
        // should be numeric values, else exit
        if (!is_numeric($offset) || !is_numeric($length)) {
            return response('', 400);
        }
    
        // get sanitized name
        $name = $this->sanitize_filename( $request->header('Upload-Name', 'Unknown') );
    
        // write patch file for this request
        file_put_contents($dir . '.patch.' . $offset, fopen('php://input', 'r'));
    
        // calculate total size of patches
        $size = 0;
        $patch = glob($dir . '.patch.*');
        foreach ($patch as $filename) {
            $size += filesize($filename);
        }
    
        // if total size equals length of file we have gathered all patch files
        if ($size == $length) {
    
            $filePath = $dir.$name;

            // create output file
            $file_handle = fopen($filePath, 'w');
    
            // write patches to file
            foreach ($patch as $filename) {
    
                // get offset from filename
                list($dir, $offset) = explode('.patch.', $filename, 2);
    
                // read patch and close
                $patch_handle = fopen($filename, 'r');
                $patch_contents = fread($patch_handle, filesize($filename));
                fclose($patch_handle); 
                
                // apply patch
                fseek($file_handle, $offset);
                fwrite($file_handle, $patch_contents);
            }
    
            // remove patches
            foreach ($patch as $filename) {
                unlink($filename);
            }

            // done with file
            fclose($file_handle);

            $media = TempMedia::create()->addMedia($filePath)->toMediaCollection($request->header('Upload-Collection-Name', 'default'));

            session(["chunked_{$id}" => $media->id]);

            return response($media->id, 200);
        }
    
        return response('', 204);

    }

    public function storeV2(Request $request)
    {
        set_time_limit(0);

        abort_unless($request->hasValidSignature(), 401);

        $collectionName = $request->input('collection') ?? 'default';

        $request->validate([
            'files.*' => 'mimes:' . $request->input('accepts')
        ]);

        $media = TempMedia::create()->addMediaFromRequest('files')->toMediaCollection($collectionName);
        return [
            'paths' => $media->id
        ];
    }

    public function destroy(Request $request)
    {
        $id = $request->getContent();

        if( !is_numeric($id) ){
            $id = session()->pull("chunked_{$id}", 0);
        }

        Media::where('model_type', TempMedia::class)
                ->where('id', $id)
                ->delete();
    }

    private function sanitize_filename($filename)
    {
        $info = pathinfo($filename);
        $name = $this->sanitize_filename_part($info['filename']);
        $extension = $this->sanitize_filename_part($info['extension']);
        return (strlen($name) > 0 ? $name : '_') . '.' . $extension;
    }
    
    private function sanitize_filename_part($str)
    {
        return preg_replace("/[^a-zA-Z0-9\_\s]/", "", $str);
    }
}
