<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Pengumuman') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.announcements.edit', $announcement) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                    Edit
                </a>
                <a href="{{ route('admin.announcements.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition">
                    Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg font-semibold mb-4">Halo, {{ Auth::user()->name }}! 👋</p>

                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $announcement->title }}</h3>
                        
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="flex items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-300">Status:</span>
                                @if($announcement->is_active)
                                    <span class="ml-2 inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                        Aktif
                                    </span>
                                @else
                                    <span class="ml-2 inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                        Nonaktif
                                    </span>
                                @endif
                            </div>
                            
                            <div class="flex items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-300">Prioritas:</span>
                                <span class="ml-2 font-semibold">{{ $announcement->priority }}</span>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-sm text-gray-600 dark:text-gray-300">Tanggal Publish:</span>
                            <span class="ml-2">{{ $announcement->published_at ? $announcement->published_at->format('d F Y, H:i') : 'Belum ditentukan' }}</span>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-sm text-gray-600 dark:text-gray-300">Dibuat:</span>
                            <span class="ml-2">{{ $announcement->created_at->format('d F Y, H:i') }}</span>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-sm text-gray-600 dark:text-gray-300">Terakhir diupdate:</span>
                            <span class="ml-2">{{ $announcement->updated_at->format('d F Y, H:i') }}</span>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-300 dark:border-gray-600 pt-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Isi Pengumuman</h4>
                        <div class="prose prose-sm dark:prose-invert max-w-none">
                            {!! nl2br(e($announcement->content)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
