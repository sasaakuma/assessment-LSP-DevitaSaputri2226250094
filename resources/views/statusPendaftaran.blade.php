<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Status Pendaftaran') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-left">
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">No HP</th>
                            <th class="border px-4 py-2">NIK</th>
                            <th class="border px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $data)
                            <tr class="border-t">
                                <td class="border px-4 py-2">{{ $data->nama }}</td>
                                <td class="border px-4 py-2">{{ $data->email }}</td>
                                <td class="border px-4 py-2">{{ $data->no_hp }}</td>
                                <td class="border px-4 py-2">{{ $data->nik }}</td>
                                <td class="border px-4 py-2">
                                    <span class="inline-block px-3 py-1 rounded-full
                                        @if($data->status == 'pending') bg-yellow-500 text-white
                                        @elseif($data->status == 'diterima') bg-green-600 text-white
                                        @else bg-red-600 text-white
                                        @endif">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
