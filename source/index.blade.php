@extends('_layouts.main')

@section('body')
    <main>
        <div class="bg-white">
            <div
                    class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
                <div>
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Our Products</h2>
                    <p class="mt-4 text-gray-500">This method of labeling anything in your facility is cost effective
                        and leads to
                        a professional, polished look.</p>

                    <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
                        @foreach($page->homePageProducts as $product)
                            <div class="border-t border-gray-200 pt-4">
                                <dt class="font-medium text-gray-900">{{ $product['name'] }}</dt>
                                <dd class="mt-2 text-sm text-gray-500">{{ $product['description'] }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
                <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                    <img src="/assets/images/lamacoid-safety-sign-control-panel.jpg"
                         alt="lamacoid safety sign control panel"
                         class="bg-gray-100 rounded-lg"/>
                    <img
                            src="/assets/images/lamacoid-nameplate-sign.jpg"
                            class="bg-gray-100 rounded-lg"
                            alt="lamacoid door nameplate sign"/>
                    <img src="/assets/images/lamacoid-directional-door-sign.jpg"
                         class="bg-gray-100 rounded-lg"
                         alt="lamacoid directional door sign"/>
                    <img src="/assets/images/lamacoid-brail-ada-sign.jpg"
                         alt="lamacoid Brail ADA sign"
                         class="bg-gray-100 rounded-lg"/>
                </div>
            </div>
        </div>
        @include('_partials.cta')
    </main>

@endsection
