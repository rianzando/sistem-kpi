<?php

namespace App\Http\Controllers;

use App\Models\KpiCorporate;
use App\Models\User;
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
            $usercount = User::count();
            $countkpicorporate = KpiCorporate::count();

            // Load the dashboard view and pass the authenticated user data
            return view('dashboard.index', compact('user', 'usercount', 'countkpicorporate'));
        }
    }
}
