@php
    $accepts = implode(',', $accepts);
@endphp

<div class="mt-2 file-upload-container max-w-lg">

    @livewire('file-uploaded', [ 'collectionName' => $collectionName, 'model' => $model, 'name' => $name ])

    <div x-data="fileUpload{{$id}}()" x-init="init()">
        <div @if(!$isMultiple) x-show="totalUploads === 0" @endif>
            <input type="file"
            class="filepond"
            name="{{$name}}[]"
            id="{{$name}}"
            @if($isMultiple) multiple @endif
            data-max-file-size="100MB"
            accept="{{$accepts}}"
            style="display: none"
            >
        </div>
    </div>

</div>

@push('script')
    <script>
        function fileUpload{{$id}}(){
            return {
                totalUploads: {{$totalUploads}},
                init(){

                    if (typeof FilePond === 'undefined') {
                        return console.warn('FileUpload assets must be loaded');
                    }

                    FilePond.registerPlugin(
                        FilePondPluginImagePreview,
                        FilePondPluginImageExifOrientation,
                        FilePondPluginFileValidateSize,
                        FilePondPluginFileValidateType
                    );

                    // Select the file input and use
                    // create() to turn it into a pond
                    FilePond.create(document.getElementById('{{$name}}'));

                    FilePond.setOptions({
                        instantUpload: {{ var_export($autoUpload) }},
                        chunkUploads: true,
                        chunkSize: (1024 * 1024) * .8,
                        server: {
                            url: '{{ url()->to("/") }}',
                            process: '/panel/temp-upload',
                            patch: '/panel/temp-upload/',
                            revert: '/panel/temp-upload/revert',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Upload-Collection-Name': '{{$collectionName}}',
                                'Upload-Input-Name': '{{$name}}',
                            }
                        }
                    });

                    window.addEventListener('removedMedia', event => {
                        this.totalUploads = event.detail.totalUploads;
                    });
                }
            };
        }
    </script>
@endpush
