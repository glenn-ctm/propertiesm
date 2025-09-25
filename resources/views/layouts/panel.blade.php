@extends('layouts.app', ['body_class' => 'bg-gray-100 font-family-karla flex'])

@prepend('css')
<!-- Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

    .font-family-karla {
        font-family: karla;
    }

    .bg-sidebar {
        background: #3d68ff;
    }

    .cta-btn {
        color: #3d68ff;
    }

    .upgrade-btn {
        background: #1947ee;
    }
    @media screen and (min-height: 900px) {
        .upgrade-btn {
            position: absolute;
        }
    }

    .upgrade-btn:hover {
        background: #0038fd;
    }

    .active-nav-link {
        background: #1947ee;
    }

    .nav-item:hover {
        background: #1947ee;
    }

    .account-link:hover {
        background: #3d68ff;
    }

    .active {
        background: #1947ee;
    }
</style>
@if ($useFileUploadAssets ?? null)
<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
    rel="stylesheet">
<style>
    .filepond--root {
        margin-bottom: 1.5em;
    }

    .file-upload-container {
        background-color: #f1f0ef;
    }

    .file-name {
        font-size: .75em;
        line-height: 1.2;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
    }

    .file-size {
        font-size: .625em;
        opacity: .5;
        transition: opacity .25s ease-in-out;
        white-space: nowrap;
    }
</style>
@endif
@endprepend

@section('body')
<x-alert-message class="mt-3 mb-3" />
@include('includes.panel.side-nav')
<div id="desktop-body-content" class="w-full flex flex-col h-screen overflow-y-hidden">
    @include('includes.panel.top-nav')
    @include('includes.panel.side-nav-mobile')

    <div class="w-full overflow-x-hidden border-t flex flex-col h-screen">
        <main class="w-full flex-grow pt-6 px-6 pb-12 mb-auto">
            <div class="w-full">
                @yield('content')
            </div>
        </main>

        <footer class="w-full bg-white text-right p-4 text-xs">
            <p class="float-left">© 2020 <a target="_blank" href="#">Properties/m. — All rights reserved</a></p>
            <p class="float-right">Developed by: <a target="_blank" href="http://go4globaldesign.com/">Go4Global</a></p>
        </footer>
    </div>
</div>
@endsection

@prepend('script')
@if ($useFileUploadAssets ?? null)
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script
    src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js">
</script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
</script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
@endif
@endprepend
