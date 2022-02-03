<header x-data="{ open: false, toggle() { this.open = ! this.open } }" class="relative overflow-hidden">
    <nav aria-label="Top" class="relative z-20 bg-white bg-opacity-90 backdrop-filter backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-20 py-2 flex items-center">
                <button @click="toggle" type="button" class="bg-white p-2 rounded-md text-gray-400 lg:hidden">
                    <span class="sr-only">Open menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         aria-hidden="true" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="ml-4 flex lg:ml-0">
                    <a class="hover:cursor-pointer" href="/">
                        <span class="sr-only">Modern Sign &amp; Engraving Corp</span>
                        <img src="/assets/images/msecorp-logo-cropped.svg" class="h-12 w-auto" alt=""></a>
                </div>
                <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                    <div class="h-full flex space-x-8 uppercase px-4">
                        <a href="/about"
                           class="border-transparent flex items-center font-medium text-gray-500 hover:text-primary hover:border-secondary border-b-2 hover:cursor-pointer">
                            About
                        </a>
                        <a href="/products"
                           class="border-transparent flex items-center font-medium text-gray-500 hover:text-primary hover:border-secondary border-b-2 hover:cursor-pointer">
                            Products
                        </a>
                        <a href="/contact"
                           class="border-transparent flex items-center font-medium text-gray-500 hover:text-primary hover:border-secondary border-b-2 hover:cursor-pointer">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div
            x-show="open"
            x-transition
            class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
        <div aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-25"></div>
        <div class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
            <div class="px-4 pt-5 pb-2 flex">
                <button @click="toggle" type="button" class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400"
                        tabindex="0"><span class="sr-only">Close menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         aria-hidden="true" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                <div class="flow-root">
                    <a href="/about" class="-m-2 p-2 block font-medium text-gray-900">
                        About
                    </a>
                </div>
                <div class="flow-root">
                    <a href="/products" class="-m-2 p-2 block font-medium text-gray-900">
                        Products
                    </a>
                </div>
                <div class="flow-root">
                    <a href="/contact" class="-m-2 p-2 block font-medium text-gray-900">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>

    @includeWhen($page->getPath() == '','_partials.home-hero-section')
</header>