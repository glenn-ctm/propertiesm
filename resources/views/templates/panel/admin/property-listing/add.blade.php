@extends('layouts.panel')

@section('content')
<div class="w-full md:w-1/2 lg:w-1/2 px-2 mb-5">
    <h1 class="text-3xl text-black">Add New Property</h1>
</div>
<div>
    <div class="py-4 px-7 bg-white shadow-lg">
        <form>
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 mr-0 md:mr-3 my-2">
                    <label for="address" class="mt-3 text-gray-800 text-sm leading-8"> Address</label>
                    <input id="address" name="address" type="text" placeholder="Address" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                </div>
                <div class="w-full flex-1 my-2">
                    <label for="description" class="mt-3 text-gray-800 text-sm leading-8">Property Description</label>
                    <input id="description" name="description" type="text" placeholder="Short description of the property here..." class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                </div>
            </div>

            <div class="flex-row lg:flex my-5">
                <div class="w-full bg-gray-100lex-1 border border-gray-300 rounded appearance-none outline-none w-full text-gray-800 mr-0 md:mr-3">
                    <div class="px-3 py-2 text-gray-800 text-sm leading-8 bg-gray-100">Property Amenities</div>
                    <div class="border-t border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-600 text-sm">
                        <div class="flex-row lg:flex items-stretch">
                            <div class="w-full lg:flex-1 text-left px-4 py-0 lg:py-2 m-0 lg:m-2">
                                <div class="py-2">
                                    <input name="downstairUnit" id="downstairUnit" type="checkbox" class="form-checkbox">
                                    <label for="downstairUnit"> Downstairs Unit</label>
                                </div>
                                <div class="py-2">
                                    <input name="updtairsUnit" id="updtairsUnit" type="checkbox" class="form-checkbox">
                                    <label for="updtairsUnit"> Upstairs Unit</label>
                                </div>
                                <div class="py-2">
                                    <input name="washer" id="washer" type="checkbox" class="form-checkbox">
                                    <label for="washer"> Washer/Dryer Hook Up</label>
                                </div>
                            </div>
                            <div class="w-full lg:flex-1 text-left px-4 py-0 lg:py-2 m-0 lg:m-2">
                                <div class="py-2">
                                    <input name="laundry" id="laundry" type="checkbox" class="form-checkbox">
                                    <label for="laundry"> Community Laundry</label>
                                </div>
                                <div class="py-2">
                                    <input name="parkingPlace" id="parkingPlace" type="checkbox" class="form-checkbox">
                                    <label for="parkingPlace"> Parking Place</label>
                                </div>
                                <div class="py-2">
                                    <input name="exStorage" id="exStorage" type="checkbox" class="form-checkbox">
                                    <label for="exStorage"> Exterior Storage</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-fulbg-gray-100lex-1 border border-gray-300 rounded appearance-none outline-none w-full text-gray-800">
                    <div class="px-3 py-2 text-gray-800 text-sm leading-8 bg-gray-100">Regulations</div>
                    <div class="w-1/2 border-t border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full  text-gray-600 text-sm">
                        <div class="flex-row lg:flex items-stretch">
                            <div class="w-full lg:flex-1 text-left px-4 py-0 lg:py-2 m-0 lg:m-2">

                                <div class="py-2">
                                    <input name="wff" id="wff" type="checkbox" class="form-checkbox">
                                    <label for="wff">Water Field Furniture</label>
                                    <div class="flex">
                                        <div class="py-2 mx-3">
                                            <input name="wffOption" id="ok" type="radio" class="form-radio">
                                            <label for="ok" class="text-green-500 font-bold">OK</label>
                                        </div>
                                        <div class="py-2 mx-3">
                                            <input name="wffOption" id="notpermitted" type="radio" class="form-radio">
                                            <label for="notpermitted" class="text-green-500 font-bold">Not Permitted</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-2">
                                    <input name="li" id="li" type="checkbox" class="form-checkbox">
                                    <label for="li">Low Income</label>
                                    <div class="flex">
                                        <div class="py-2 mx-3">
                                            <input name="liOption" id="ok-2" type="radio" class="form-radio">
                                            <label for="ok-2" class="text-green-500 font-bold">OK</label>
                                        </div>
                                        <div class="py-2 mx-3">
                                            <input name="liOption" id="notpermitted-2" type="radio" class="form-radio">
                                            <label for="notpermitted-2" class="text-green-500 font-bold">Not Permitted</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full lg:flex-1 text-left px-4 py-0 lg:py-2 m-0 lg:m-2">
                                <div class="py-2">
                                    <input name="sb" id="sb" type="checkbox" class="form-checkbox">
                                    <label for="sb">Section 8</label>
                                    <div class="flex">
                                        <div class="py-2 mx-3">
                                            <input name="sbOption" id="ok-3" type="radio" class="form-radio">
                                            <label for="ok-3" class="text-green-500 font-bold">OK</label>
                                        </div>
                                        <div class="py-2 mx-3">
                                            <input name="sbOption" id="notpermitted-3" type="radio" class="form-radio">
                                            <label for="notpermitted-3" class="text-green-500 font-bold">Not Permitted</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-row md:flex">
                <div class="w-full md:w-1/4 my-3 mr-0 md:mr-3">
                    <label for="units" class="mt-3 text-gray-800 text-sm leading-8"> No. of Units</label>
                    <input id="units" name="units" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                </div>
                <div class="w-full md:w-1/4 my-3 mr-0 md:mr-3">
                    <label for="rooms" class="mt-3 text-gray-800 text-sm leading-8"> Rooms</label>
                    <input id="rooms" name="rooms" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                </div>
                <div class="w-full md:w-1/4 my-3 mr-0 md:mr-3">
                    <label for="bathrooms" class="mt-3 text-gray-800 text-sm leading-8"> Bathrooms</label>
                    <input id="bathrooms" name="bathrooms" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                </div>
                <div class="w-full md:w-1/4 my-3">
                    <label for="sqft" class="mt-3 text-gray-800 text-sm leading-8"> Square Footage (sqft)</label>
                    <input id="sqft" name="sqft" type="number" placeholder="" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
                </div>
            </div>

            <div class="my-3">
                <label for="pets" class="text-gray-800 text-sm leading-8"> Pets</label>
                <input id="pets" name="pets" type="text" placeholder="Pets" class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
            </div>

            <div class="my-3">
                <label for="ownerPays" class="text-gray-800 text-sm leading-8"> Owner Pays</label>
                <input id="ownerPays" name="ownerPays" type="text"   class="bg-gray-100 flex border border-gray-300 rounded py-2 px-3 appearance-none outline-none w-full text-gray-800 focus:outline-none focus:shadow-outline focus:bg-white">
            </div>

            <div class="flex justify-between items-start">
                <div class="w-5/11 my-3 w-full">
                    <label for="rent" class="text-gray-800 text-sm leading-8"> Rent</label>
                    <div class="flex flex-wrap items-stretch w-full relative appearance-none border rounded w-full rounded">
                        <div class="flex">
                            <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                        </div>
                        <input id="rent" name="rent" type="number" type="text" class="bg-gray-100 flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline focus:bg-white rounded-r">
                    </div>
                </div>
                <div class="w-1/11 mx-3 my-3 self-center pb-8 sm:pb-4">
                    <p class="text-4xl text-green-500">+</p>
                </div>
                <div class="w-5/11 my-3 w-full">
                    <label for="security" class="text-gray-800 text-sm leading-8"> Security</label>
                    <div class="flex flex-wrap items-stretch w-full relative appearance-none border rounded w-full rounded">
                        <div class="flex">
                            <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border-r px-4 py-2 whitespace-no-wrap text-gray-400">$</span>
                        </div>
                        <input id="security" name="security" type="number" class="bg-gray-100 flex-shrink flex-grow flex-auto leading-normal w-px flex-1  px-3 py-2 relative leading-tight focus:outline-none focus:shadow-outline focus:bg-white rounded-r">
                    </div>
                    <div class="mt-4">
                        <input name="securityRelief" id="securityRelief" type="checkbox" class="form-checkbox">
                        <label for="securityRelief">Security Relief Available</label>
                    </div>
                </div>
            </div>

            <div class="">
                <label class="text-gray-800 text-sm mb-2" for="portal-id">
                    Select Files
                </label>
                <input type="file" class="bg-gray-100 border w-full text-gray-800 px-3 py-2 border rounded focus:outline-none focus:shadow-outline focus:bg-white">
            </div>

            <div class="my-4">
                <label for="comment" class="text-gray-800 text-sm mb-2" for="portal-id">
                    Comments
                </label>
                <textarea id="comment" name="comment" type="file" rows="6" class="bg-gray-100 border w-full text-gray-800 px-3 py-2 border rounded focus:outline-none focus:shadow-outline focus:bg-white"></textarea>
            </div>

            <div class="flex my-4">
                <div class="flex-auto flex flex-row-reverse">
                    <button class="text-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline focus:bg-white ml-2">Cancel</button>
                    <input type="submit" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:shadow-outline focus:bg-white" value="Save">
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
