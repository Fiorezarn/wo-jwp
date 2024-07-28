@extends('layouts.app')
@section('title', 'Detail Katalog')
@section('content')

    <div class="flex items-center bg-indigo-100 w-screen min-h-screen" style="font-family: 'Muli', sans-serif;">
        <div class="container mx-auto flex flex-wrap items-start">
            <div class="w-full pl-5 lg:pl-2 mb-4 mt-4">
                <h1 class="text-3xl lg:text-4xl text-gray-700 font-extrabold">
                    Detail Katalog
                </h1>
            </div>
            <div class="w-full pl-5 pr-5 mb-5 lg:pl-2 lg:pr-2">
                <div class="bg-white rounded-lg p-5 shadow-lg">
                    <figure class="mb-4">
                        <img src="{{ asset('posting_img/' . $katalog->gambar) }}" alt="{{ $katalog->nama_katalog }}"
                            class="w-full h-auto rounded-lg" />
                    </figure>
                    <div class="rounded-lg p-4 bg-purple-700 text-white">
                        <h2 class="text-3xl font-bold mb-2">{{ $katalog->nama_katalog }}</h2>
                        <p class="text-base mb-4">{!! $katalog->deskripsi !!}</p>
                        <div class="text-lg font-light mb-4">
                            Harga: Rp.{{ number_format($katalog->harga, 0, ',', '.') }}
                        </div>
                        <div class="flex items-center">
                            <a href="/"
                                class="bg-purple-900 text-white px-4 py-2 rounded-full hover:bg-white hover:text-purple-900 hover:shadow-xl transition duration-300">
                                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Katalog
                            </a>
                            <button onclick="toggleModalAddPesanan()"
                                class="bg-green-500 text-white px-4 py-2 rounded-full ml-4 hover:bg-green-600 transition duration-300">
                                <i class="fa-solid fa-cart-plus mr-2"></i> Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modalAddPesanan">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <form method="POST" action="{{ route('addPesanan') }}" enctype="multipart/form-data" id="pesananForm">
                        @csrf
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" autocomplete="off"
                                    placeholder="Masukkan Email Anda" required
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mt-4 hidden">
                                <label for="id_katalog" class="block text-sm font-medium text-gray-700">ID Katalog</label>
                                <input type="text" name="id_katalog" id="id_katalog" autocomplete="off"
                                    value="{{ $katalog->id_katalog }}" placeholder="Masukkan ID Katalog" required
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mt-4">
                                <label for="total_harga" class="block text-sm font-medium text-gray-700">Total Harga</label>
                                <input type="text" name="total_harga" id="total_harga" autocomplete="off"
                                    value="{{ $katalog->harga }}" placeholder="Masukkan Total Harga" required readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="bg-gray-200 px-4 py-3 text-right">
                            <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                                onclick="toggleModalAddPesanan()"><i class="fas fa-times"></i> Batal</button>
                            <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-white rounded font-medium hover:bg-blue-700 mr-2 transition duration-500"><i
                                    class="fas fa-plus"></i> Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleModalAddPesanan() {
            document.getElementById('modalAddPesanan').classList.toggle('hidden');
        }
    </script>

@endsection
