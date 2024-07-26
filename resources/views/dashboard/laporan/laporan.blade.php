@extends('layouts.dashboard')
@section('title', 'Pesanan')
@section('body')

    <div class="p-6">
        <div class="flex items-center justify-between w-full">
            <h1 class="text-lg font-bold">Laporan Pesanan</h1>
        </div>
        <div class="mt-10">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nama Katalog</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Gambar</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Total Pesanan</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Total Harga</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm divide-y divide-gray-200">
                        @foreach ($data as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->nama_katalog }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset('posting_img/' . $item->gambar) }}" alt="{{ $item->nama_katalog }}"
                                        width="90px">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->total_pesanan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp
                                    {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
