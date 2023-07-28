<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Directorate;
use App\Models\KpiCorporate;
use App\Models\kpiDepartement;
use App\Models\KpiDirectorate;
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
            $countkpidirectorate = KpiDirectorate::count();
            $countkpidepartement= kpiDepartement::count();
            $kpidepartements = kpiDepartement::query()->latest('achievement')->paginate(5);
            $countdone = kpiDepartement::where('status', 'Done')->count();
            $countprogress = kpiDepartement::where('status', 'On Progress')->count();
            $countopen = kpiDepartement::where('status', 'Open')->count();

            return view('dashboard.index', compact(
                'user',
                'usercount',
                'countkpicorporate',
                'countkpidirectorate',
                'countkpidepartement',
                'kpidepartements',
                'countdone',
                'countprogress',
                'countopen'
            ));
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


    public function getKpiDirectorateChartData()
    {
        // Get all departments
        $directorates = Directorate::all();

        // Initialize arrays to store department names and achievements
        $directorateNames = [];
        $achievement = [];

        // Loop through each department and calculate the average achievement
        foreach ($directorates as $directorate) {
            $averageAchievement = KpiDirectorate::where('directorate_id', $directorate->id)->avg('achievement');
            // Round the average achievement to 2 decimal places (you can adjust this as needed)
            $averageAchievement = round($averageAchievement, 2);

            // Add the department name and achievement to the respective arrays
            $directorateNames[] = $directorate->name;
            $achievement[] = $averageAchievement;
        }

        $data = [
            'directorate_names' => $directorateNames,
            'achievement' => $achievement,
        ];

        // dd($data);

        return response()->json($data);
    }



    // kpidepartement berdasarkan status
    public function getKpiDepartementstatusChartData()
{
    // Get all KPI Departements with their respective department names and statuses
    $kpis = kpiDepartement::with('departement')->get();

    // Initialize an associative array to store status counts for each department
    $statusCountsByDepartment = [];

    // Loop through each KPI Departement and calculate the status counts
    foreach ($kpis as $kpi) {
        $departmentName = $kpi->departement->name;
        $status = $kpi->status;

        // If the department does not exist in the $statusCountsByDepartment array, initialize it
        if (!isset($statusCountsByDepartment[$departmentName])) {
            $statusCountsByDepartment[$departmentName] = [
                'Open' => 0,
                'On Progress' => 0,
                'Done' => 0,
            ];
        }

        // Increment the corresponding status count for the department
        $statusCountsByDepartment[$departmentName][$status]++;
    }

    // Extract the department names and status counts from the associative array
    $departmentNames = array_keys($statusCountsByDepartment);
    $statusCounts = array_values($statusCountsByDepartment);

    $data = [
        'department_names' => $departmentNames,
        'status_counts' => $statusCounts,
    ];

    return response()->json($data);
}

}
