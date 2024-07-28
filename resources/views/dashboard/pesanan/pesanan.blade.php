@extends('layouts.dashboard')
@section('title', 'Pesanan')
@section('body')

    <div class="p-6">
        <div class="flex items-center justify-between w-full">
            <h1 class="text-lg font-bold">Pesanan</h1>
            <button class="py-2 px-6 bg-blue-500 text-white rounded hover:bg-blue-700 transition font-medium duration-500"
                onclick="toggleModalAddKatalog()">Tambah</button>
            @include('dashboard.katalog.modal_create')
        </div>
        <div class="mt-10">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Email</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Gambar</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Harga</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm divide-y divide-gray-200">
                        @foreach ($pesanan as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                                <td>
                                    <select class="form-control status-dropdown" data-id="{{ $item->id_pesanan }}">
                                        <option class="text-yellow-500" value="belum bayar"
                                            {{ $item->status == 'belum dibayar' ? 'selected' : '' }}> Belum Dibayar
                                        </option>
                                        <option class="text-green-500" value="berhasil dibayar"
                                            {{ $item->status == 'berhasil dibayar' ? 'selected' : '' }}>
                                            Berhasil dibayar</option>
                                        <option class="text-red-500" value="cancel"
                                            {{ $item->status == 'cancel' ? 'selected' : '' }}>
                                            Cancel</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset('posting_img/' . $item->katalog->gambar) }}"
                                        alt="{{ $item->katalog->nama_katalog }}" width="90px">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp
                                    {{ number_format($item->total_harga, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Tombol untuk membuka modal edit -->
                                    <a class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 cursor-pointer"
                                        onclick="toggleModalEditkatalog({{ $item->id_katalog }})">
                                        <box-icon name='edit'></box-icon>
                                    </a>

                                    @include('dashboard.katalog.modal_edit')

                                    <!-- Tombol untuk membuka modal delete -->
                                    <a class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 cursor-pointer"
                                        onclick="openModal('modal-delete-{{ $item->id_pesanan }}')">
                                        <box-icon name='trash' type='solid' color='red'></box-icon>
                                    </a>
                                    @include('dashboard.pesanan.modal_delete')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.status-dropdown').change(function() {
                var id_pesanan = $(this).data('id');
                var status = $(this).val();
                $.ajax({
                    url: '/update-status/' + id_pesanan,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function(response) {},
                    error: function(xhr) {}
                });
            });
        });
    </script>
@endsection
