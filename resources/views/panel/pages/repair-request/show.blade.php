@extends('layouts.panel')

@section('content')
    <h1 class="text-3xl text-black mb-5">View Request</h1>
    <div class="p-7 bg-white shadow-lg w-full">
        @include('panel.pages.repair-request.view')
        @can('download repair_requests')
            <div class="w-36">
                <a href="{{ route('repair-requests.show', [ 'repair_request' => $repairRequest->id, 'pdf-download' => 1 ]) }}" class="block text-center bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <span class="flex">
                        <span class="material-icons">get_app</span>
                        <span>Download</span>
                    </span>
                </a>
            </div>
        @endcan
    </div>
@endsection

