@extends('layouts.app')
@section('title', 'WO-JWP')
@section('content')
    <section>
        <div class="bg-black text-white py-20">
            <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
                <div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
                    <h1 class="text-3xl md:text-5xl p-2 text-yellow-300 tracking-loose">Welcome!</h1>
                    <h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">JWP WO
                    </h2>
                    <p class="text-sm md:text-base text-gray-50 mb-4 text-justify">Selamat datang di WO-JWP, di mana setiap
                        detail
                        pernikahan Anda direncanakan dengan sempurna. Kami
                        memahami bahwa pernikahan adalah momen paling istimewa dalam hidup Anda, dan kami berdedikasi untuk
                        menjadikannya hari yang tak terlupakan.</p>
                    <a href="#"
                        class="bg-transparent hover:bg-yellow-300 text-yellow-300 hover:text-black rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 hover:border-transparent">
                        Explore Now</a>
                </div>
                <div class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3  justify-center">
                    <div class="h-48 flex flex-wrap content-center">
                        <div>
                            <img class="inline-block mt-28 xl:block"
                                src="https://user-images.githubusercontent.com/54521023/116969935-c13d5b00-acd4-11eb-82b1-5ad2ff10fb76.png">
                        </div>
                        <div>
                            <img class="inline-block mt-24 md:mt-0 p-8 md:p-0"
                                src="https://user-images.githubusercontent.com/54521023/116969931-bedb0100-acd4-11eb-99a9-ff5e0ee9f31f.png">
                        </div>
                        <div>
                            <img class="inline-block mt-28 lg:block"
                                src="https://user-images.githubusercontent.com/54521023/116969939-c1d5f180-acd4-11eb-8ad4-9ab9143bdb50.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="flex items-center bg-indigo-100 w-screen min-h-screen" style="font-family: 'Muli', sans-serif;">
        <div class="container ml-auto mr-auto flex flex-wrap items-start">
            <div class="w-full pl-5 lg:pl-2 mb-4 mt-4">
                <h1 class="text-3xl lg:text-4xl text-gray-700 font-extrabold">
                    Katalog
                </h1>
            </div>
            @foreach ($katalog as $item)
                <div class="w-full md:w-1/2 lg:w-1/4 pl-5 pr-5 mb-5 lg:pl-2 lg:pr-2">
                    <div
                        class="bg-white rounded-lg m-h-64 p-2 transform hover:translate-y-2 hover:shadow-xl transition duration-300">
                        <figure class="mb-2">
                            <img src="{{ asset('posting_img/' . $item->gambar) }}" alt=""
                                class="h-64 ml-auto mr-auto" />
                        </figure>
                        <div class="rounded-lg p-4 bg-purple-700 flex flex-col">
                            <div>
                                <h5 class="text-white text-2xl font-bold leading-none">
                                    {{ $item->nama_katalog }}
                                </h5>
                                <span class="text-xs text-gray-400 leading-none">{!! Illuminate\Support\Str::limit($item->deskripsi, 50, '...') !!}</span>
                            </div>
                            <div class="flex items-center">
                                <div class="text-lg text-white font-light">
                                    Rp.{{ number_format($item->harga, 0, ',', '.') }}
                                </div>
                                <button href="javascript:;"
                                    class="rounded-full bg-purple-900 text-white hover:bg-white hover:text-purple-900 hover:shadow-xl focus:outline-none w-10 h-10 flex ml-auto transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="stroke-current m-auto">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
