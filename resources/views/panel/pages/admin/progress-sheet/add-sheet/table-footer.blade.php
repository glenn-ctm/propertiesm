<tr class="text-center text-blue-900 bg-blue-100 checkboxes">
        <td class="px-6 py-3 border border-gray-500"></td>
        <td colspan="3" class="px-6 py-3 text-white bg-green-500 border border-gray-500">
                $<span x-text="calculation.totalRent()"></span>
        </td>
        <td colspan="4" class="px-6 py-3 text-right border border-gray-500">
                $<span x-text="calculation.totalCost()"></span>
        </td>
        <td colspan="5" class="px-6 py-3 border border-gray-500">
                $<span x-text="calculation.totalInspection()"></span>
        </td>
        <td class="px-5 py-3 bg-blue-300 border border-gray-500">LS</td>
        <td class="px-5 py-3 border border-gray-500">
                <input type="checkbox" id="lsPerWeek1" name="lsPerWeek[0]" x-model="lsPerWeek[0]" />
                <label for="lsPerWeek1" class="select-auto">WK</label>
        </td>
        <td class="px-5 py-3 border border-gray-500">
                <input type="checkbox" id="lsPerWeek2" name="lsPerWeek[1]" x-model="lsPerWeek[1]" />
                <label for="lsPerWeek2" class="select-auto">WK</label>
        </td>
        <td class="px-5 py-3 border border-gray-500">
                <input type="checkbox" id="lsPerWeek3" name="lsPerWeek[2]" x-model="lsPerWeek[2]" />
                <label for="lsPerWeek3" class="select-auto">WK</label>
        </td>
        <td class="px-5 py-3 border border-gray-500">
                <input type="checkbox" id="lsPerWeek4" name="lsPerWeek[3]" x-model="lsPerWeek[3]" />
                <label for="lsPerWeek4" class="select-auto">WK</label>
        </td>
        <td class="px-2 py-3 border border-gray-500">
                <input class="w-12 font-semibold leading-tight text-center text-red-700 bg-blue-100 focus:outline-none focus:bg-blue-100 focus:border-none"
                        type="number" disabled x-bind:value="calculation.lsPerWeekTotal()">
        </td>
        <td class="px-5 py-3 bg-blue-300 border border-gray-500">S.C.</td>
        <td class="px-5 py-3 border border-gray-500">
                <input type="checkbox" id="scPerWeek1" name="scPerWeek[0]" x-model="scPerWeek[0]" />
                <label for="scPerWeek1" class="select-auto">WK</label>
        </td>
        <td class="px-5 py-3 border border-gray-500">
                <input type="checkbox" id="scPerWeek2" name="scPerWeek[1]" x-model="scPerWeek[1]" />
                <label for="scPerWeek2" class="select-auto">WK</label>
        </td>
        <td class="px-5 py-3 border border-gray-500">
                <input type="checkbox" id="scPerWeek3" name="scPerWeek[2]" x-model="scPerWeek[2]" />
                <label for="scPerWeek3" class="select-auto">WK</label>
        </td>
        <td class="px-5 py-3 border border-gray-500">
                <input type="checkbox" id="scPerWeek4" name="scPerWeek[3]" x-model="scPerWeek[3]" />
                <label for="scPerWeek4" class="select-auto">WK</label>
        </td>
        <td class="px-2 py-3 border border-gray-500">
                <input class="w-12 font-semibold leading-tight text-center text-red-700 bg-blue-100 focus:outline-none focus:bg-blue-100 focus:border-none"
                        type="number" disabled x-bind:value="calculation.scPerWeekTotal()">
        </td>
</tr>
<tr class="text-blue-900 bg-blue-100">
        <td colspan="13" rowspan="2" class="px-6 py-3 text-left border border-gray-500">

                <input class="@error('comment') border-red-500 @enderror block w-full leading-tight text-left text-gray-700 bg-blue-100 appearance-none focus:outline-none focus:bg-blue-100 focus:border-none"
                        type="text" id="comment" placeholder="Comments" name="comment"
                        value="{{ old('comment', optional($nProgSheet ?? null)['comment']) }}">
                @error('comment') <span class="text-red-500 error">{{ $message }}</span> @enderror
        </td>
        <td colspan="12" class="px-6 py-3 text-center border border-gray-500">
                <div class="flex">
                        <div class="w-1/4 text-left">Total</div>
                        <div class="w-3/4 text-lg font-bold">
                                $<span x-text="calculation.grandTotal()"></span>
                        </div>
                </div>
        </td>
</tr>
