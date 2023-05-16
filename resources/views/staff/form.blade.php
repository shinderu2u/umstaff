<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{-- {{ isset($post) ? 'Edit' : 'Create' }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white-300 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    {{-- <form method="post" action="{{ isset($users) ? route('staff.update', $users->id) : route('staff.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data" class="mt-6 space-y-6"> --}}

                        <form  method="post" action="{{route('staff.update', $users->id)}}" class="mt-6 space-y-6" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        @method('put')

                        <div>
                            <x-input-label for="no_staff" value="No.Staf" />
                            <x-text-input id="no_staff" name="no_staff" type="text" class="mt-1 block w-full" :value="$users->no_staff ?? old('no_staff')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('no_staff')" />
                        </div>

                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$users->name ?? old('name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$users->email ?? old('email')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="jantina" value="Jantina" />
                            <x-text-input id="jantina" name="jantina" type="text" class="mt-1 block w-full" :value="$user->jantina ?? old('jantina')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('jantina')" />
                        </div>

                        <div>
                            <x-input-label for="jawatan" value="Jawatan" />
                            <x-text-input id="jawatan" name="jawatan" type="text" class="mt-1 block w-full" :value="$user->jawatan ?? old('jawatan')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('jawatan')" />
                        </div>

                        <div>
                            <x-input-label for="no_tel" value="No.Telefon" />
                            <x-text-input id="no_tel"  name="no_tel" type="number" class="mt-1 block w-full" :value="$user->no_tel ?? old('no_tel')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('no_tel')" />
                        </div>

                        <div>
                            <x-input-label for="no_tel_pejabat" value="No.Pejabat" />
                            <x-text-input id="no_tel_pejabat" name="no_tel_pejabat" type="text" class="mt-1 block w-full" :value="$user->no_tel_pejabat ?? old('no_tel_pejabat')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('no_tel_pejabat')" />
                        </div>

                        <div>
                            <x-input-label for="alamat_pejabat" value="Alamat Pejabat" />
                            <x-text-input id="alamat_pejabat" name="alamat_pejabat" type="text" class="mt-1 block w-full" :value="$user->alamat_pejabat ?? old('alamat_pejabat')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('alamat_pejabat')" />
                        </div>

                        <div>
                            <x-input-label for="jenis_harta" value="Jenis Harta" />
                            <x-text-input id="jenis_harta" name="jenis_harta" type="text" class="mt-1 block w-full" :value="$user->jenis_harta ?? old('jenis_harta')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('jenis_harta')" />
                        </div>

                        {{-- <div>
                            <x-input-label for="maklumat_harta" value="Maklumat Harta" />
                            <x-textarea-input id="maklumat_harta" name="maklumat_harta" class="mt-1 block w-full" required autofocus>{{ $harta->maklumat_harta ?? old('maklumat_harta') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('maklumat_harta')" />
                        </div> --}}



                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('SIMPAN') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        // create onchange event listener for featured_image input
        document.getElementById('featured_image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
            }
        }
    </script> --}}
</x-app-layout>
