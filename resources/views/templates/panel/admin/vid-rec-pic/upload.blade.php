@extends('layouts.panel')

@push('css')
    @livewireStyles
@endpush

@section('content')
<h1 class="text-3xl text-black mb-5">Upload Videos/Recording/Pictures</h1>
<div class="w-full md:w-1/2 p-7 bg-white shadow-lg">
  <form method="post" action="{{ route('vids-recs-pics.store') }}">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        PIN:
      </label>
      <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="portal-id" type="text" name="pin">
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="date-time">
        Date/Time:
      </label>
      <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" type="datetime-local" id="date-time" name="date" min="2018-06-07T00:00">
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        Address:
      </label>
      <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="address" type="text" name="address">
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        Description:
      </label>
      <textarea class="bg-gray-100 focus:bg-white w-full resize-y border rounded focus:outline-none focus:shadow-outline resize-none" rows="6" id="description" name="description"></textarea>
    </div>
    <div class="mb-4">
        <label class="block text-gray-800 text-sm mb-2" for="portal-id">
            Video/Rec/Photos:
        </label>

        @livewire('file-upload', [
          'isMultiple' => true,
          'accepts' => [
            '.png','.jpg','.jpeg','.gif',
            '.mp3', '.wav',
            '.mp4'
          ]
        ])

    </div>

    <div class="flex justify-end mt-4">
      <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline" value="Save">
      <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
    </div>
  </form>
</div>
@endsection

@push('script')
    @livewireScripts
@endpush
