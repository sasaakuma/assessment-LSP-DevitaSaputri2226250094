<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pendaftaran Akun Tamu') }}
        </h2>
    </x-slot>
    <div class="flex justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-3xl bg-white dark:bg-gray-900 shadow-md rounded-lg p-8 sm:p-10">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">
                Formulir Pendaftaran Akun Tamu Hotel
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

            <form action="{{ route('pendaftaran.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                    @error('nama') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                    {{-- ✅ Tambahan penanganan error spesifik untuk email --}}
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                        pattern="[0-9]+" inputmode="numeric"
                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                    @error('no_hp') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">{{ old('alamat') }}</textarea>
                    @error('alamat') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">NIK (Nomor Induk Kependudukan)</label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}"
                        maxlength="20" pattern="[0-9]+" inputmode="numeric"
                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:border-blue-500 dark:focus:border-blue-400">
                    @error('nik') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="w-full pt-6 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                        Daftar Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ✅ Script untuk menghilangkan alert sukses otomatis --}}
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
