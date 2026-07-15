<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Kamar Tersedia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 px-4 py-3 rounded border border-green-400 bg-green-100 text-green-800 dark:bg-green-900 dark:border-green-600 dark:text-green-200">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 px-4 py-3 rounded border border-red-400 bg-red-100 text-red-800 dark:bg-red-900 dark:border-red-600 dark:text-red-200">
                    {{ session('error') }}
                </div>
            @endif

            @if($rooms->isEmpty())
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-center text-gray-600 dark:text-gray-300">
                    Belum ada kamar yang tersedia saat ini.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($rooms as $room)
                        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden flex flex-col">
                            <img src="{{ $room->gambar_url }}" alt="{{ $room->nama_kamar }}" class="w-full h-48 object-cover">
                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $room->nama_kamar }}</h3>
                                    <span class="text-xs bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 px-2 py-1 rounded-full">{{ $room->tipe }}</span>
                                </div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Kapasitas {{ $room->kapasitas }} orang &bull; Stok {{ $room->stok }} kamar</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex-1">{{ Str::limit($room->deskripsi, 100) }}</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xl font-bold text-gray-900 dark:text-white">Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }}</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">/ malam</span>
                                </div>
                                @auth
                                    @if(Auth::user()->role !== 'admin')
                                        <a href="{{ route('pemesanan.create', ['room_id' => $room->id]) }}"
                                           class="mt-4 inline-block text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition">
                                            Pesan Kamar
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                       class="mt-4 inline-block text-center bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition">
                                        Login untuk Memesan
                                    </a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
