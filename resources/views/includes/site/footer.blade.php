 <footer id="footer" class="footer-1 bg-black text-sm">
  <div class="border-b border-gray-500 pt-16 sm:pt-24 pb-14 sm:pb-14">
    <div class="container mx-auto px-4">

        <div class="sm:flex sm:flex-wrap sm:-mx-4 md:py-4">
            <div class="items-center businesshrs hidden lg:flex">
                <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#4786e5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <span class="text-white">
                    <p class="font-light">Business Hours:</p>
                    <p class="text-lg">Mon-Fri: 8AM-5PM</p>
                    <p class="text-lg">Sat: 8AM-3PM</p>
                </span>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto lg:justify-center">
                <div class="items-center justify-center">
                    <img src="/static/logo3-white.png" class="mx-auto w-7/12 -mb-2">
                    <p align="center" class="text-white pt-1 text-xl">LICENSE #1116439</p>
                </div>
            </div>
            <div class="items-center phonenumber hidden lg:flex">
                <div class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#4786e5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <span class="text-white">
                    <p class="text-2xl italic font-bold">Call Today!</p>
                    <p class="text-xl">562-535-6332</p>
                    <p class="text-xl">&nbsp;</p>
                </span>
            </div>
        </div>

        {{-- <div class="sm:flex sm:flex-wrap sm:-mx-4 md:py-4">
            <div class="flex items-center businesshrs">
                <span class="material-icons text-4xl mr-3 primary-text-color">schedule</span>
                <span class="font-normal text-white"><span class="text-sm">Business Hours:</span><br> <span class="text-xl">Mon-Sun: 7AM-7PM</span></span>
            </div>
            <div class="px-4 md:w-2/4 mt-8 sm:mt-0 text-center">
                <img src="/static/logo3-white.png" class="mx-auto w-7/12 -mb-2">
            </div>
            <div class="flex items-center phonenumber">
                <span class="material-icons text-4xl mr-3 primary-text-color">call</span>
                <span class="font-normal text-xl text-white">562-552-5753</span>
            </div>
        </div> --}}

    </div>
  </div>
  <div class="border-b border-gray-500 text-center py-4">
    <ul class="flex flex-col sm:flex-row sm:justify-center list-none footer-links text-xs text-white">
        <li class="sm:mb-2 inline-block">
            <a href="/terms-and-condition" class="uppercase hover:text-gray-300 mx-8 tracking-widest">Terms and Conditions</a>
        </li>
        <li class="sm:mb-2 inline-block">
            <a href="/privacy-policy" class="uppercase hover:text-gray-300 mx-8 tracking-widest">Privacy Policy</a>
        </li>
        <li class="sm:mb-2 inline-block">

          <a href="/faq" class="hover:text-gray-300 mx-8 tracking-widest">FAQs</a>
        </li>
    </ul>
  </div>
  <div class="text-xs text-white p-2">
    <div class="md:grid grid-cols-2 gap-4">
        <div class="text-center md:text-left">
            Copyright 2020 - {{ date('Y') }} <span class="font-bold">Properties/M</span>. All rights reserved.
        </div>
        <div class="text-center md:text-right">
            Developed by: <a href="https://go4globaldesign.com/" target="_blank" rel="noopener noreferrer">Go4GlobalDesign</a>
        </div>
    </div>
  </div>

</footer>
