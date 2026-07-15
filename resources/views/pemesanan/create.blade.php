<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pemesanan Kamar') }}
        </h2>
    </x-slot>

    <div class="flex justify-center px-4 sm:px-6 lg:px-8 py-8">
        <div class="w-full max-w-2xl bg-white dark:bg-gray-900 shadow-md rounded-lg p-8 sm:p-10">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">
                Formulir Pemesanan Kamar
            </h1>

            @if ($errors->any())
                <div class="bg-red-100 dark:bg-red-900 border border-red-300 dark:border-red-600 text-red-800 dark:text-red-200 px-4 py-3 rounded mb-6">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($rooms->isEmpty())
                <p class="text-gray-600 dark:text-gray-300 text-center">Tidak ada kamar tersedia untuk dipesan saat ini.</p>
            @else
                <form action="{{ route('pemesanan.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="room_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih Kamar</label>
                        <select name="room_id" id="room_id" required
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2">
                            <option value="">-- Pilih Kamar --</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ (old('room_id', $selectedRoomId) == $room->id) ? 'selected' : '' }}>
                                    {{ $room->nama_kamar }} ({{ $room->tipe }}) - Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }}/malam
                                </option>
                            @endforeach
                        </select>
                        @error('room_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tanggal_checkin" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Check-in</label>
                            <input type="date" name="tanggal_checkin" id="tanggal_checkin" value="{{ old('tanggal_checkin') }}" min="{{ date('Y-m-d') }}"
                                class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2">
                            @error('tanggal_checkin') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="tanggal_checkout" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Check-out</label>
                            <input type="date" name="tanggal_checkout" id="tanggal_checkout" value="{{ old('tanggal_checkout') }}" min="{{ date('Y-m-d') }}"
                                class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2">
                            @error('tanggal_checkout') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="jumlah_tamu" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jumlah Tamu</label>
                        <input type="number" name="jumlah_tamu" id="jumlah_tamu" min="1" value="{{ old('jumlah_tamu', 1) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2">
                        @error('jumlah_tamu') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full pt-6 flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                            Pesan Sekarang
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
