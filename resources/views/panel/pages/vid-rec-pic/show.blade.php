@extends('layouts.panel')

@push('css')
    <style>
        .media-type {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
@endpush

@section('content')
    <h1 class="text-3xl text-black mb-5">View Videos/Recordings/Pictures</h1>
    <div class="p-7 bg-white shadow-lg w-full">
        <ul class="leading-10 flex-1">
            <li>
                <span class="w-32 inline-block font-semibold">Date:</span>
                <span>{{ $vids_recs_pic->date->format('Y/m/d H:i A') }}</span>
            </li>
            <li>
                <span class="w-32 inline-block font-semibold">Address:</span>
                <span>{{ $vids_recs_pic->address }}</span>
            </li>
            <li>
                <span class="w-32 inline-block font-semibold">Description:</span>
                <span>{{ $vids_recs_pic->description }}</span>
            </li>
            <li>
                <span class="w-32 inline-block font-semibold">Full Name:</span>
                <span>{{ $vids_recs_pic->user?->name }}</span>
            </li>
        </ul>
        <div class="mt-5">

            @foreach ($vids_recs_pic->getMedia() as $media)
                <a target="_blank" href="{{ $media->getFullUrl() }}">
                    <div class="relative inline-block border rounded">
                        <img src="{{ $media->type === 'image' ? $media->getUrl('thumbnail') : asset('static/file-thumbnail-150x150.jpg') }}" class="p-1 m-1">
                        @unless ($media->type === 'image')
                            <div class="media-type bg-gray-500 rounded px-2 text-white">{{ $media->type }}</div>
                        @endunless
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

