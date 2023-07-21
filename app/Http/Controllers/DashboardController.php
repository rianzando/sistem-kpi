<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Load the dashboard view and pass the authenticated user data
            return view('dashboard.index', compact('user'));
        }

        // If the user is not authenticated, redirect to the login page
        return redirect()->route('login');
    }
}