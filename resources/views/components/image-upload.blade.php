@props(['name' => 'images', 'autoUpload' => false, 'multiple' => false])

@php $id = Str::random(40); @endphp

<div x-data="uploadOptions{{ $id }}()">

    <template x-if="multipleUpload || (!multipleUpload && !(items.length && items[0].done))">
        <div>
            <button type="button" @click="$refs.inputFile.click()" class="bg-white border text-gray-700 px-3 py-2 border rounded">Choose Files</button>
            <button x-show="!autoUpload" type="button" @click="uploadAll()" :class="{'cursor-wait': loading}":disabled="loading" class="inline-flex bg-gray-500 border text-white px-3 py-2 border rounded">
                <svg x-show="loading" class="animate-spin h-5 w-5 mr-3 text-white" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Upload
            </button>

            <input x-ref="inputFile" type="file" @change="onfileChange($event)" :multiple="multipleUpload ? true : false" accept="image/*" class="hidden">
        </div>
    </template>

    <template x-for="(item, index) in items" :key="index">
        <div class="border flex items-center bg-white pl-2 pr-4 py-2 rounded-lg my-1">
            <img :src="item.temp_img" class="object-cover rounded-lg w-12 h-10">
            <div class="flex-1 px-3 w-full truncate">
                <span class="text-gray-800" x-text="item.name"></span>
                <div x-show="item.progress > 0" class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                      <div x-bind:style="'width:'+item.progress+'%'" :class="{'bg-pink-500': !item.done, 'bg-green-500': item.done}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center"></div>
                    </div>
                </div>
                <div x-show="item.message" x-text="item.message" class="text-sm text-gray-500"></div>
            </div>
            <svg :class="{invisible: !item.done}" class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div x-show="!item.done" class="cursor-pointer" @click="remove(item)">&times;</div>
            <div x-show="item.done" class="cursor-pointer" @click="removeUpload(item)">&times;</div>
            <template x-if="item.done">
                <input type="hidden" :name="inputName" :value="item.id">
            </template>
        </div>
    </template>

    @error('files.*') <span class="error">{{ $message }}</span> @enderror

</div>

@push('script')
    <script>
        function uploadOptions{{ $id }}() {
            return {
                items: [],
                inputName: '{{ $name }}[]',
                autoUpload: {{ $autoUpload ? 1 : 0 }},
                multipleUpload: {{ $multiple ? 1 : 0 }},
                loading: false,
                onfileChange(el) {
                    let files = el.target.files
                    for (let index = 0; index < files.length; index++) {
                        const file = files[index];
                        const item = {
                            id: 'temp-'+index,
                            name: file.name,
                            temp_img: '',
                            progress: 0,
                            done: false,
                            message: '',
                            file
                        };

                        let reader = new FileReader();
                        reader.onload = e => {
                            item.temp_img = e.target.result;
                        };
                        reader.readAsDataURL(file);
                        this.validate(item);

                        if(this.multipleUpload) {
                            this.items.push(item);
                        } else {
                            if( this.items.length === 0 ){
                                this.items = [item];
                            }
                        }

                    }
                    if(this.autoUpload) {
                        this.uploadAll();
                    }
                },
                upload(item) {
                    var base = this;
                    var formData = new FormData();
                    formData.append('media', item.file);

                    axios.post('/panel/temp-upload', formData, {
                        onUploadProgress: function (progressEvent) {
                            var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                            item.progress = percentCompleted;
                        },
                    }).then(function (response) {
                        item.done = true;
                        item.id = response.data.id;
                        base.updateLoading();
                    }).catch(function (err) {
                        base.updateLoading();
                    });
                },
                uploadAll() {
                    var undone = this.items.filter(function(el) { return !el.done && !el.message; });
                    for (let index = 0; index < undone.length; index++) {
                        this.loading = true;
                        const item = undone[index];
                        this.upload(item);  
                    }
                },
                validate(item){
                    const words = item.file.type.split('/');
                    if( words[0] !== 'image' ) {
                        item.message = 'File is invalid, you can upload only jpg, jpeg, gif and png extension file.';
                        return;
                    }

                    const mbSize = item.file.size/1024/1024;
                    if( mbSize >= 2 ) {
                        item.message = 'File is too big, file limit is up to 2MB.';
                    }
                },
                remove($item) {
                    console.log('remove item:', {$item});
                    this.items = this.items.filter(function(el) { return !(el.id === $item.id); });
                },
                removeUpload($item) {
                    var base = this;
                    axios.delete('/panel/temp-upload/' + $item.id).then(function (response) {
                        base.remove($item);
                    }).catch(function (err) {
                        console.log('Something went error.', {err});
                    });
                },
                updateLoading(){
                    var undone = this.items.filter(function(el) { return !el.done && !el.message; });

                    if(undone.length === 0){
                        this.loading = false;
                    }
                }
            }
        }
    </script>
@endpush
