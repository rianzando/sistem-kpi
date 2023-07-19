<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role', 'detail')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data roles dan departements untuk ditampilkan di form
        $roles = Role::all();
        $departements = Departement::all();

        return view('user.create', compact('roles', 'departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input dari form
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'role_id' => 'required|exists:roles,id',
                'departement_id' => 'required|exists:departements,id',
                'image' => 'nullable|image|mimes:png,jpg,jpeg|max:10048',
                // Add more validation rules for other fields in the form
            ]);

            // Simpan data pengguna baru ke dalam tabel users
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role_id = $request->input('role_id');

            $user->save();

            // Simpan data user_detail baru ke dalam tabel user_details
            $userDetail = new UserDetail(); // Change $detail to $userDetail
            $userDetail->user_id = $user->id; // Gunakan $user, bukan $userDetail
            $userDetail->nik = $request->input('nik');
            $userDetail->domisili = $request->input('domisili');
            $userDetail->departement_id = $request->input('departement_id');
            $userDetail->address = $request->input('address');
            $userDetail->position = $request->input('position');
            $userDetail->level = $request->input('level');
            $userDetail->spk_status = $request->input('spk_status');
            $userDetail->first_work_date = $request->input('first_work_date');
            $userDetail->end_work_date = $request->input('end_work_date');
            $userDetail->place_of_birth = $request->input('place_of_birth');
            $userDetail->date_of_birth = $request->input('date_of_birth');
            $userDetail->gender = $request->input('optionsRadios');
            $userDetail->education = $request->input('education');
            $userDetail->name_of_place = $request->input('name_of_place');
            $userDetail->major = $request->input('major');
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $userDetail->image = $imagePath;
            }

            $userDetail->save();

            // Redirect ke halaman index pengguna dengan pesan sukses
            return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
        } catch (QueryException $e) {
            // Tangkap exception jika ada masalah dengan query database
            return redirect()->route('users.create')->with('error', 'Terjadi kesalahan dalam menyimpan data. Mohon coba lagi.');
        } catch (\Exception $e) {
            // Tangkap exception umum jika ada kesalahan lainnya
            return redirect()->route('users.create')->with('error', 'Terjadi kesalahan. Mohon coba lagi atau hubungi administrator.');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
