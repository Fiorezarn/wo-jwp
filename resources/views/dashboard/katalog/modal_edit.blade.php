<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal-edit-{{ $item->id_katalog }}">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4
    pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form method="POST" action="/katalog/update/{{ $item->id_katalog }}" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div>
                            <?php echo $item->id_katalog; ?>
                            <label for="nama_katalog" class="block text-sm font-medium text-gray-700">Nama
                                Katalog</label>
                            <input type="text" name="nama_katalog" id="nama_katalog"
                                value="{{ $item->nama_katalog }}" autocomplete="off" placeholder="Masukkan Nama Katalog"
                                required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="mt-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="masukan deskripsi" required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $item->deskripsi }}</textarea>
                        </div>
                        <div class="mt-4">
                            <img src="{{ url('posting_img/' . $item->gambar) }}" width="150px">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="mt-4">
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="text" name="harga" id="harga" value="{{ $item->harga }}"
                                autocomplete="off" placeholder="masukan harga" required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="bg-gray-200 px-4 py-3 text-right">
                        <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                            onclick="closeModal('modal-edit-{{ $item->id_katalog }}')"><i class="fas fa-times"></i>
                            Batal</button>
                        <button type="submit"
                            class="py-2 px-4 bg-green-500 text-white rounded font-medium hover:bg-blue-700 mr-2 transition duration-500"><i
                                class="fas fa-plus"></i> Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
