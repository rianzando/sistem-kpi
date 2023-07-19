<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role', 'userdetail')->paginate(10); // Menggunakan paginate dengan 10 item per halaman
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
        $userDetail = UserDetail::all();

        return view('user.create', compact('roles', 'departements', 'userDetail'));
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
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;

            $user->save();
            // dd($request->all());

            // Simpan data user_detail baru ke dalam tabel user_details
            $userDetail = new UserDetail();
            $userDetail->user_id = $user->id;
            $userDetail->nik = $request->nik;
            $userDetail->domisili = $request->domisili;
            $userDetail->departement_id = $request->departement_id;
            $userDetail->address = $request->address;
            $userDetail->position = $request->position;
            $userDetail->location = $request->location;
            $userDetail->level = $request->level;
            $userDetail->spk_status = $request->spk_status;
            $userDetail->first_work_date = $request->first_work_date;
            $userDetail->end_work_date = $request->end_work_date;
            $userDetail->place_of_birth = $request->place_of_birth;
            $userDetail->date_of_birth = $request->date_of_birth;
            $userDetail->gender = $request->optionsRadios;
            $userDetail->education = $request->education;
            $userDetail->name_of_place = $request->name_of_place;
            $userDetail->major = $request->major;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $userDetail->image = $imagePath;
            }

            $userDetail->save();

            // Redirect ke halaman index pengguna dengan pesan sukses
            return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
            // } catch (QueryException $e) {
            //     dd($e->getMessage()); // Tampilkan pesan kesalahan query database
            //     return redirect()->route('users.create')->with('error', 'Terjadi kesalahan dalam menyimpan data. Mohon coba lagi.');
            // } catch (\Exception $e) {
            //     dd($e->getMessage()); // Tampilkan pesan kesalahan umum
            //     return redirect()->route('users.create')->with('error', 'Terjadi kesalahan. Mohon coba lagi atau hubungi administrator.');
            // }
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
