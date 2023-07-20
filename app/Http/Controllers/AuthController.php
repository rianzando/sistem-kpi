<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }
    function authenticating(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->filled('remember'); //Menentukan apakah opsi "Remember Me" dicentang atau tidak

        if (Auth::attempt($credentials, $remember)) {
            # Periksa apakah user dengan status active
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'Failed');
                Session::flash('message', 'Your account is not active yet. Please contact the admin!');
                return redirect('login');
            }

            $request->session()->regenerate();
            return redirect('dashboard');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login failed. Check your email or password!');
        return redirect('login');
    }


    function registeruser(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'password' => 'required',
                'email' => 'required|email|unique:users,email',
                'role_id' => 'nullable',

            ]);

            $user = new User();
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->save();

            // Mail::to('feriansyah@ptmpk.com')->cc('feriansyahtp@gmail.com')->send(new UserRegistered($user));
            // Mail::to($user->email)->send(new UserRegisteredMail($user));

            Session::flash('status', 'success');
            Session::flash('message', 'Successful Register! Wait for Admin Approval.');
            return view('auth.register');
        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {
                $errorMessage = 'Failed to register. Please make sure to fill in all the required fields.';
            } else {
                $errorMessage = 'Failed to register. Please try again later.';
            }

            Session::flash('failed', 'failed');
            Session::flash('message', $errorMessage);
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Session::flash('status', 'success');
        Session::flash('message', 'You have been logged out');
        return redirect('login');
    }

}
