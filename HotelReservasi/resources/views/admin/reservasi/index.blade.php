<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Verifikasi Pemesanan Kamar') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="mb-4 text-green-600 dark:text-green-400">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="mb-4 text-red-600 dark:text-red-400">{{ session('error') }}</div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tamu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kamar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Check-in</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Check-out</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($reservasis as $data)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $data->nama }}<br><span class="text-xs text-gray-500">{{ $data->email }}</span></td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $data->kamar->nama_kamar ?? '-' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $data->tanggal_checkin->format('d M Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $data->tanggal_checkout->format('d M Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100 capitalize">
                                            @if($data->status === 'diterima')
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Diterima</span>
                                            @elseif($data->status === 'ditolak')
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">Ditolak</span>
                                            @else
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Pending</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                            @if($data->status === 'pending')
                                                <form method="POST" action="{{ route('admin.reservasi.update', $data->id) }}" class="flex items-center gap-2">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" class="rounded dark:bg-gray-700 dark:text-white">
                                                        <option value="pending" {{ $data->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="diterima" {{ $data->status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                                                        <option value="ditolak" {{ $data->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                    </select>
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                                        Simpan
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-xs text-gray-400 italic">Sudah diverifikasi, tidak dapat diubah</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-gray-500 dark:text-gray-400">Belum ada pemesanan kamar.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>