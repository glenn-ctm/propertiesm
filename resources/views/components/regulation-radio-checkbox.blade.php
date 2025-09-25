@push('css')
    <style>
        .inputGroup input:checked ~ label {
            border: 1px solid #54E0C7;
        }
        .inputGroup label:before {
            width: 14px;
            height: 10px;
            border-radius: 50%;
            content: "";
            background-color: #e4fffa;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale3d(1, 1, 1);
            transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            z-index: -1;
        }
        .inputGroup label:after {
            width: 28px;
            height: 28px;
            content: "";
            border: 2px solid #D1D7DC;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
            background-repeat: no-repeat;
            background-position: .75px 1.5px;
            border-radius: 50%;
            z-index: 2;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: all 200ms ease-in;
        }
        .inputGroup input:checked ~ label:before {
        transform: translate(-50%, -50%) scale3d(56, 56, 1);
        opacity: 1;
        }
        .inputGroup input:checked ~ label:after {
        background-color: #54E0C7;
        border-color: #54E0C7;
        }
        .inputGroup input {
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        }
    </style>
@endpush

@props(['name', 'label', 'values' => [], 'selected' => null, 'id' => time()])

<div class="text-center" {{ $attributes->merge(['class' => '']) }} x-data="method{{ $id }}()">
    <input name="{{ $name }}" id="{{ $id }}" value="{{ $label }}" type="checkbox" @click="clearRadio()" class="form-checkbox hidden">
    <label for="{{ $id }}">{{ $label }}</label>
    <div class="flex items-center my-4">
        @foreach ($values as $index => $value)
            <div class="inputGroup flex-1 bg-white mx-1 blockrelative">
                <input x-on:change="checkParent()" @if($selected === $value) x-bind:checked="checkParent() && true"  @endif name="{{ $name }}" value="{{ $value }}" id="option-{{ $index }}-{{ $id }}" type="radio" class="form-radio option-{{ $id }} h-8 w-8 order-1 cursor-pointer invisible">
                <label for="option-{{ $index }}-{{ $id }}" class="py-2 px-7 w-100 block text-left text-gray-700 cursor-pointer relative z-10 transition-11 duration-300 ease-in overflow-hidden border border-2 border-gray-300 rounded">{{ $value }}</label>
            </div>
        @endforeach
    </div>
</div>

@push('script')
    <script>
        function method{{ $id }}(){
            return{
                checkParent(){
                    var elem = document.getElementById('{{ $id }}');
                    if( !elem.checked ){
                        elem.checked = true;
                    }
                    return true;
                },
                clearRadio(){
                    var parent = document.getElementById('{{ $id }}');
                    var radios = document.getElementsByClassName('option-{{ $id }}');
                    if( !parent.checked ){
                        for(var i=0; i < radios.length; i++)
                            radios[i].checked = false;
                    } else {
                        radios[0].checked = true;
                    }
                }
            }
        }
    </script>
@endpush
