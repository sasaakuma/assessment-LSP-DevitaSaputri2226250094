<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.kamar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="nama_kamar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Kamar</label>
                            <input type="text" name="nama_kamar" id="nama_kamar" value="{{ old('nama_kamar') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white @error('nama_kamar') border-red-500 @enderror">
                            @error('nama_kamar') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tipe" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Kamar</label>
                            <select name="tipe" id="tipe" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white @error('tipe') border-red-500 @enderror">
                                <option value="">-- Pilih Tipe --</option>
                                @foreach(['Standard', 'Deluxe', 'Suite', 'Executive'] as $tipe)
                                    <option value="{{ $tipe }}" {{ old('tipe') == $tipe ? 'selected' : '' }}>{{ $tipe }}</option>
                                @endforeach
                            </select>
                            @error('tipe') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div>
                                <label for="harga_per_malam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga / Malam (Rp)</label>
                                <input type="number" min="0" name="harga_per_malam" id="harga_per_malam" value="{{ old('harga_per_malam') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white @error('harga_per_malam') border-red-500 @enderror">
                                @error('harga_per_malam') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="kapasitas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kapasitas (orang)</label>
                                <input type="number" min="1" name="kapasitas" id="kapasitas" value="{{ old('kapasitas', 2) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white @error('kapasitas') border-red-500 @enderror">
                                @error('kapasitas') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="stok" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stok Kamar</label>
                            <input type="number" min="0" name="stok" id="stok" value="{{ old('stok', 1) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white @error('stok') border-red-500 @enderror">
                            @error('stok') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Kamar</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*"
                                class="mt-1 block w-full text-gray-700 dark:text-gray-200 @error('gambar') border-red-500 @enderror">
                            @error('gambar') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                    class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Aktifkan kamar (tampil ke tamu)</span>
                            </label>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Simpan Kamar
                            </button>
                            <a href="{{ route('admin.kamar.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
