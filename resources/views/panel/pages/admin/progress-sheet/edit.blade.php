@extends('layouts.panel')

@push('css')
@include('panel.pages.admin.progress-sheet.styles.progress-sheet-css')
@endpush

@section('content')

<form action="{{ route('progress-sheets.update', $nProgSheet['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Header -->
    @include('panel.pages.admin.progress-sheet.add-sheet.header')
    <!-- end of Header -->

    <!-- table -->
    <div class="w-full">
        <div class="flex flex-col">
            <div class="flex-grow overflow-auto" x-data="tableRowHandler()">

                <table class="border table-auto">
                    <thead class="text-blue-900 bg-blue-300">
                        @include('panel.pages.admin.progress-sheet.add-sheet.table-head')
                    </thead>
                    <tbody>
                        <tr class="text-center text-blue-900 bg-blue-300">
                            @include('panel.pages.admin.progress-sheet.add-sheet.table-head-2nd')
                        </tr>
                        <input type="hidden" name="removedItems" x-model="JSON.stringify(removedItems)">
                        <template x-for="(field, index) in itemFields" :key="index">
                            <tr class="text-center text-blue-900 bg-blue-100">
                                <input x-model="field.id" type="hidden" class="hidden" :name="'items['+ index +'][id]'">
                                <input x-model="field.newItem" type="hidden" class="hidden"
                                    :name="'items['+ index +'][newItem]'">
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.unit" :name="'items['+ index +'][unit]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.rents.amt" :name="'items['+ index +'][rents][amt]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>

                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.rents.rec" :name="'items['+ index +'][rents][rec]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>

                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.rents.delq" :name="'items['+ index +'][rents][delq]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>

                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.repairs" :name="'items['+ index +'][repairs]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="text">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.tl" :name="'items['+ index +'][tl]'" type="checkbox"
                                        class="w-6 h-6 form-checkbox">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.subc" :name="'items['+ index +'][subc]'" type="checkbox"
                                        class="w-6 h-6 form-checkbox">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.cost" :name="'items['+ index +'][cost]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.inspection.lcks"
                                        :name="'items['+ index +'][inspection][lcks]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.inspection.leks"
                                        :name="'items['+ index +'][inspection][leks]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.inspection.seal"
                                        :name="'items['+ index +'][inspection][seal]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.inspection.sd" :name="'items['+ index +'][inspection][sd]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>
                                <td class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.inspection.extern"
                                        :name="'items['+ index +'][inspection][extern]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="number">
                                </td>
                                <td colspan="6" class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.new_occupant" :name="'items['+ index +'][new_occupant]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="date">
                                </td>
                                <td colspan="6" class="px-2 py-3 border border-gray-500">
                                    <input x-model="field.eviction" :name="'items['+ index +'][eviction]'"
                                        class="block w-full leading-tight text-center text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                                        type="date">
                                </td>
                                <td>
                                    <button type="button"
                                        class="inline-block px-4 py-2 mt-2 mb-2 font-bold text-white bg-red-500 hover:bg-blue-700"
                                        @click="removeField(index)">&times;</button>
                                </td>
                            </tr>
                        </template>

                        <input type="hidden" name="lsAmountPerWeek"
                            value="{{ old('lsAmountPerWeek', $nProgSheet['ls_amount_per_week']) }}">
                        <input type="hidden" name="sCamountPerWeek"
                            value="{{ old('sCamountPerWeek', $nProgSheet['sc_amount_per_week']) }}">

                        @include('panel.pages.admin.progress-sheet.add-sheet.table-footer')
                    </tbody>
                </table>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right"><button type="button"
                                class="inline-block px-4 py-2 mt-2 mb-2 font-bold text-white bg-green-500 rounded hover:bg-blue-700"
                                @click="addNewField()">+ Add Row</button></td>
                    </tr>
                </tfoot>
            </div>
        </div>
    </div>
    @include('panel.pages.admin.progress-sheet.abbr')
</form>

@push('script')
@include('panel.pages.admin.progress-sheet.scripts.helper-scripts')
@include('panel.pages.admin.progress-sheet.scripts.edit-script', ['formType' => $formType])
@endpush
@endsection
