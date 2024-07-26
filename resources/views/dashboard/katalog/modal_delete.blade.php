                                    <!-- Modal -->
                                    <div id="modal-delete-{{ $item->id_katalog }}"
                                        class="fixed z-10 inset-0 overflow-y-auto hidden">
                                        <div class="flex items-center justify-center min-h-screen px-4">
                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                            </div>

                                            <div
                                                class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                                                <div class="bg-red-500 px-4 py-5 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div
                                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                            <box-icon name='trash' type='solid'
                                                                color='red'></box-icon>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <h3 class="text-lg leading-6 font-medium text-white">
                                                                Delete Katalog
                                                            </h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-white">
                                                                    Apakah kamu yakin ingin menghapus katalog
                                                                    {{ $item->nama_katalog }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <a href="/katalog/delete/{{ $item->id_katalog }}"
                                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Delete
                                                    </a>
                                                    <button type="button"
                                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                                        onclick="closeModal('modal-delete-{{ $item->id_katalog }}')">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        // modal delete katalog
                                        function openModal(modalId) {
                                            document.getElementById(modalId).classList.remove('hidden');
                                        }

                                        function closeModal(modalId) {
                                            document.getElementById(modalId).classList.add('hidden');
                                        }
                                    </script>
