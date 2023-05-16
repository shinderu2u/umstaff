<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\Staff\StoreRequest;
use App\Http\Requests\Staff\UpdateRequest;
use App\Models\Harta;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query()
        // ->join('harta','harta.id','=','users.id_harta')

        ->when(
            request()->filled('carian'),
            function($query) {
                $termaCarian = strip_tags(request()->query('carian'));

                $query
                ->where(
                    fn ($query) => $query
                    ->where('name', 'LIKE', "%{$termaCarian}%")
                    ->orWhere('email', 'LIKE', "%{$termaCarian}%")
                    ->orWhere('no_staff', 'LIKE', "%{$termaCarian}%")
                );
            }
        )

        ->paginate(10);



        // dd('user');
        return view('staff.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $addUser = User::create([
                 'no_staff' => $request->input('no_staff'),
                 'name' => $request->input('name'),
                 'email' => $request->input('email'),
                 'jantina' => $request->input('jantina'),
                 'jawatan' => $request->input('jawatan'),
                 'no_tel' => $request->input('no_tel'),
                 'no_tel_pejabat' => $request->input('no_tel_pejabat'),
                 'alamat_pejabat' => $request->input('alamat_pejabat'),
                 'gambar' => $request->file('gambar'),

            ]);

        //     $addHarta = Harta::create([
        //         'jenis_harta' => $request->input('jenis_harta')

        //    ]);

            if($request->file('gambar')){
                $file= $request->file('gambar');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/image'), $filename);
                $data['image']= $filename;
            }

            $addUser->save();

            // $filePath->save();
            // dd($addUser);

            return redirect()->route('staff.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $users = User::find($id);

        return view('staff.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view ('staff.form', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {

            DB::transaction(function() use($request , $id) {

            $m = User::find($id);

            $m->update([
                 'no_staff' => $request->input('no_staff'),
                 'name' => $request->input('name'),
                 'email' => $request->input('email'),
                 'jantina' => $request->input('jantina'),
                 'jawatan' => $request->input('jawatan'),
                 'no_tel' => $request->input('no_tel'),
                 'no_tel_pejabat' => $request->input('no_tel_pejabat'),
                 'alamat_pejabat' => $request->input('alamat_pejabat'),
                 'jenis_harta' => $request->input('jenis_harta')
            ]);



            });
            // \Toastr::success('Berjaya Dikemaskini', 'Status Kemaskini', ["positionClass" => "toast-top-center", "progressBar" => 'true', "timeOut" => "2000"]);

            return redirect()->to(route('staff.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);

        $delete = $users->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Post deleted successfully!');
            return redirect()->route('staff.index');
        }

        return abort(500);
    }
}
