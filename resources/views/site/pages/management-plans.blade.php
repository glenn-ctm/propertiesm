@extends('layouts.site')

@section('content')
<div class="about-us bg-white">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Management Plans</h1>
        
        <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
            <div style="min-width: 800px">
            <!-- Header Row -->
            <div class="grid grid-cols-4 p-4 bg-gray-200 font-semibold text-gray-700 text-center">
                <div class="border-r border-gray-300 p-4">Service Options</div>
                <div class="border-r border-gray-300 p-4">Premier 1 yr.</div>
                <div class="border-r border-gray-300 p-4">Advanced 3 yrs.</div>
                <div class="p-4">Paramount 5 yrs.</div>
            </div>

            <!-- Accounts Set Up -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Accounts Set Up<br /><span class="font-normal text-gray-500">Your tenants, building addresses, unit data & plan choice integrated into our system for easy searching, tracking, reporting & task management</span></div>
                <div class="border-r border-gray-300 p-4 text-center">REQUIRED<br />Prices vary based on unit tier</div>
                <div class="border-r border-gray-300 p-4 text-center">REQUIRED<br />Prices vary based on unit tier</div>
                <div class="p-4 text-center">REQUIRED<br />Prices vary based on unit tier</div>
            </div>

            <!-- Monthly Management Fees -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Monthly Management Fees<br /><span class="font-normal text-gray-500">Rent collection, tenant communication, maintenance coordination and emergency responses, tenant screening</span></div>
                <div class="border-r border-gray-300 p-4 text-center">10% of Monthly Rent per unit</div>
                <div class="border-r border-gray-300 p-4 text-center">9% of Monthly Rent per unit</div>
                <div class="p-4 text-center">8% of Monthly Rent per unit</div>
            </div>

            <!-- Reporting -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium"><span class="text-red-500">*</span>Reporting<br /><span class="font-normal text-gray-500">preventative maintenance inspections (Site Checks), budget control, tax prep assistance, security deposits, monthly rent & R.O.I. & more</span></div>
                <div class="border-r border-gray-300 p-4 text-center">Prices vary based on unit tier</div>
                <div class="border-r border-gray-300 p-4 text-center">Prices vary based on unit tier</div>
                <div class="p-4 text-center text-blue-600"><span class="text-red-500">*</span>INCLUDED</div>
            </div>

            <!-- APP -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">APP<br /><span class="font-normal text-gray-500">Quick Owner/Management portal access for easy monitoring, easy tenant, rent payment & repair requesting. APP whitelisting available</span></div>
                <div class="border-r border-gray-300 p-4 text-center">Available for purchasing</div>
                <div class="border-r border-gray-300 p-4 text-center">Available for purchasing</div>
                <div class="p-4 text-center">Available for purchasing</div>
            </div>

            <!-- Reserve Funds -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Reserve Funds<br /><span class="font-normal text-gray-500">Minor day to day maintenance.</span></div>
                <div class="border-r border-gray-300 p-4 text-center">Starts @ $500 plus<br />contracted duties</div>
                <div class="border-r border-gray-300 p-4 text-center">Starts @ $500 plus<br />contracted duties</div>
                <div class="p-4 text-center">Starts @ $500 plus<br />contracted duties</div>
            </div>

            <!-- Bill Pay -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Bill Pay<br /><span class="font-normal text-gray-500">Reaccuring bill payments e.g.: utilities, waste management insurance, HOA, mortgage etc</span></div>
                <div class="border-r border-gray-300 p-4 text-center">10% of monthly bill pay total</div>
                <div class="border-r border-gray-300 p-4 text-center">8% of monthly bill pay total</div>
                <div class="p-4 text-center">5% of monthly bill pay total</div>
            </div>

            <!-- Tenant Placement -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Tenant Placement<br /><span class="font-normal text-gray-500">Lease/Rent agreement paperwork, new tenant signed lease/Rent agreement, real estate commission, property/unit showings</span></div>
                <div class="border-r border-gray-300 p-4 text-center">95% of security deposit</div>
                <div class="border-r border-gray-300 p-4 text-center">80% of security deposit</div>
                <div class="p-4 text-center">65% of security deposit</div>
            </div>

            <!-- Lease Renewal -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Lease Renewal<br /><span class="font-normal text-gray-500">Renewing exisiting lease. Lease modifications</span></div>
                <div class="border-r border-gray-300 p-4 text-center">$200</div>
                <div class="border-r border-gray-300 p-4 text-center">$150</div>
                <div class="p-4 text-center">$95</div>
            </div>

            <!-- Vacancy -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Vacancy<br /><span class="font-normal text-gray-500">listing advertisement, marketing, real estate commission, preventative inspections e.g.: damages, squatters, potential break-ins</span></div>
                <div class="border-r border-gray-300 p-4 text-center">Pricing varies per workload<br />Quarterly Fee</div>
                <div class="border-r border-gray-300 p-4 text-center">Pricing varies per workload<br />Quarterly Fee</div>
                <div class="p-4 text-center">Pricing varies per workload<br />Quarterly Fee</div>
            </div>

            <!-- Evictions -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Evictions<br /><span class="font-normal text-gray-500">notice serving, move-out processes, attorney engagements, court apperances & other eviction protocols (documented reporting)</span></div>
                <div class="border-r border-gray-300 p-4 text-center">$50 per hour<br />plus court fees</div>
                <div class="border-r border-gray-300 p-4 text-center">$45 per hour<br />plus court fees</div>
                <div class="p-4 text-center">$35 per hour<br />plus court fees</div>
            </div>

            <!-- Maintenance -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Maintenance<br /><span class="font-normal text-gray-500">property/unit major repairs, unit renovations, landscaping upkeep, legal compliance e.g.: city, housing & section 8 re-inspection (monthly reporting)</span></div>
                <div class="border-r border-gray-300 p-4 text-center">Pricing varies per workload</div>
                <div class="border-r border-gray-300 p-4 text-center">Pricing varies per workload</div>
                <div class="p-4 text-center">Pricing varies per workload</div>
            </div>

            <!-- Tenant Initiative Program (TIP) -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium"><span class="text-red-500">*</span>Tenant Initiative Program (TIP)<br /><span class="font-normal text-gray-500">Interactive rewarding for tenant morale</span></div>
                <div class="border-r border-gray-300 p-4 text-center">Available for purchase</div>
                <div class="border-r border-gray-300 p-4 text-center">Available for purchase</div>
                <div class="p-4 text-center text-blue-600"><span class="text-red-500">*</span>INCLUDED</div>
            </div>

            <!-- Tenant Quarterly Newsletter -->
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium">Tenant Quarterly Newsletter<br />(monthly pricing also available)<br /><span class="font-normal text-gray-500">This instrument is critical in rooting tenants to the community in which they live stabilizing your R.O.I. by providing geographical information such as jobs, entertainment, public transportation information, food/toy drives, schools and more</span></div>
                <div class="border-r border-gray-300 p-4 text-center">Available for purchase</div>
                <div class="border-r border-gray-300 p-4 text-center text-blue-600">First Year Free</div>
                <div class="p-4 text-center text-blue-600">First 2 Years Free</div>
            </div>
            
            <!-- SELECT PLAN -->
            <!--
            <div class="grid grid-cols-4 p-4 border-t">
                <div class="border-r border-gray-300 p-4 font-medium"></div>
                <div class="border-r border-gray-300 p-4 text-center">
                    <div class="text-center">
                        <a href="" class="transition duration-500 ease-in-out button primary-bg-color inline-block py-3 px-10 text-white font-light rounded no-underline sm:mt-5 hover:bg-red-700 opacity-50 cursor-not-allowed">
                            Subscribe<br />
                            Premier 1 yr.
                        </a>
                    </div>
                </div>
                <div class="border-r border-gray-300 p-4 text-center">
                    <div class="text-center">
                        <a href="" class="transition duration-500 ease-in-out button primary-bg-color inline-block py-3 px-10 text-white font-light rounded no-underline sm:mt-5 hover:bg-red-700 opacity-50 cursor-not-allowed">
                            Subscribe<br />
                            Advanced 3 yrs.
                        </a>
                    </div>
                </div>
                <div class="border-r border-gray-300 p-4 text-center">
                    <div class="text-center">
                        <a href="" class="transition duration-500 ease-in-out button primary-bg-color inline-block py-3 px-10 text-white font-light rounded no-underline sm:mt-5 hover:bg-red-700 opacity-50 cursor-not-allowed">
                            Subscribe<br />
                            Paramount 5 yrs.
                        </a>
                    </div>
                </div>
            </div>
            -->
            </div>
        </div>
    </div>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Request a Plan</h1>
        @livewire('plan-form')
    </div>
</div>

@endsection
