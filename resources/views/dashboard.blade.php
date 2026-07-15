<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- ✅ ALERT SUKSES --}}
                    @if (session('success'))
                        <div id="success-alert" class="mb-4 px-4 py-3 rounded border border-green-400 bg-green-100 text-green-800 dark:bg-green-900 dark:border-green-600 dark:text-green-200 transition-opacity duration-1000">
                            {{ session('success') }}
                        </div>
                    @endif

                    Selamat datang, {{ Auth::user()->name }}!                
                </div>

                {{-- ✅ STATUS VERIFIKASI --}}
                @if(Auth::user() && Auth::user()->role === 'guest')
                    @php
                        $statusClass = auth()->user()->is_verified
                        ? 'bg-green-100 text-green-800 border border-green-400 dark:bg-green-900 dark:text-green-200 dark:border-green-700'
                        : 'bg-yellow-100 text-yellow-800 border border-yellow-400 dark:bg-yellow-900 dark:text-yellow-200 dark:border-yellow-600';
                    @endphp
                    <div class="fixed bottom-0 left-0 w-full mt-4 p-4 rounded z-50 {{ $statusClass }}">
                        @if (auth()->user()->is_verified)
                            ✅ Akun Anda telah <strong>diverifikasi</strong> oleh admin.
                        @else
                            ⏳ Akun Anda <strong>belum diverifikasi</strong> oleh admin.<br>
                            Silakan tunggu hingga admin menyetujui pendaftaran Anda untuk mengakses fitur-fitur lainnya.
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ✅ JAVASCRIPT UNTUK HILANGKAN ALERT --}}
    <script>
        setTimeout(function () {
            const alertBox = document.getElementById('success-alert');
            if (alertBox) {
                alertBox.style.opacity = '0';
                setTimeout(() => alertBox.remove(), 1000); // Hapus dari DOM setelah efek fade-out
            }
        }, 5000); // 5 detik
    </script>
</x-app-layout>
