<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pemesanan Kamar') }}
        </h2>
    </x-slot>

    <div class="flex justify-center px-4 sm:px-6 lg:px-8 py-8">
        <div class="w-full max-w-3xl bg-white dark:bg-gray-900 shadow-md rounded-lg p-8 sm:p-10">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">
                Formulir Pemesanan Kamar Hotel
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

            @if (session('success'))
                <div id="success-alert" class="bg-green-100 dark:bg-green-900 border border-green-300 dark:border-green-600 text-green-800 dark:text-green-200 px-4 py-3 rounded mb-6 transition-opacity duration-1000">
                    {{ session('success') }}
                </div>
            @endif

            @if($kamars->isEmpty())
                <p class="text-center text-gray-500 dark:text-gray-400">Saat ini belum ada kamar yang tersedia.</p>
            @else
                <form action="{{ route('reservasi.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="kamar_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih Kamar</label>
                        <select name="kamar_id" id="kamar_id"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                            <option value="">-- Pilih Kamar --</option>
                            @foreach ($kamars as $kamar)
                                <option value="{{ $kamar->id }}" {{ old('kamar_id') == $kamar->id ? 'selected' : '' }}>
                                    {{ $kamar->nama_kamar }} ({{ $kamar->tipe_kamar }}) - Rp {{ number_format($kamar->harga, 0, ',', '.') }} / malam
                                </option>
                            @endforeach
                        </select>
                        @error('kamar_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        @foreach ($kamars as $kamar)
                            <div class="border border-gray-200 dark:border-gray-700 rounded-md overflow-hidden">
                                <img src="{{ $kamar->gambar }}" alt="{{ $kamar->nama_kamar }}" class="w-full h-24 object-cover">
                                <div class="p-2 text-xs text-gray-600 dark:text-gray-300">{{ $kamar->nama_kamar }} · kapasitas {{ $kamar->kapasitas }} orang</div>
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', Auth::user()->name) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                        @error('nama') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                        @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor HP</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                            pattern="[0-9]+" inputmode="numeric"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                        @error('no_hp') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="tanggal_checkin" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Check-in</label>
                            <input type="date" name="tanggal_checkin" id="tanggal_checkin" value="{{ old('tanggal_checkin') }}"
                                class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                            @error('tanggal_checkin') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="tanggal_checkout" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Check-out</label>
                            <input type="date" name="tanggal_checkout" id="tanggal_checkout" value="{{ old('tanggal_checkout') }}"
                                class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                            @error('tanggal_checkout') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="jumlah_tamu" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jumlah Tamu</label>
                        <input type="number" min="1" max="10" name="jumlah_tamu" id="jumlah_tamu" value="{{ old('jumlah_tamu', 1) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
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

    <script>
        setTimeout(function () {
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.opacity = '0';
                setTimeout(() => successAlert.remove(), 1000);
            }
        }, 5000);
    </script>
</x-app-layout>
