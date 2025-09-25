<div>
    @php
        $flash = false;
        if(session($key = 'alertSuccess') || session($key = 'alertError')){
            $flash = true;
            $ms = 10000;
            $type = $key === 'alertSuccess' ? 'success' : 'error';
            $data = session($key);
            if(is_string($data)){
                $message = $data;
            } else {
                $message = data_get($data, 'message', 'message key undefined.');
                $ms = data_get($data, 'ms', $ms);
            }
        }
    @endphp
    <div class="z-50 w-full fixed top-0 right-0 left-0">
        <div class="container m-auto">
            <div id="alert-message-box" x-data="alertMessage()" x-init="init($dispatch); @if($flash) writeMessage('{{ $type }}', '{{ $message }}', {{ $ms }}) @endif">
                <div {{ $attributes->merge(['class' => '']) }} x-show.transition.opacity.out.duration.1500ms="shown" style="display: none;">
                    <div :class="{'bg-red-500': errorType, 'bg-green-500': successType}" class="relative rounded text-white text-sm font-bold px-4 py-3">
                        <p x-text="message"></p>
                        <svg @click="shown = false" class="absolute top-0 right-0 m-1 cursor-pointer fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script type="text/javascript">
        function alertMessage(){
            return {
                dispatch: null,
                shown: false,
                message: null,
                successType: false,
                errorType: false,
                init($dispatch) {
                    this.dispatch = $dispatch;
                    window.addEventListener('alert-message', event => {
                        var data = event.detail;
                        this.shown = true;
                        this.message = data.message;

                        switch(data.action) {
                            case 'success':
                                this.successType = true;
                                this.errorType = false;
                                break;
                            case 'error':
                                this.errorType = true;
                                this.successType = false;
                                break;
                            default:
                                this.successType = true;
                                this.errorType = false;
                        }

                        setTimeout(() => { this.shown = false }, data.ms);
                    });
                },
                writeMessage(type, message, ms = 10000){
                    this.dispatch('alert-message', { 
                            'action': type, 
                            'message': message, 
                            'ms': ms
                        });
                }
            };
        }
    </script>
@endpush
