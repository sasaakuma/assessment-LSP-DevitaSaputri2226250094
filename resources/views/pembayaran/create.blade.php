<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Konfirmasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="flex justify-center px-4 sm:px-6 lg:px-8 py-8">
        <div class="w-full max-w-2xl bg-white dark:bg-gray-900 shadow-md rounded-lg p-8 sm:p-10">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2 text-center">
                Konfirmasi Pembayaran
            </h1>
            <p class="text-center text-gray-500 dark:text-gray-400 mb-6">
                {{ $booking->room->nama_kamar }} &bull; {{ $booking->tanggal_checkin->format('d M Y') }} - {{ $booking->tanggal_checkout->format('d M Y') }}
                &bull; Total: <strong>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</strong>
            </p>

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

            <form action="{{ route('pembayaran.store', $booking) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode_pembayaran"
                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2">
                        <option value="">-- Pilih Metode --</option>
                        <option value="Transfer Bank" {{ old('metode_pembayaran') == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                        <option value="E-Wallet" {{ old('metode_pembayaran') == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                        <option value="Kartu Kredit/Debit" {{ old('metode_pembayaran') == 'Kartu Kredit/Debit' ? 'selected' : '' }}>Kartu Kredit/Debit</option>
                    </select>
                    @error('metode_pembayaran') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="jumlah_bayar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jumlah yang Dibayar (Rp)</label>
                    <input type="number" min="0" name="jumlah_bayar" id="jumlah_bayar" value="{{ old('jumlah_bayar', $booking->total_harga) }}"
                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2">
                    @error('jumlah_bayar') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bukti Transfer / Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*"
                        class="w-full text-gray-700 dark:text-gray-200">
                    @error('bukti_pembayaran') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="w-full pt-6 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                        Kirim Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
