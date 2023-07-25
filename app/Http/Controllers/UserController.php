<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Directorate;
use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $search = $request->input('search'); // Mendapatkan kata kunci pencarian dari request
    $perPage = $request->input('perpage', 10); // Mendapatkan jumlah item per halaman dari request (default: 10)

    $query = User::query();

    // Jika ada kata kunci pencarian, tambahkan kondisi pencarian ke query
    if ($search) {
        $query->where('name', 'LIKE', '%' . $search . '%');
    }

    $users = $query->paginate($perPage);
    $entries = [5, 10, 25, 50]; // Pilihan jumlah data entries per halaman

    return view('user.index', compact('users', 'search', 'perPage','entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data roles dan departements untuk ditampilkan di form
        $roles = Role::all();
        $directorates = Directorate::all();
        $departements = Departement::all();
        $userDetail = UserDetail::all();

        return view('user.create', compact('roles','directorates', 'departements', 'userDetail'));
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
            $userDetail->directorate_id = $request->directorate_id;
            $userDetail->departement_id = $request->departement_id;
            $userDetail->address = $request->address;
            $userDetail->phone = $request->phone;
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
        }  catch (\Throwable $th) {
            // Tangkap exception jika ada masalah dengan query database
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menyimpan data User. ' . $th->getMessage()]);
        }  catch (\Throwable $th) {
            // Tangkap exception umum jika ada kesalahan lainnya
            return redirect()->route('users.create')->with('error', 'Terjadi kesalahan. Mohon coba lagi atau hubungi administrator.');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('user.show', compact('user'));
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    try {
        // Find the user by ID along with its user_detail
        $user = User::with('userdetail')->findOrFail($id);

        // Fetch all roles and departements for dropdowns
        $roles = Role::all();
        $directorates = Directorate::all();
        $departements = Departement::all();

        // Return the view with user data and dropdown options
        return view('user.edit', compact('user', 'roles', 'departements','directorates'));
    } catch (\Throwable $th) {
        // Handle database query exception
        return redirect()->route('users.index')->with('error', 'Failed to fetch user data. ' . $th->getMessage());
    } catch (\Exception $e) {
        // Handle other general exceptions
        return redirect()->route('users.index')->with('error', 'An error occurred. Please try again or contact the administrator.');
    }
    }

    function change()
    {
        return view('user.change');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validasi input dari form
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'role_id' => 'required|exists:roles,id',
                'departement_id' => 'required|exists:departements,id',
                'image' => 'nullable|image|mimes:png,jpg,jpeg|max:10048',
                // Add more validation rules for other fields in the form
            ]);

            // Cari pengguna berdasarkan $id
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;

            if ($request->filled('password')) {
                // Update password if provided
                $user->password = bcrypt($request->password);
            }

            $user->save();

            // Cari user_detail berdasarkan $id pengguna
            $userDetail = UserDetail::where('user_id', $id)->firstOrFail();
            $userDetail->nik = $request->nik;
            $userDetail->domisili = $request->domisili;
            $userDetail->directorate_id = $request->directorate_id;
            $userDetail->departement_id = $request->departement_id;
            $userDetail->address = $request->address;
            $userDetail->phone = $request->phone;
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
                // Delete old image if exists
                if ($userDetail->image) {
                    Storage::delete('public/' . $userDetail->image);
                }

                // Update image if new image is uploaded
                $imagePath = $request->file('image')->store('images', 'public');
                $userDetail->image = $imagePath;
            }

            $userDetail->save();

            // Redirect to the user profile page with success message
        //     return redirect()->route('users.index')->with('success', 'User data has been updated successfully!');
        // } catch (\Throwable $th) {
        //     // Handle database query exception
        //     return redirect()->back()->withInput()->withErrors(['error' => 'Failed to update user data. ' . $th->getMessage()]);
        // } catch (\Exception $e) {
        //     // Handle other general exceptions
        //     return redirect()->route('users.index')->with('error', 'An error occurred. Please try again or contact the administrator.');
        // }

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diupdate!');
    } catch (QueryException $e) {
            dd($e->getMessage()); // Tampilkan pesan kesalahan query database
            return redirect()->route('users.edit')->with('error', 'Terjadi kesalahan dalam menyimpan data. Mohon coba lagi.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan kesalahan umum
            return redirect()->route('users.edit')->with('error', 'Terjadi kesalahan. Mohon coba lagi atau hubungi administrator.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari pengguna berdasarkan $id
            $user = User::findOrFail($id);

            // Hapus data user_detail terlebih dahulu
            $userDetail = UserDetail::where('user_id', $id)->firstOrFail();
            if ($userDetail->image) {
                // Hapus gambar jika ada
                Storage::delete('public/' . $userDetail->image);
            }
            $userDetail->delete();

            // Hapus data pengguna
            $user->delete();

            // Redirect ke halaman index pengguna dengan pesan sukses
            return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
        } catch (\Throwable $th) {
            // Tangkap exception jika ada masalah dalam menghapus data
            return redirect()->route('users.index')->with('error', 'Gagal menghapus pengguna. ' . $th->getMessage());
        }
    }



    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);

        try {
            DB::beginTransaction();

            // Mengubah status pengguna
            if ($user->status === 'active') {
                $user->status = 'inactive';
            } elseif ($user->status === 'inactive') {
                $user->status = 'active';
            }

            $user->save();

            // Send the notification email to the user
            // Mail::to($user->email)->send(new UserStatusApprovedMail($user));

            DB::commit();
            return redirect()->route('users.index')->with('success', 'Status User berhasil diubah!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('users.index')->with('error', 'Gagal mengubah status User');
        }
    }

    function profile()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // If the user is logged in, show their profile
        if ($user) {
            return view('user.profile', compact('user'));
        } else {
            // If the user is not logged in, redirect them to the login page
            return redirect()->route('login')->with('error', 'You need to log in to view your profile.');
        }
    }


    public function updateprofile(Request $request, $id)
    {
        // dd($request->all());
        try {
            // Validate the input fields
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                // Add more validation rules for other fields if needed
            ]);

            // Find the user by ID
            $user = User::find($id);
            if (!$user) {
                return redirect()->route('users.profile', $id)->with('error', 'User not found.');
            }

            // Update the user data
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            // If a new password is provided, update the password
            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            // Save the changes to the user model
            $user->save();

            // Find or create userdetail for the user
            $userdetail = UserDetail::where('user_id', $id)->first();
            if (!$userdetail) {
                // If userdetail doesn't exist, create a new record
                $userdetail = new UserDetail();
                $userdetail->user_id = $user->id;
            }

            // Update the userdetail data
            $userdetail->nik = $request->input('nik');
            $userdetail->domisili = $request->input('domisili');
            $userdetail->phone = $request->input('phone');
            $userdetail->address = $request->input('address');
            $userdetail->place_of_birth = $request->input('place_of_birth');
            $userdetail->date_of_birth = $request->input('date_of_birth');
            $userdetail->education = $request->input('education');
            $userdetail->name_of_place = $request->input('name_of_place');
            $userdetail->major = $request->input('major');

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($userdetail->image) {
                    Storage::delete('public/' . $userdetail->image);
                }

                // Update image if new image is uploaded
                $imagePath = $request->file('image')->store('images', 'public');
                $userdetail->image = $imagePath;
            }
            // Save the changes to the userdetail model
            $userdetail->save();
            // dd($request->all());

            return redirect()->route('users.profile', $id)->with('success', 'Profile updated successfully.');
        } catch (\Throwable $th) {
            // Log the error for debugging purposes
            Log::error('Error updating profile: ' . $th->getMessage());
            Log::error($th->getTraceAsString());

            return redirect()->route('users.profile', $id)->with('error', 'An error occurred while updating the profile.');
        }
    }
}