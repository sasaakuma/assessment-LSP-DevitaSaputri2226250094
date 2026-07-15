<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Status Pendaftaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($pendaftarans)
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No HP</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Alamat</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">NIK</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pendaftarans->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pendaftarans->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pendaftarans->no_hp }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pendaftarans->alamat }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pendaftarans->nik }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($pendaftarans->status === 'diterima')
                                            <span class="inline-flex items-center px-2 py-1 bg-green-200 dark:bg-green-600 text-green-800 dark:text-green-100 text-xs font-semibold rounded-full">Diterima</span>
                                        @elseif($pendaftarans->status === 'ditolak')
                                            <span class="inline-flex items-center px-2 py-1 bg-red-200 dark:bg-red-600 text-red-800 dark:text-red-100 text-xs font-semibold rounded-full">Ditolak</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 bg-yellow-200 dark:bg-yellow-600 text-yellow-800 dark:text-yellow-100 text-xs font-semibold rounded-full">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-gray-500 dark:text-gray-400">
                            Anda belum mendaftar.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
