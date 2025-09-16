<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight text-center">
            Daftar Barang Laboratorium
        </h2>
    </x-slot>

    <div class="py-20 px-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($olga as $o)
                <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition flex flex-col">
                    
                    {{-- Gambar Barang --}}
                    @if ($o->Gambar_barang)
                        <img src="{{ asset('storage/' . $o->Gambar_barang) }}" 
                             alt="{{ $o->Nama_barang }}" 
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 flex items-center justify-center text-gray-400 bg-gray-700">
                            Tidak ada gambar
                        </div>
                    @endif

                    {{-- Isi Card --}}
                    <div class="p-4 flex flex-col flex-grow justify-between">
                        <div>
                            <h2 class="text-lg text-white font-semibold mb-2">
                                {{ $o->Nama_barang }}
                            </h2>
                            <p class="text-sm text-gray-300 mb-1">
                            @if ($o->Jumlah_barang <= 0)
                                <span class="text-red-500 font-bold">Stok Habis</span>
                            @else
                                <span class="text-green-500 font-bold">Stok Tersedia</span>
                            @endif
                            <br>
                            Jumlah : {{ $o->Jumlah_barang }}</p>
                            <p class="text-sm text-white {{ $o->Status_barang }}">
                                Status : {{ $o->Status_barang }}
                            </p>
                        </div>

                        {{-- Tombol Pinjam --}}

                        @if ($o->Jumlah_barang <= 0)
                            <div class="mt-4">
                                <button disabled
                                   class="block w-full text-center bg-gray-500 text-white py-2 px-4 rounded-lg cursor-not-allowed">
                                    📌 Stok Habis
                                </button>
                            </div>
                        @else
                            <div class="mt-4">
                                <a href="{{ route('form.create', $o->id) }}"
                                   class="block w-full text-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                    📌 Pinjam Barang
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-400">Tidak ada barang tersedia</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
