<x-app-layout>
 <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Hotel Nusantara') }}
    </h2>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            {{-- ✅ ALERT SUKSES --}}
            @if (session('success'))
                <div id="success-alert" class="px-4 py-3 rounded border border-green-400 bg-green-100 text-green-800 dark:bg-green-900 dark:border-green-600 dark:text-green-200 transition-opacity duration-1000">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ✅ HERO BANNER --}}
            <div class="relative rounded-lg shadow-md overflow-hidden bg-cover bg-center p-10 sm:p-14"
                 style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1600');">
                <div class="absolute inset-0 bg-black/55"></div>
                <div class="relative text-white">
                    <h1 class="text-2xl sm:text-3xl font-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="text-gray-200">
                        @if(Auth::user()->role === 'admin')
                            Kelola pemesanan kamar, pembayaran, dan pengumuman Hotel Nusantara dari sini.
                        @else
                            Pesan kamar impian Anda dan pantau status pemesanan dengan mudah.
                        @endif
                    </p>
                </div>
            </div>

            {{-- ✅ STATUS VERIFIKASI (Tamu) --}}
            @if(Auth::user() && Auth::user()->role === 'guest')
                @php
                    $statusClass = auth()->user()->is_verified
                        ? 'bg-green-100 text-green-800 border border-green-400 dark:bg-green-900 dark:text-green-200 dark:border-green-700'
                        : 'bg-yellow-100 text-yellow-800 border border-yellow-400 dark:bg-yellow-900 dark:text-yellow-200 dark:border-yellow-600';
                @endphp
                <div class="p-4 rounded {{ $statusClass }}">
                    @if (auth()->user()->is_verified)
                        ✅ Akun Anda telah <strong>diverifikasi</strong> oleh admin.
                    @else
                        ⏳ Akun Anda <strong>belum diverifikasi</strong> oleh admin.<br>
                        Silakan tunggu hingga admin menyetujui pendaftaran Anda untuk mengakses fitur-fitur lainnya.
                    @endif
                </div>
            @endif

            {{-- ✅ MENU CEPAT --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(Auth::user()->role !== 'admin')
                    @if(Auth::user()->status === 'diterima')
                        <a href="{{ route('reservasi.create') }}"
                           class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition flex items-start gap-4">
                            <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full p-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2zm0 0l9-4 9 4M7 21v-4a2 2 0 012-2h6a2 2 0 012 2v4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Pesan Kamar</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Pilih kamar dan buat pemesanan baru.</p>
                            </div>
                        </a>

                        <a href="{{ route('status.reservasi') }}"
                           class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition flex items-start gap-4">
                            <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full p-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Status Pemesanan & Pembayaran</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Pantau status pemesanan dan konfirmasi pembayaran Anda.</p>
                            </div>
                        </a>
                    @else
                        <div class="bg-gray-100 dark:bg-gray-800/50 shadow-sm rounded-lg p-6 flex items-start gap-4 opacity-60 cursor-not-allowed" title="Menunggu verifikasi admin">
                            <div class="bg-gray-200 dark:bg-gray-700 text-gray-400 rounded-full p-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2zm0 0l9-4 9 4M7 21v-4a2 2 0 012-2h6a2 2 0 012 2v4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-500 dark:text-gray-400">Pesan Kamar</h3>
                                <p class="text-sm text-gray-400 dark:text-gray-500">Tersedia setelah akun Anda diverifikasi admin.</p>
                            </div>
                        </div>

                        <div class="bg-gray-100 dark:bg-gray-800/50 shadow-sm rounded-lg p-6 flex items-start gap-4 opacity-60 cursor-not-allowed" title="Menunggu verifikasi admin">
                            <div class="bg-gray-200 dark:bg-gray-700 text-gray-400 rounded-full p-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-500 dark:text-gray-400">Status Pemesanan & Pembayaran</h3>
                                <p class="text-sm text-gray-400 dark:text-gray-500">Tersedia setelah akun Anda diverifikasi admin.</p>
                            </div>
                        </div>
                    @endif
                @endif

                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.reservasi.index') }}"
                       class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition flex items-start gap-4">
                        <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Verifikasi Pemesanan Kamar</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Terima atau tolak pemesanan kamar tamu.</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.pembayaran.index') }}"
                       class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition flex items-start gap-4">
                        <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h5M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Verifikasi Pembayaran</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Terima atau tolak konfirmasi pembayaran tamu.</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.pending-users') }}"
                       class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition flex items-start gap-4">
                        <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Verifikasi Akun Tamu</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Setujui atau tolak pendaftaran akun baru.</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.announcements.index') }}"
                       class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition flex items-start gap-4">
                        <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Kelola Pengumuman</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tambah, ubah, atau hapus pengumuman.</p>
                        </div>
                    </a>
                @endif
            </div>

            {{-- ✅ PILIHAN KAMAR --}}
            @if(isset($kamars) && $kamars->count() > 0)
                <div>
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Pilihan Kamar Kami</h2>
                        <p class="text-gray-600 dark:text-gray-400">Nikmati kenyamanan menginap dengan berbagai tipe kamar</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($kamars as $kamar)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                                <img src="{{ $kamar->gambar }}" alt="{{ $kamar->nama_kamar }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $kamar->nama_kamar }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">{{ $kamar->tipe_kamar }} · kapasitas {{ $kamar->kapasitas }} orang</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">{{ \Illuminate\Support\Str::limit($kamar->deskripsi, 90) }}</p>
                                    <div class="flex items-center justify-between">
                                        <p class="text-blue-600 dark:text-blue-400 font-bold">Rp {{ number_format($kamar->harga, 0, ',', '.') }} / malam</p>
                                         @if(Auth::user()->role !== 'admin' && Auth::user()->status === 'diterima')
                                            <a href="{{ route('reservasi.create') }}" class="text-sm text-blue-600 hover:underline">Pesan &rarr;</a>
                                        @elseif(Auth::user()->role !== 'admin')
                                            <span class="text-sm text-gray-400 cursor-not-allowed" title="Menunggu verifikasi admin">Pesan &rarr;</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- ✅ GALERI HOTEL --}}
            <div>
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Galeri Hotel</h2>
                    <p class="text-gray-600 dark:text-gray-400">Suasana dan fasilitas Hotel Nusantara</p>
                </div>

                <div class="relative max-w-3xl mx-auto" id="hotel-gallery">
                    <div class="relative rounded-lg overflow-hidden shadow-md aspect-video bg-black">
                        @php
                            $galleryImages = [
                                'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200',
                                'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=1200',
                                'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=1200',
                                'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=1200',
                            ];
                        @endphp

                        @foreach($galleryImages as $index => $image)
                            <img src="{{ $image }}" alt="Galeri Hotel {{ $index + 1 }}"
                                 class="gallery-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-500 {{ $index === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}"
                                 data-index="{{ $index }}">
                        @endforeach

                        <button type="button" onclick="hotelGalleryMove(-1)"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white rounded-full w-10 h-10 flex items-center justify-center transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>

                        <button type="button" onclick="hotelGalleryMove(1)"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white rounded-full w-10 h-10 flex items-center justify-center transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>

                    <div class="flex justify-center gap-2 mt-4">
                        @foreach($galleryImages as $index => $image)
                            <button type="button" onclick="hotelGalleryGoTo({{ $index }})"
                                class="gallery-dot w-2.5 h-2.5 rounded-full transition {{ $index === 0 ? 'bg-blue-500' : 'bg-gray-400 dark:bg-gray-600' }}"
                                data-index="{{ $index }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ✅ PENGUMUMAN TERBARU --}}
            <div>
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Pengumuman Terbaru</h2>
                    <p class="text-gray-600 dark:text-gray-400">Informasi penting dan pengumuman terkini</p>
                </div>

                @if(isset($announcements) && $announcements->count() > 0)
                    <div class="space-y-6">
                        @foreach($announcements as $announcement)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                                <div class="p-6">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                                {{ $announcement->title }}
                                            </h3>
                                            <div class="text-gray-600 dark:text-gray-300 mb-4">
                                                {!! nl2br(e($announcement->content)) !!}
                                            </div>
                                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                {{ $announcement->published_at->format('d F Y, H:i') }}
                                            </div>
                                        </div>
                                        @if($announcement->priority > 0)
                                            <span class="bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 text-xs font-semibold px-2.5 py-0.5 rounded">
                                                Penting
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-gray-500 dark:text-gray-400">Belum ada pengumuman</p>
                @endif
            </div>

        </div>
    </div>

    <script>
        setTimeout(function () {
            const alertBox = document.getElementById('success-alert');
            if (alertBox) {
                alertBox.style.opacity = '0';
                setTimeout(() => alertBox.remove(), 1000);
            }
        }, 5000);

        let hotelGalleryCurrent = 0;
        const hotelGalleryTotal = document.querySelectorAll('#hotel-gallery .gallery-slide').length;

        function hotelGalleryRender() {
            document.querySelectorAll('#hotel-gallery .gallery-slide').forEach((el) => {
                const isActive = parseInt(el.dataset.index) === hotelGalleryCurrent;
                el.classList.toggle('opacity-100', isActive);
                el.classList.toggle('opacity-0', !isActive);
                el.classList.toggle('pointer-events-none', !isActive);
            });
            document.querySelectorAll('#hotel-gallery .gallery-dot').forEach((el) => {
                const isActive = parseInt(el.dataset.index) === hotelGalleryCurrent;
                el.classList.toggle('bg-blue-500', isActive);
                el.classList.toggle('bg-gray-400', !isActive);
                el.classList.toggle('dark:bg-gray-600', !isActive);
            });
        }

        function hotelGalleryMove(step) {
            hotelGalleryCurrent = (hotelGalleryCurrent + step + hotelGalleryTotal) % hotelGalleryTotal;
            hotelGalleryRender();
        }

        function hotelGalleryGoTo(index) {
            hotelGalleryCurrent = index;
            hotelGalleryRender();
        }

        (function () {
            const container = document.querySelector('#hotel-gallery');
            let touchStartX = 0;

            container.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });

            container.addEventListener('touchend', (e) => {
                const touchEndX = e.changedTouches[0].screenX;
                const diff = touchEndX - touchStartX;
                if (Math.abs(diff) > 50) {
                    hotelGalleryMove(diff > 0 ? -1 : 1);
                }
            });
        })();
    </script>
</x-app-layout>