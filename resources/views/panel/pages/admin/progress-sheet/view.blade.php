@extends('layouts.panel')

@push('css')
@include('panel.pages.admin.progress-sheet.styles.progress-sheet-css')
@endpush

@section('content')
<div x-data="tableRowHandler()">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-5">
            <h1 class="text-3xl text-black pb-6">View Progress Sheet</h1>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-4 text-right">
            <div class="flex justify-end mt-2 sm:mt-0">
                @can('update progress_sheets')
                <a href="{{ route('progress-sheets.edit', $sheet->id) }}"
                    class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline mr-2">Edit</a>
                @endcan
                <a href="{{ route('progress-sheets.show', ['progress_sheet' => $sheet->id, 'pdf-download' => 1]) }}"
                    class="text-center bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <span class="flex">
                        <span class="material-icons">get_app</span>
                        <span>Download</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap">
        <div class="w-full md:w-2/5 lg:w-2/5 mb-4">
            <p class="text-left flex w-full">
                <span class="w-48 font-semibold">Property Address: </span>
                <span class="w-full mr-3 ml-1" x-text="sheetFields.property_address"></span>
            </p>
        </div>
        <div class="w-full md:w-1/5 lg:w-1/5 px-0 sm:px-2 mb-4 text-right">
            <p class="text-left">
                <span class="font-semibold">MM/YYYY:</span>
                <span class="ml-4" x-text="formatDateToMonthYear(sheetFields.date)"></span>
            </p>
        </div>

        @can('update progress_sheets')
        <div class="w-full md:w-1/5 lg:w-1/5 mb-4">
            <p class="text-left flex w-full">
                <span class="w-16 font-semibold">STATUS: </span>
                <span class="w-full mr-3 ml-1" x-text="sheetFields.status"></span></p>
        </div>
        <div class="w-full md:w-1/5 lg:w-1/5 mb-4">
            <p class="text-left flex w-full">
                <span class="w-16 font-semibold">PIN: </span>
                <span class="w-full mr-3 ml-1" x-text="user.pin"></span></p>
        </div>
        @endcan

    </div>
    <div class="w-full">
        <div class="flex flex-col">
            <div class="flex-grow overflow-auto">
                <table class="table-auto border">
                    <thead class="text-blue-900 bg-blue-300">
                        <th class="px-6 py-3 border border-gray-500">UNIT</th>
                        <th colspan="3" class="px-6 py-3 border border-gray-500">RENT</th>
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
                            <td class="px-6 py-3 border border-gray-500">AMT</td>
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

                        <template x-for="(item, index) in itemFields" :key="index">
                            <tr class="text-blue-900 bg-blue-100 text-center">
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.unit">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.rents.amt">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.rents.rec">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.rents.delq">
                                </td>
                                <td class="px-2 py-3 border border-gray-500 truncate">
                                    <p class="truncate">
                                        <input disabled
                                            class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                            type="text" x-bind:value="item.repairs"></p>
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled type="checkbox" class="h-6 w-6 form-checkbox"
                                        x-bind:checked="item.tl">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled type="checkbox" class="h-6 w-6 form-checkbox"
                                        x-bind:checked="item.subc">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.cost">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.inspection.lcks">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.inspection.leks">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.inspection.seal">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.inspection.sd">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="item.inspection.extern">
                                </td>
                                <td colspan="6" class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="helperFromDbDateToMonthYear(item.new_occupant)">
                                </td>
                                <td colspan="6" class="px-2 py-3 border border-gray-500">
                                    <input disabled
                                        class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                        type="text" x-bind:value="helperFromDbDateToMonthYear(item.eviction)">
                                </td>
                            </tr>
                        </template>

                        <tr class="text-blue-900 bg-blue-100 text-center checkboxes">
                            <td class="px-6 py-3 border border-gray-500"></td>
                            <td colspan="3" class="px-6 py-3 border border-gray-500 bg-green-500 text-white">
                                $<span x-text="calculation.totalRent()"></span>
                            </td>
                            <td colspan="4" class="px-6 py-3 border border-gray-500 text-right">
                                $<span x-text="calculation.totalCost()"></span>
                            </td>
                            <td colspan="5" class="px-6 py-3 border border-gray-500">
                                $<span x-text="calculation.totalInspection()"></span>
                            </td>
                            <td class="px-5 py-3 border border-gray-500">LS</td>
                            <td class="px-5 py-3 border border-gray-500">
                                <input disabled type="checkbox" id="lsWeek1"
                                    x-bind:checked="lsItemShouldChecked(sheetFields.ls_per_week, 0)" />
                                <label for="lsWeek1" class="select-auto">WK</label>
                            </td>
                            <td class="px-5 py-3 border border-gray-500">
                                <input disabled type="checkbox" id="lsWeek2"
                                    x-bind:checked="lsItemShouldChecked(sheetFields.ls_per_week, 1)" />
                                <label for="lsWeek2" class="select-auto">WK</label>
                            </td>
                            <td class="px-5 py-3 border border-gray-500">
                                <input disabled type="checkbox" id="lsWeek3"
                                    x-bind:checked="lsItemShouldChecked(sheetFields.ls_per_week, 2)" />
                                <label for="lsWeek3" class="select-auto">WK</label>
                            </td>
                            <td class="px-5 py-3 border border-gray-500">
                                <input disabled type="checkbox" id="lsWeek4"
                                    x-bind:checked="lsItemShouldChecked(sheetFields.ls_per_week, 3)" />
                                <label for="lsWeek4" class="select-auto">WK</label>
                            </td>
                            <td class="px-2 py-3 border border-gray-500">
                                <input disabled
                                    class="w-12 font-semibold bg-blue-100 text-red-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" x-bind:value="`$${calculation.lsPerWeekTotal()}`">
                            </td>

                            <td class="px-5 py-3 border border-gray-500">S.C.</td>
                            <td class="px-5 py-3 border border-gray-500">
                                <input disabled type="checkbox" id="scWeek1"
                                    x-bind:checked="lsItemShouldChecked(sheetFields.sc_per_week, 0)" />
                                <label for="scWeek1" class="select-auto">WK</label>
                            </td>
                            <td class="px-5 py-3 border border-gray-500">
                                <input disabled type="checkbox" id="scWeek2"
                                    x-bind:checked="lsItemShouldChecked(sheetFields.sc_per_week, 1)" />
                                <label for="scWeek2" class="select-auto">WK</label>
                            </td>
                            <td class="px-5 py-3 border border-gray-500">
                                <input disabled type="checkbox" id="scWeek3"
                                    x-bind:checked="lsItemShouldChecked(sheetFields.sc_per_week, 2)" />
                                <label for="scWeek3" class="select-auto">WK</label>
                            </td>
                            <td class="px-5 py-3 border border-gray-500">
                                <input disabled type="checkbox" id="scWeek4"
                                    x-bind:checked="lsItemShouldChecked(sheetFields.sc_per_week, 3)" />
                                <label for="scWeek4" class="select-auto">WK</label>
                            </td>
                            <td class="px-2 py-3 border border-gray-500">
                                <input disabled
                                    class="w-12 font-semibold bg-blue-100 text-red-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-center"
                                    type="text" x-bind:value="`$${calculation.scPerWeekTotal()}`">
                            </td>
                        </tr>
                        <tr class="text-blue-900 bg-blue-100">
                            <td colspan="13" rowspan="2" class="text-left px-6 py-3 border border-gray-500">

                                <input disabled
                                    class="appearance-none block w-full bg-blue-100 text-gray-700 leading-tight focus:outline-none focus:bg-blue-100 focus:border-none text-left"
                                    type="text" placeholder="Comments" x-bind:value="sheetFields.comment">
                            </td>
                            <td colspan="12" class="text-center px-6 py-3 border border-gray-500">
                                <div class="flex">
                                    <div class="w-1/4 text-left">Total</div>
                                    <div class="w-3/4 font-bold text-lg">
                                        $<span x-text="calculation.grandTotal()"></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('panel.pages.admin.progress-sheet.abbr')
</div>
@push('script')
@include('panel.pages.admin.progress-sheet.scripts.helper-scripts')
@include('panel.pages.admin.progress-sheet.scripts.view-script')
@endpush

@endsection
