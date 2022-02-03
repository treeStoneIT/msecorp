---
extends: _layouts.main
title: Signs | Modern Sign & Engraving Corp
description: Electrical & Industrial Applications, Braille (ADA Signs), Sliding Signs, Restroom Signs, Directional Signs.
---

@section('body')
    <main>
        <div class="bg-warm-gray-50">
            <div class="max-w-2xl mx-auto py-20 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Our Product Lines</h2>
                    <p class="mt-4 text-gray-500">
                        Our customizable options can be the ideal solution for your company's signs.
                        From shape, size, and color you can customize the signs so it's perfectly suited for the
                        messages you need to relay. Lamacoids can clearly communicate information for anything in your facility from identification tags, electrical panels, legend plates, machine panels, cable tags, warning signs, valve tags, nameplates and more.
                    </p>
                </div>

                <div class="mt-16 space-y-16">
                    @foreach($page->productPageProducts as $product)
                        <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                            <div class="{{ $loop->odd ? 'lg:col-start-1':'lg:col-start-8 xl:col-start-9'}} mt-6 lg:mt-0 lg:row-start-1 lg:col-span-5 xl:col-span-4">
                                <h3 class="text-lg font-medium text-gray-900">{{ $product['name'] }}</h3>
                                <div class="mt-2 text-sm text-gray-500">
                                    {!! $product['description'] !!}
                                </div>
                            </div>
                            <div class="{{ $loop->odd ? 'lg:col-start-6 xl:col-start-5':'lg:col-start-1'}} flex-auto lg:row-start-1 lg:col-span-7 xl:col-span-8">
                                <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                    <img src="{{$product['imageSrc']}}"
                                         alt="{{$product['imageAlt']}}"
                                         class="object-center object-cover"/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('_partials.cta')
    </main>
@endsection
