<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit Barang
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6">

                <!-- Pesan sukses/error -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                        <strong>Oops!</strong> Ada kesalahan:<br>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('olga.update', $olga->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Barang -->
                    <div class="mb-4">
                        <label for="Nama_barang" class="block text-gray-700 dark:text-gray-200 font-semibold">Nama Barang</label>
                        <input type="text" name="Nama_barang" id="Nama_barang" value="{{ old('Nama_barang', $olga->Nama_barang) }}"
                               class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="Status_barang" class="block text-gray-700 dark:text-gray-200 font-semibold">Status Barang</label>
                        <select name="Status_barang" id="Status_barang"
                                class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-white">
                            <option value="Baik" {{ $olga->Status_barang == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak" {{ $olga->Status_barang == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                    </div>

                    <div>
                        <label for="Jumlah_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Barang</label>
                        <input type="number" name="Jumlah_barang" id="Jumlah_barang"
                            value="{{ old('Jumlah_barang', $olga->Jumlah_barang) }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- Gambar -->
                    <div class="mb-4">
                        <label for="Gambar_barang" class="block text-gray-700 dark:text-gray-200 font-semibold">Gambar Barang</label>
                        <input type="file" name="Gambar_barang" id="Gambar_barang"
                               class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-white">

                        @if($olga->Gambar_barang)
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 dark:text-gray-300">Gambar sekarang:</p>
                                <img src="{{ asset('storage/'.$olga->Gambar_barang) }}" alt="Gambar Barang" class="mt-1 w-32 rounded-md shadow">
                            </div>
                        @endif
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-end">
                        <a href="{{ route('dashboard') }}" 
                           class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition mr-3">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg--600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                            💾 Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

