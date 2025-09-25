@extends('layouts.panel')

@push('css')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/spruce@2.x.x/dist/spruce.umd.js"></script>
@endpush

@section('content')
    @livewire('payment.container')
@endsection
