<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ 'Senarai Staf' }}
            </h2>
            <a href="{{ route('staff.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">TAMBAH STAF</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card" style="text-align: center">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="m-0"></h5>
                            <a class="btn btn-outline-primary btn-sm" href="#collapse-carian-audit" data-toggle="collapse" >{{ __('Carian Staf') }}</a>
                        </div>
                    </div>

                    <div class="card-body {{ (request()->query('carian')) ? 'show' : null }}" id="collapse-carian-audit">
                        <form class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="carian" value="{{ request()->query('carian') }}" placeholder="{{ __('Carian') }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('Cari') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="p-8 text-gray-800">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">#</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">No.Staf</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">Nama</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">Email</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">Jantina</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">Jawatan</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">No.Tel</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">No.Pejabat</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-left">Alamat Pejabat</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-800 text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white-800">
                            {{-- populate our post data --}}
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $loop->iteration }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $user->no_staff }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $user->name }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $user->email }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $user->jantina }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $user->jawatan }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $user->no_tel }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $user->no_tel_pejabat }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-800 dark:text-slate-400">{{ $user->alamat_pejabat }}</td>

                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        <div class="container">
                                            <div class="row">
                                              <div class="col-sm">
                                                <a href="{{ route('staff.show', $user->id) }}" class="border border-blue-500 hover:bg-blue-500 hover:text-white px-2 py-2 rounded-md">SHOW</a>
                                              </div>
                                              <br>
                                              <div class="col-sm">
                                                <a href="{{ route('staff.edit', $user->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-2 py-2 rounded-md">EDIT</a>
                                              </div>
                                              <br>
                                              <div class="col-sm">
                                                {{-- add delete button using form tag --}}
                                                <form method="post" action="{{ route('staff.destroy', $user->id) }}" class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="border border-red-500 hover:bg-red-500 hover:text-white px-2 py-2 rounded-md">DELETE</button>
                                                </form>
                                              </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ( $users->hasPages() )
                        {{ $users->withQueryString()->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
