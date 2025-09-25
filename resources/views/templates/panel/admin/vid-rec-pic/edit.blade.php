@extends('layouts.panel')

@section('content')
@php
    $vrps = isset($vrps) ? $vrps : null;
@endphp
<h1 class="text-3xl text-black mb-5">Edit Videos/Recording/Pictures</h1>
<div class="w-full md:w-1/2 p-7 bg-white shadow-lg">
  <form method="POST" action="{{ route('vids-recs-pics.update', $vrps->id) }}">
    @if ($vrps)
        @method('PUT')
    @endif
    @csrf
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        PIN:
      </label>
      <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="portal-id" type="text" name="pin" value="{{ $vrps->pin }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="date-time">
        Date/Time:
      </label>
      <input
        class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white"
        type="datetime-local" id="date-time" name="date"  {{ old('date', optional($vrps)->date) }} min="2018-06-07T00:00">
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        Address:
      </label>
      <input class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white" id="address" type="text" name="address" value="{{ $vrps->address }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm mb-2" for="portal-id">
        Description:
      </label>
      <textarea class="bg-gray-100 focus:bg-white w-full resize-y border rounded focus:outline-none focus:shadow-outline resize-none" rows="6" id="description" name="description">
        {{ old('description', optional($vrps)->description) }}
      </textarea>
    </div>    <div class="mb-4">
        <label class="block text-gray-800 text-sm mb-2" for="portal-id">
            Video/Rec/Photos:
        </label>
        <input type="file" class="bg-gray-100 focus:bg-white shadow appearance-none border rounded w-full text-gray-700 px-3 py-2 border rounded" name="media" value="{{ $vrps->media }}">
    </div>

    <div class="flex justify-end mt-4">
      <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline" value="Save">
      <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Cancel</button>
    </div>
  </form>
</div>
@endsection
