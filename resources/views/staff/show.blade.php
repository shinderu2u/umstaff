<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Maklumat Staf' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'No.Staf' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $users->no_staff}}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Nama' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $users->name }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Email' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $users->email }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Jantina' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $users->jantina }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Jawatan' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $users->jawatan }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'No.Telefon' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $users->no_tel }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'No.Telefon Pejabat' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $users->no_tel_pejabat }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Alamat Pejabat' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $users->alamat_pejabat }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Gambar' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128" src="{{ url('public/Image/'.$users->gambar) }}" srcset="">
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Jenis Harta' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{-- {{ $users->harta->jenis_harta }} --}}
                            {{ '-' }}
                        </p>
                    </div>

                    <a href="{{ route('staff.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
