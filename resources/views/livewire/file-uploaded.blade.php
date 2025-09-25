<div>
    <div x-data="uploader{{$id}}()" x-init="init()" class="filepond-uploaded @if(count($uploadedFiles) || count($uploadedOldFiles)) p-5 @endif">
        @foreach ($uploadedFiles as $item)
            @if ($item->type === 'image')
                <div x-ref="uploaded{{$item->id}}" class="mb-2 relative rounded-xl overflow-hidden" style="background: #222">
                    <div class="relative m-2 z-10">
                        <div class="absolute">
                            <div class="file-name text-white">{{ $item->file_name }}</div>
                            <div class="file-size text-white">{{ $item->human_readable_size }}</div>
                        </div>
                        <div class="absolute top-0 right-0">
                            <button x-on:click="removeMedia({{ $item->id }}, $event)" class="filepond--file-action-button filepond--action-revert-item-processing" type="button" data-align="right" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;">
                                <svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.586 13l-2.293 2.293a1 1 0 0 0 1.414 1.414L13 14.414l2.293 2.293a1 1 0 0 0 1.414-1.414L14.414 13l2.293-2.293a1 1 0 0 0-1.414-1.414L13 11.586l-2.293-2.293a1 1 0 0 0-1.414 1.414L11.586 13z" fill="currentColor" fill-rule="nonzero"></path>
                                </svg>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                    <div class="filepond--image-preview-overlay filepond--image-preview-overlay-success" style="opacity: 1;">
                        <svg width="500" height="200" viewBox="0 0 500 200" preserveAspectRatio="none">
                            <defs>
                                <radialGradient id="gradient-2" cx=".5" cy="1.25" r="1.15">
                                    <stop offset="50%" stop-color="#000000"></stop>
                                    <stop offset="56%" stop-color="#0a0a0a"></stop>
                                    <stop offset="63%" stop-color="#262626"></stop>
                                    <stop offset="69%" stop-color="#4f4f4f"></stop>
                                    <stop offset="75%" stop-color="#808080"></stop>
                                    <stop offset="81%" stop-color="#b1b1b1"></stop>
                                    <stop offset="88%" stop-color="#dadada"></stop>
                                    <stop offset="94%" stop-color="#f6f6f6"></stop>
                                    <stop offset="100%" stop-color="#ffffff"></stop>
                                </radialGradient>
                                <mask id="mask-2">
                                    <rect x="0" y="0" width="500" height="200" fill="url(#gradient-2)"></rect>
                                </mask>
                            </defs>
                            <rect x="0" width="500" height="200" fill="currentColor" mask="url(#mask-2)"></rect>
                        </svg>
                    </div>
                    <div class="flex justify-center">
                        <div>
                            <img class="w-60" src="{{ $item->getUrl() }}" alt="{{ $item->name }}">
                        </div>
                    </div>
                </div>
            @else
                <div x-ref="uploaded{{$item->id}}" class="mb-2 rounded-xl overflow-hidden" style="background: #369763">
                    <div class="grid grid-flow-col grid-cols-2 gap-4 m-2">
                        <div>
                            <div class="file-name text-white">{{ $item->file_name }}</div>
                            <div class="file-size text-white">{{ $item->human_readable_size }}</div>
                        </div>
                        <div class="text-right">
                            <button x-on:click="removeMedia({{ $item->id }}, $event)" class="filepond--file-action-button filepond--action-revert-item-processing" type="button" data-align="right" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;">
                                <svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.586 13l-2.293 2.293a1 1 0 0 0 1.414 1.414L13 14.414l2.293 2.293a1 1 0 0 0 1.414-1.414L14.414 13l2.293-2.293a1 1 0 0 0-1.414-1.414L13 11.586l-2.293-2.293a1 1 0 0 0-1.414 1.414L11.586 13z" fill="currentColor" fill-rule="nonzero"></path>
                                </svg>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        @foreach ($uploadedOldFiles as $item)
        
            <input type="hidden" name="{{$name}}[]" value="{{$item->id}}">
            @if ($item->type === 'image')
                <div x-ref="uploaded{{$item->id}}" class="mb-2 relative rounded-xl overflow-hidden" style="background: #222">
                    <div class="relative m-2 z-10">
                        <div class="absolute">
                            <div class="file-name text-white">{{ $item->file_name }}</div>
                            <div class="file-size text-white">{{ $item->human_readable_size }}</div>
                        </div>
                        <div class="absolute top-0 right-0">
                            <button x-on:click="removeMedia({{ $item->id }}, $event, true)" class="filepond--file-action-button filepond--action-revert-item-processing" type="button" data-align="right" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;">
                                <svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.586 13l-2.293 2.293a1 1 0 0 0 1.414 1.414L13 14.414l2.293 2.293a1 1 0 0 0 1.414-1.414L14.414 13l2.293-2.293a1 1 0 0 0-1.414-1.414L13 11.586l-2.293-2.293a1 1 0 0 0-1.414 1.414L11.586 13z" fill="currentColor" fill-rule="nonzero"></path>
                                </svg>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                    <div class="filepond--image-preview-overlay filepond--image-preview-overlay-success" style="opacity: 1;">
                        <svg width="500" height="200" viewBox="0 0 500 200" preserveAspectRatio="none">
                            <defs>
                                <radialGradient id="gradient-2" cx=".5" cy="1.25" r="1.15">
                                    <stop offset="50%" stop-color="#000000"></stop>
                                    <stop offset="56%" stop-color="#0a0a0a"></stop>
                                    <stop offset="63%" stop-color="#262626"></stop>
                                    <stop offset="69%" stop-color="#4f4f4f"></stop>
                                    <stop offset="75%" stop-color="#808080"></stop>
                                    <stop offset="81%" stop-color="#b1b1b1"></stop>
                                    <stop offset="88%" stop-color="#dadada"></stop>
                                    <stop offset="94%" stop-color="#f6f6f6"></stop>
                                    <stop offset="100%" stop-color="#ffffff"></stop>
                                </radialGradient>
                                <mask id="mask-2">
                                    <rect x="0" y="0" width="500" height="200" fill="url(#gradient-2)"></rect>
                                </mask>
                            </defs>
                            <rect x="0" width="500" height="200" fill="currentColor" mask="url(#mask-2)"></rect>
                        </svg>
                    </div>
                    <div class="flex justify-center">
                        <div>
                            <img class="w-60" src="{{ $item->getUrl() }}" alt="{{ $item->name }}">
                        </div>
                    </div>
                </div>
            @else
                <div x-ref="uploaded{{$item->id}}" class="mb-2 rounded-xl overflow-hidden" style="background: #369763">
                    <div class="grid grid-flow-col grid-cols-2 gap-4 m-2">
                        <div>
                            <div class="file-name text-white">{{ $item->file_name }}</div>
                            <div class="file-size text-white">{{ $item->human_readable_size }}</div>
                        </div>
                        <div class="text-right">
                            <button x-on:click="removeMedia({{ $item->id }}, $event, true)" class="filepond--file-action-button filepond--action-revert-item-processing" type="button" data-align="right" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;">
                                <svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.586 13l-2.293 2.293a1 1 0 0 0 1.414 1.414L13 14.414l2.293 2.293a1 1 0 0 0 1.414-1.414L14.414 13l2.293-2.293a1 1 0 0 0-1.414-1.414L13 11.586l-2.293-2.293a1 1 0 0 0-1.414 1.414L11.586 13z" fill="currentColor" fill-rule="nonzero"></path>
                                </svg>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</div>

@push('script')
    <script>
        function uploader{{$id}}() {
            return {
                init(){
                    window.addEventListener('removedMedia', event => {
                        const id = event.detail.id;
                        // this.$refs['uploaded'+id].remove();
                    });
                },
                removeMedia(id, event, old = false){
                    event.target.remove();
                    if(old){
                        @this.removeMediaOld(id);
                    } else {
                        @this.removeMedia(id);
                    }
                }
            };
        }
    </script>
@endpush
