<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Status Pemesanan Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 text-green-600 dark:text-green-400">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 text-red-600 dark:text-red-400">{{ session('error') }}</div>
                    @endif

                    @if ($reservasis->isEmpty())
                        <p class="text-center text-gray-500 dark:text-gray-400">Anda belum melakukan pemesanan kamar.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kamar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Check-in</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Check-out</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tamu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status Pemesanan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($reservasis as $data)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $data->kamar->nama_kamar ?? '-' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $data->tanggal_checkin->format('d M Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $data->tanggal_checkout->format('d M Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $data->jumlah_tamu }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($data->status === 'diterima')
                                                <span class="inline-flex items-center px-2 py-1 bg-green-200 dark:bg-green-600 text-green-800 dark:text-green-100 text-xs font-semibold rounded-full">Diterima</span>
                                            @elseif($data->status === 'ditolak')
                                                <span class="inline-flex items-center px-2 py-1 bg-red-200 dark:bg-red-600 text-red-800 dark:text-red-100 text-xs font-semibold rounded-full">Ditolak</span>
                                            @else
                                                <span class="inline-flex items-center px-2 py-1 bg-yellow-200 dark:bg-yellow-600 text-yellow-800 dark:text-yellow-100 text-xs font-semibold rounded-full">Pending</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if ($data->status !== 'diterima')
                                                <span class="text-gray-400">Menunggu verifikasi pemesanan</span>
                                            @elseif (!$data->pembayaran)
                                                <a href="{{ route('pembayaran.create', $data->id) }}" class="text-blue-600 hover:underline">Konfirmasi Pembayaran</a>
                                            @elseif ($data->pembayaran->status === 'diterima')
                                                <span class="inline-flex items-center px-2 py-1 bg-green-200 dark:bg-green-600 text-green-800 dark:text-green-100 text-xs font-semibold rounded-full">Lunas</span>
                                            @elseif ($data->pembayaran->status === 'ditolak')
                                                <span class="inline-flex items-center px-2 py-1 bg-red-200 dark:bg-red-600 text-red-800 dark:text-red-100 text-xs font-semibold rounded-full">Ditolak</span>
                                            @else
                                                <span class="inline-flex items-center px-2 py-1 bg-yellow-200 dark:bg-yellow-600 text-yellow-800 dark:text-yellow-100 text-xs font-semibold rounded-full">Menunggu Verifikasi</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
