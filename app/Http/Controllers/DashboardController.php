<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\KpiCorporate;
use App\Models\kpiDepartement;
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


    public function getKpiDepartementChartData()
    {
        // Get all departments
        $departments = Departement::all();

        // Initialize arrays to store department names and achievements
        $departmentNames = [];
        $achievement = [];

        // Loop through each department and calculate the average achievement
        foreach ($departments as $department) {
            $averageAchievement = kpiDepartement::where('departement_id', $department->id)->avg('achievement');
            // Round the average achievement to 2 decimal places (you can adjust this as needed)
            $averageAchievement = round($averageAchievement, 2);

            // Add the department name and achievement to the respective arrays
            $departmentNames[] = $department->name;
            $achievement[] = $averageAchievement;
        }

        $data = [
            'department_names' => $departmentNames,
            'achievement' => $achievement,
        ];

        // dd($data);

        return response()->json($data);
    }
}
