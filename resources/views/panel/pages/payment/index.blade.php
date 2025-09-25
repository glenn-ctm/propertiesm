@extends('layouts.panel')

@section('content')
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-5">
            <h1 class="text-3xl text-black">Payments</h1>
        </div>

        <div class="flex-row sm:flex w-full sm:w-1/2 px-2 mb-4 mt-5 flex-wrap">
            @if ( !auth()->user()->is_admin() )
                <div class="w-full @can('create repair_requests') sm:w-9/12 @endcan"></div>
            @endif
            @can('create payments')
                <div class="w-full sm:w-3/12 @if(auth()->user()->is_admin()) pr-3 @endif">
                    <a href="{{ route('payments.create') }}" class="inline-block w-full mb-2 sm:mb-0 sm:mr-5 text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded focus:outline-none focus:shadow-outline">
                    Make A Payment
                    </a>
                </div>
            @endcan
            @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                <div class="w-full @can('create payments') sm:w-9/12 @endcan">
                    <form>
                        <div class="flex shadow rounded">
                            <input class="w-full p-2 ml-0 focus:outline-none" name="search" type="text" placeholder="Search by Name or PIN Number" value="{{ request()->input('search') }}">
                            <button class="rounded bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <div class="pb-8 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="border-collapse w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">DATE PAID</th>
                        @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                            <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">PIN</th>
                            <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">FULL NAME</th>
                            <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">ADDRESS</th>
                        @endif
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">AMOUNT</th>
                        <th class="p-3 font-bold uppercase border border-gray-300 hidden lg:table-cell">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DATE PAID</span>
                                {{ $payment->created_at->format('m/d/Y') }}
                            </td>
                            @if ( auth()->user()->is_admin() || auth()->user()->is_super_admin() )
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">PIN</span>
                                    {{ $payment->user?->pin }}
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">FULL NAME</span>
                                    {{ $payment->user?->name }}
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ADDRESS</span>
                                    {{ $payment->user?->full_address }}
                                </td>
                            @endif
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">AMOUNT</span>
                                {{ $payment->amount }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">STATUS</span>
                                @if ($payment->is_paid)
                                    <span class="rounded-full bg-green-200 py-1 px-3 text-xs font-bold">PAID</span>
                                @else
                                    <span class="rounded-full bg-red-200 py-1 px-3 text-xs font-bold uppercase">{{ $payment->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @unless (count($payments))
                <div class="text-center p-5">No available data.</div>
            @endunless
        </div>
    </div>
    {{ $payments->links() }}
@endsection
