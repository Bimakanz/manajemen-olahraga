<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Perlengkapan Olahraga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Error Handling -->
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Create -->
                <form action="{{ route('olga.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nama Barang -->
                    <div>
                        <label for="Nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Barang</label>
                        <input type="text" name="Nama_barang" id="Nama_barang"
                            value="{{ old('Nama_barang') }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="Status_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status Barang</label>
                        <select name="Status_barang" id="Status_barang"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="">-- Pilih Status --</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <!-- Jumlah Barang -->
                    <div>
                        <label for="Jumlah_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Barang</label>
                        <input type="number" name="Jumlah_barang" id="Jumlah_barang"
                            value="{{ old('Jumlah_barang') }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="Gambar_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Barang</label>
                        <input type="file" name="Gambar_barang" id="Gambar_barang"
                            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('olga.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
