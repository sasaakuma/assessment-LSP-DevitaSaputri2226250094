<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                <div class="max-w-xl">
                     @php
                        $statusClass = auth()->user()->is_verified
                        ? 'bg-green-100 text-green-800 border border-green-400 dark:bg-green-900 dark:text-green-200 dark:border-green-700'
                        : 'bg-yellow-100 text-yellow-800 border border-yellow-400 dark:bg-yellow-900 dark:text-yellow-200 dark:border-yellow-600';
                    @endphp

                    <div class="p-4 {{ $statusClass }}">
                        @if (auth()->user()->is_verified)
                            ✅ Akun Anda telah <strong>diverifikasi</strong> oleh admin.
                        @else
                            ⏳ Akun Anda <strong>belum diverifikasi</strong> oleh admin.<br>
                            Silakan tunggu hingga admin menyetujui pendaftaran Anda.
                        @endif
                    </div>                
                </div>
            </div>
    </div>

</x-app-layout>
