<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        <p class="text-sm text-gray-500">Success: {{ session('success') }}</p>
        <p class="text-sm text-gray-500">Error: {{ session('error') }}</p>

        <!-- Toast Notification -->
        <div
            x-data="{ show: {{ session('success') || session('error') || $errors->any() ? 'true' : 'false' }}, timeout: null }"
            x-init="timeout = setTimeout(() => show = false, 4000)"
            x-show="show"
            x-transition
            class="fixed top-5 right-5 z-[9999] bg-yellow-200 p-2"
        >
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @elseif(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @elseif ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg" role="alert">
                    <strong class="font-bold">Ada kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @include('components.toast')
        {{ $slot }}
    </main>
</div>
