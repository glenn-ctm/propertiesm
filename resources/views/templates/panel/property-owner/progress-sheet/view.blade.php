@extends('layouts.panel')

@push('css')
@include('panel.pages.admin.progress-sheet.styles.progress-sheet-css')
@endpush

@section('content')
<div class="flex flex-wrap">
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-5">
        <h1 class="text-3xl text-black pb-6">View Progress Sheet</h1>
    </div>
    <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4 text-right">
        <div class="flex justify-end mt-2 sm:mt-0">
            <button
                class="text-center bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <span class="flex">
                    <span class="material-icons">get_app</span>
                    <span>Download</span>
                </span>
            </button>
        </div>
    </div>
</div>
<div class="flex flex-wrap">
    <div class="w-full md:w-2/4 lg:w-2/4 mb-4">
        <p class="text-left flex w-full">
            <span class="w-48 font-semibold">Property Address: </span>
            <span class="w-full mr-3 ml-1">3112 Doctors Drive, Los Angeles, CA 90017</span></p>
    </div>
    <div class="w-full md:w-1/4 lg:w-1/4 px-0 sm:px-2 mb-4 text-right">
        <p class="text-left">
            <span class="font-semibold">MM/YYYY:</span>
            <span class="ml-4">10/2020</span>
        </p>
    </div>
</div>
<div class="w-full">
    <div class="flex flex-col">
        <div class="flex-grow overflow-auto">
            <table class="table-auto border">
                <thead class="text-blue-900 bg-blue-300">
                    <th class="px-6 py-3 border border-gray-500">UNIT</th>
                    <th colspan="2" class="px-6 py-3 border border-gray-500">RENT</th>
                    <th class="px-32 py-3 border border-gray-500">REPAIRS</th>
                    <th class="px-6 py-3 border border-gray-500">T.L.</th>
                    <th class="px-6 py-3 border border-gray-500">SUBC</th>
                    <th class="px-6 py-3 border border-gray-500">COST</th>
                    <th colspan="5" class="px-6 py-3 border border-gray-500">INSPECTION</th>
                    <th colspan="6" class="px-6 py-3 border border-gray-500">NEW OCCUPANT</th>
                    <th colspan="6" class="px-6 py-3 border border-gray-500">EVICTION</th>
                </thead>
                <tbody>
                    <tr class="text-blue-900 bg-blue-300 text-center">
                        <td class="px-6 py-3 border border-gray-500"></td>
                        <td class="px-6 py-3 border border-gray-500">REC</td>
                        <td class="px-6 py-3 border border-gray-500">DELQ</td>
                        <td class="px-6 py-3 border border-gray-500"></td>
                        <td class="px-6 py-3 border border-gray-500"></td>
                        <td class="px-6 py-3 border border-gray-500"></td>
                        <td class="px-6 py-3 border border-gray-500"></td>
                        <td class="px-6 py-3 border border-gray-500">LCKS</td>
                        <td class="px-6 py-3 border border-gray-500">LEKS</td>
                        <td class="px-6 py-3 border border-gray-500">SEAL</td>
                        <td class="px-6 py-3 border border-gray-500">S.D.</td>
                        <td class="px-6 py-3 border border-gray-500">EXTERM</td>
                        <td colspan="6" class="px-6 py-3 border border-gray-500">MM/DD/YYYY</td>
                        <td colspan="6" class="px-6 py-3 border border-gray-500">MM/DD/YYYY</td>
                    </tr>
                    <tr class="text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit" value="1">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec" value="$50.00">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq" value="">
                        </td>
                        <td class="px-2 py-3 border border-gray-500 truncate">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs" value="Fix bath facet"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox" checked>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox" checked>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost" value="$20.00">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks" value="$20.00">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks" value="$20.00">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal" value="$20.00">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd" value="$20.00">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern" value="$20.00">
                        </td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant">
                        </td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction">
                        </td>
                    </tr>
                    <tr class="text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern">
                        </td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant">
                        </td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction">
                        </td>
                    </tr>
                    <tr class="h-12 text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern">
                        </td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant">
                        </td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction">
                        </td>
                    </tr>
                    <tr class="h-12 text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction"></td>
                    </tr>
                    <tr class="h-12 text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction"></td>
                    </tr>
                    <tr class="h-12 text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction"></td>
                    </tr>
                    <tr class="h-12 text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction"></td>
                    </tr>
                    <tr class="h-12 text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction"></td>
                    </tr>
                    <tr class="h-12 text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction"></td>
                    </tr>
                    <tr class="h-12 text-blue-900 bg-blue-100 text-center">
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="unit"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="rec"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="delq"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <p class="truncate w-64">
                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" id="repairs"></p>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled type="checkbox" class="h-6 w-6 form-checkbox">
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="cost"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="lcks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="leks"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="seal"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="sd"></td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="extern"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="new-occupant"></td>
                        <td colspan="6" class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="eviction"></td>
                    </tr>
                    <tr class="text-blue-900 bg-blue-100 text-center checkboxes">
                        <td class="px-6 py-3 border border-gray-500"></td>
                        <td colspan="2" class="px-6 py-3 border border-gray-500 bg-green-500 text-white">$0</td>
                        <td colspan="4" class="px-6 py-3 border border-gray-500 text-right">$0</td>
                        <td colspan="5" class="px-6 py-3 border border-gray-500">$100.00</td>
                        <td class="px-5 py-3 border border-gray-500">LS</td>
                        <td class="px-5 py-3 border border-gray-500">
                            <input disabled type="checkbox" id="lsWeek1" checked />
                            <label for="lsWeek1" class="select-auto">WK</label>
                        </td>
                        <td class="px-5 py-3 border border-gray-500">
                            <input disabled type="checkbox" id="lsWeek2" checked />
                            <label for="lsWeek2" class="select-auto">WK</label>
                        </td>
                        <td class="px-5 py-3 border border-gray-500">
                            <input disabled type="checkbox" id="lsWeek3" />
                            <label for="lsWeek3" class="select-auto">WK</label>
                        </td>
                        <td class="px-5 py-3 border border-gray-500">
                            <input disabled type="checkbox" id="lsWeek4" />
                            <label for="lsWeek4" class="select-auto">WK</label>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="w-12 font-semibold bg-blue-100 text-red-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="ls" value="$0">
                        </td>

                        <td class="px-5 py-3 border border-gray-500">S.C.</td>
                        <td class="px-5 py-3 border border-gray-500">
                            <input disabled type="checkbox" id="scWeek1" checked />
                            <label for="scWeek1" class="select-auto">WK</label>
                        </td>
                        <td class="px-5 py-3 border border-gray-500">
                            <input disabled type="checkbox" id="scWeek2" checked />
                            <label for="scWeek2" class="select-auto">WK</label>
                        </td>
                        <td class="px-5 py-3 border border-gray-500">
                            <input disabled type="checkbox" id="scWeek3" />
                            <label for="scWeek3" class="select-auto">WK</label>
                        </td>
                        <td class="px-5 py-3 border border-gray-500">
                            <input disabled type="checkbox" id="scWeek4" />
                            <label for="scWeek4" class="select-auto">WK</label>
                        </td>
                        <td class="px-2 py-3 border border-gray-500">
                            <input disabled
                                class="w-12 font-semibold bg-blue-100 text-red-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                type="text" id="ls" value="$0">
                        </td>
                    </tr>
                    <tr class="text-blue-900 bg-blue-100">
                        <td colspan="12" rowspan="2" class="text-left px-6 py-3 border border-gray-500">

                            <input disabled
                                class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-left"
                                type="text" id="eviction" placeholder="Comments">
                        </td>
                        <td colspan="12" class="text-center px-6 py-3 border border-gray-500">
                            <div class="flex">
                                <div class="w-1/4 text-left">Total</div>
                                <div class="w-3/4 font-bold text-lg">$0</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="w-full">
    <p class="mt-5 text-sm">Abbreviations: REC - Receive, DELQ - Delequent, T.L. - Tool Lawn, SUBC - Subcontractor, LCKS
        - Locks, S.D. - Smoke Detector, LEKS - Leaks, LS - Landscaping, S.C. - Site Check, WK - Week</p>
</div>
@endsection
