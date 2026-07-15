<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Status Pemesanan Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

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

                    @if($bookings->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400">Anda belum memiliki pemesanan kamar. <a href="{{ route('kamar.index') }}" class="text-blue-600 hover:underline">Lihat daftar kamar</a>.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Kamar</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Check-in</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Check-out</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Total</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status Pemesanan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $booking->room->nama_kamar ?? '-' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $booking->tanggal_checkin->format('d M Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $booking->tanggal_checkout->format('d M Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($booking->status === 'diterima')
                                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-300 dark:text-green-900">Diterima</span>
                                                @elseif($booking->status === 'ditolak')
                                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-300 dark:text-red-900">Ditolak</span>
                                                @else
                                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-300 dark:text-yellow-900">Menunggu</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if($booking->status === 'diterima')
                                                    @if($booking->payment)
                                                        @if($booking->payment->status === 'diterima')
                                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-300 dark:text-green-900">Lunas</span>
                                                        @elseif($booking->payment->status === 'ditolak')
                                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-300 dark:text-red-900">Ditolak</span>
                                                        @else
                                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-300 dark:text-yellow-900">Menunggu Verifikasi</span>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('pembayaran.create', $booking) }}" class="text-blue-600 hover:underline">Konfirmasi Pembayaran</a>
                                                    @endif
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
