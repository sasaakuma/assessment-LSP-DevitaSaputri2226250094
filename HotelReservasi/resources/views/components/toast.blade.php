@if (session('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="fixed top-5 right-5 z-[9999] bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg"
        role="alert"
    >
        <strong class="font-bold">Sukses!</strong> {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition
        class="fixed top-5 right-5 z-[9999] bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg mt-2"
        role="alert"
    >
        <strong class="font-bold">Error!</strong> {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition
        class="fixed top-5 right-5 z-[9999] bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg mt-2"
        role="alert"
    >
        <strong class="font-bold">Terjadi kesalahan!</strong>
        <ul class="mt-2 text-sm list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
