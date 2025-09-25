@extends('layouts.panel')

@section('content')
<div x-data="tableRowHandler()">
  <div class="flex flex-wrap">

    @include('panel.pages.admin.progress-sheet.layouts.head')
  </div>
  <div class="pb-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
      @include('panel.pages.admin.progress-sheet.layouts.table')
    </div>
  </div>
</div>

@push('script')
@include('panel.pages.admin.progress-sheet.scripts.index-script')
@include('panel.pages.admin.progress-sheet.scripts.helper-scripts')
@endpush

@endsection