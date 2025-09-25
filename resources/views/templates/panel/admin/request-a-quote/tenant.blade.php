<x-slot name="page_title">Maintenance Repairs</x-slot>
<div class="container">
    <form class="w-full max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-address">
                Address
            </label>
            <input class="text-sm appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:shadow-outline" id="grid-address" type="text">
            </div>
            <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="grid-cnumber">
                Contact Number
            </label>
            <input class="text-sm appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:shadow-outline" id="grid-cname" type="text">
        </div>
    </div>
        <div class="w-full mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">
                Repair Description
            </label>
            <textarea class="resize-y block shadow-sm appearance-none border border-gray-200 rounded w-full py-3 px-3 text-gray-700 text-sm font-light leading-tight focus:outline-none focus:shadow-outline" type="text" id="grid-repair-description" rows="5"></textarea>
        </div>
        <div class="w-full">
            <p class="text-gray-500 text-sm mb-4">Please allow 24 hours to be contacted by the Maintenance.</p>
            <!--<p class="text-gray-500 text-sm mb-4">For emergencies, please text your <span class="font-bold">NAME, ADDRESS, CONTACT NUMBER, and NATURE OF EMERGENCY</span> to <span class="font-bold">562-552-5723</span></p>-->
            <p class="text-gray-500 text-sm mb-4">For Safety and Liability reasons before entry any occupied dwelling Tool Lawn requires company repairmen to enable their bodycam (optional). By opting out, you release Properties/m and all involved from fault of any claim.</p>
            <div class="mb-5">
                <label class="inline-flex items-center font-light">
                    <input type="checkbox" class="form-checkbox">
                    <span class="ml-2 text-gray-700 text-sm" >Opt-out</span>
                </label>
            </div>
            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm uppercase">
            Submit
            </button>
        </div>
    </form>
</div>
