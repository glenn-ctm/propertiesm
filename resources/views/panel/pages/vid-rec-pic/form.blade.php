@extends('layouts.panel', [ 'useFileUploadAssets' => true ])

@push('css')
    @livewireStyles
@endpush

@php
    $vrps = isset($vids_recs_pic) ? $vids_recs_pic : null;
@endphp

@section('content')
<h1 class="text-3xl text-black mb-5">Upload Videos/Recording/Pictures</h1>
<div class="w-full md:w-1/2 p-7 bg-white shadow-lg">
  <form action="{{ is_null($vrps) ? route('vids-recs-pics.store') : route('vids-recs-pics.update', $vrps->id) }}" method="POST">
    @if ($vrps)
        @method('PUT')
    @endif
    @csrf
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        PIN:
      </label>
      <input value="{{ old('pin', optional(optional($vrps)->user)->pin) }}" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="portal-id" type="text" name="pin">
      <x-input-error for="pin" class="mt-2" />
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="date-time">
        Date/Time:
      </label>
      <input value="{{ old('date', str_replace(' ', 'T', optional($vrps)->date)) }}" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" type="datetime-local" id="date-time" name="date" min="2018-06-07T00:00">
      <x-input-error for="date" class="mt-2" />
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        Address:
      </label>
      <input value="{{ old('address', optional($vrps)->address) }}" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="address" type="text" name="address">
      <x-input-error for="address" class="mt-2" />
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        Description:
      </label>
      <textarea class="bg-gray-100 focus:bg-white w-full resize-y border rounded focus:outline-none focus:shadow-outline resize-none py-2 px-3" rows="6" id="description" name="description">{{ old('description', optional($vrps)->description) }}</textarea>
      <x-input-error for="description" class="mt-2" />
    </div>
    <div class="mb-4">
        <label class="block text-gray-800 text-sm mb-2" for="portal-id">
            Video/Rec/Photos:
        </label>

        @livewire('file-upload', [
          'isMultiple' => true,
          'accepts' => [
            'image/jpeg', 'image/png', 'image/gif',
            'audio/mpeg3', 'audio/wav',
            'video/mp4'
          ],
          'model' => $vrps
        ])

    </div>

    <div class="flex justify-end mt-4">
      <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline" value="Save">
      <a href={{route('vids-recs-pics.index')}} class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</a>
    </div>
  </form>
</div>
@endsection

@push('script')
    @livewireScripts
@endpush
