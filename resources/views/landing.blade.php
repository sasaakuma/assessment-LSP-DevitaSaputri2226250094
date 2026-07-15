<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Nirmala - Pemesanan Kamar Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-6">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }} Logo" class="h-10">
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ config('app.name') }}</h1>
                    <div class="flex space-x-4">
                        <a href="{{ route('kamar.index') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Lihat Kamar</a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Dashboard</a>
                            <!-- @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.announcements.index') }}" class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300">Admin</a>
                            @endif -->
                        @else
                            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Login</a>
                            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Banner Section -->
            <div class="mb-8">
                <div class="bg-blue-600 rounded-lg shadow-md flex items-center justify-center p-0">
                    <img src="{{ asset('images/banner.png') }}" alt="Banner" class="w-full h-64 object-cover rounded-lg">
                </div>
            </div>

            <!-- Room Highlights (multimedia: gambar) -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Kamar Pilihan</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <img src="{{ asset('images/rooms/standard.png') }}" alt="Kamar Standard" class="w-full h-32 object-cover rounded-lg shadow">
                    <img src="{{ asset('images/rooms/deluxe.png') }}" alt="Kamar Deluxe" class="w-full h-32 object-cover rounded-lg shadow">
                    <img src="{{ asset('images/rooms/suite.png') }}" alt="Kamar Suite" class="w-full h-32 object-cover rounded-lg shadow">
                    <img src="{{ asset('images/rooms/executive.png') }}" alt="Kamar Executive" class="w-full h-32 object-cover rounded-lg shadow">
                </div>
                <div class="text-center">
                    <a href="{{ route('kamar.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition">
                        Lihat Semua Kamar
                    </a>
                </div>
            </div>

            <!-- Video profil hotel (multimedia: video) -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Video Profil Hotel</h2>
                <div class="aspect-video max-w-3xl mx-auto rounded-lg overflow-hidden shadow-md">
                    {{-- Video contoh/placeholder — silakan ganti dengan video profil hotel Anda sendiri --}}
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/hNN9Q3GuWEM" title="Video Profil Hotel" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Pengumuman Terbaru</h2>
                <p class="text-gray-600 dark:text-gray-400">Informasi penting dan pengumuman terkini</p>
            </div>

            @if($announcements->count() > 0)
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
                <div class="text-center py-12">
                    <div class="text-gray-500 dark:text-gray-400 text-lg">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        <p>Belum ada pengumuman</p>
                    </div>
                </div>
            @endif
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="text-center text-gray-600 dark:text-gray-400">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
