<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Minjem Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                

                <!-- Form Create -->
                <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nama Barang -->
                    <div>
                        <label for="Nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Barang</label>
                        <input type="text" name="Nama_barang" id="Nama_barang"
                            value="{{ old('Nama_barang') }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label for="Nama_peminjam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Peminjam</label>
                        <input type="text" name="Nama_peminjam" id="Nama_peminjam"
                            value="{{ old('Nama_peminjam') }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="Tanggal_pinjam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Minjem</label>
                        <input type="date" name="Tanggal_pinjam" id="Tanggal_pinjam"
                            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                     <div>
                        <label for="Tanggal_balikin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Balikin</label>
                        <input type="date" name="Tanggal_balikin" id="Tanggal_balikin"
                            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div>
                        <label for="Jumlah_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Barang</label>
                        <input type="text" name="Jumlah_barang" id="Jumlah_barang"
                            value="{{ old('Jumlah_barang') }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('form.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>

