<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $room->nama_kamar }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
                <img src="{{ $room->gambar_url }}" alt="{{ $room->nama_kamar }}" class="w-full h-72 object-cover">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $room->nama_kamar }}</h1>
                        <span class="text-sm bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 px-3 py-1 rounded-full">{{ $room->tipe }}</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $room->deskripsi }}</p>
                    <ul class="text-sm text-gray-600 dark:text-gray-300 mb-4 space-y-1">
                        <li>Kapasitas: {{ $room->kapasitas }} orang</li>
                        <li>Stok kamar: {{ $room->stok }}</li>
                        <li>Harga: Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }} / malam</li>
                    </ul>
                    @auth
                        @if(Auth::user()->role !== 'admin')
                            <a href="{{ route('pemesanan.create', ['room_id' => $room->id]) }}"
                               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition">
                                Pesan Kamar Ini
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-md transition">
                            Login untuk Memesan
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
