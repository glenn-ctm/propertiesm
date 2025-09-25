@php
    $classAttr = match($colorType) {
        'primary' => $outline ? 'bg-blue-100 text-blue-500 border-blue-500' : 'bg-blue-500 hover:bg-blue-600 border-blue-500 text-white',
        'success' => $outline ? 'bg-green-100 text-green-500 border-green-500' : 'bg-green-500 hover:bg-green-600 border-green-500 text-white',
        'danger'  => $outline ? 'bg-red-100 text-red-500 border-red-500' : 'bg-red-500 hover:bg-red-600 border-red-500 text-white',
        default   => 'bg-white text-black border-black hover:bg-gray-100'
    };
    $classAttr .= ' disabled:opacity-25 p-3 font-bold text-center no-underline border rounded button focus:outline-none focus:shadow-none';
    $classAttr .= $block ? ' block w-full' : '';
@endphp
<button {{$attributes->merge(['class' => $classAttr])}}>{{$slot}}</button>
