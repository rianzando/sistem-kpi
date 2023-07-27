<?php

namespace App\Http\Controllers;

use App\Models\KpiCorporate;
use App\Models\kpiDepartement;
use App\Models\KpiDirectorate;
use App\Models\Monitoring;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    try {
        // Get all monitoring data
        $monitorings = Monitoring::all();

        return view('monitoring.index', compact('monitorings'));
    } catch (\Throwable $th) {
        return redirect()->route('monitoring.index')->with('error', 'Failed to fetch monitoring data. ' . $th->getMessage());
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create($kpi_departement_id)
    {
        try {
            // Find the KpiDepartement by ID
            $kpiDepartement = KpiDepartement::findOrFail($kpi_departement_id);

            // Pass the $kpi_departement_id to the create view
            return view('monitoring.create', compact('kpi_departement_id', 'kpiDepartement'));
        } catch (\Throwable $th) {
            // Handle database query exception or other general exceptions
            return redirect()->route('kpidepartement.index')->with('error', 'Failed to fetch KPI Departement data. ' . $th->getMessage());
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation rules
    $request->validate([
        'kpi_departement_id' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'current_progress' => 'nullable|string',
        'follow_up' => 'nullable|string',
        'achievement' => 'required|numeric',
    ]);

    try {
        // Save monitoring data
        $monitoring = new Monitoring();
        $monitoring->kpi_departement_id = $request->kpi_departement_id;
        $monitoring->start_date = $request->start_date;
        $monitoring->end_date = $request->end_date;
        $monitoring->current_progress = $request->current_progress;
        $monitoring->follow_up = $request->follow_up;
        $monitoring->achievement = $request->achievement;
        $monitoring->user_id = auth()->user()->id;
        $monitoring->save();

        // Get the corresponding kpi_departement and update its achievement field with the latest monitoring achievement
        $kpiDepartement = kpiDepartement::findOrFail($request->kpi_departement_id);
        $latestAchievement = $kpiDepartement->monitorings()->latest()->value('achievement');
        $kpiDepartement->achievement = $latestAchievement;

        // Set the status based on the latest achievement
        if ($latestAchievement == 0) {
            $kpiDepartement->status = 'Open';
        } elseif ($latestAchievement >= 1 && $latestAchievement <= 99) {
            $kpiDepartement->status = 'On Progress';
        } else {
            $kpiDepartement->status = 'Done';
        }

        $kpiDepartement->save();



         // Update achievement on corresponding KpiDirectorate based on average achievement of KpiDepartement
         $kpiDirectorateId = $kpiDepartement->kpi_directorate_id;
         $kpiDirectorate = KpiDirectorate::findOrFail($kpiDirectorateId);
         $averageAchievement = KpiDepartement::where('kpi_directorate_id', $kpiDirectorateId)
             ->avg('achievement');

         $kpiDirectorate->achievement = $averageAchievement;

         // Set the status based on the average achievement
         if ($averageAchievement == 0) {
             $kpiDirectorate->status = 'Open';
         } elseif ($averageAchievement >= 1 && $averageAchievement <= 99) {
             $kpiDirectorate->status = 'On Progress';
         } else {
             $kpiDirectorate->status = 'Done';
         }

         $kpiDirectorate->save();


        //update nilai achivement dari corporate
        // Update achievement on corresponding KpiCorporate based on average achievement of KpiDirectorate
        $kpiCorporateId = $kpiDirectorate->kpi_corporate_id;
        $kpiCorporate = KpiCorporate::findOrFail($kpiCorporateId);
        $averageAchievementKpiCorporate = KpiDirectorate::where('kpi_corporate_id', $kpiCorporateId)
            ->avg('achievement');

        $kpiCorporate->achievement = $averageAchievementKpiCorporate;

        // Set the status based on the average achievement
        if ($averageAchievementKpiCorporate == 0) {
            $kpiCorporate->status = 'Open';
        } elseif ($averageAchievementKpiCorporate >= 1 && $averageAchievementKpiCorporate <= 99) {
            $kpiCorporate->status = 'On Progress';
        } else {
            $kpiCorporate->status = 'Done';
        }

        $kpiCorporate->save();



        // Redirect back with success message
        return redirect()->route('kpidepartement.index')->with('success', 'Monitoring berhasil ditambahkan!');
    } catch (\Throwable $th) {
        // Handle errors
        return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menyimpan data monitoring. ' . $th->getMessage()]);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitoring $monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitoring $monitoring)
{
    // Validation rules
    $request->validate([
        'kpi_departement_id' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'current_progress' => 'nullable|string',
        'follow_up' => 'nullable|string',
        'achievement' => 'required|numeric',
    ]);

    try {
        // Update monitoring data
        $monitoring->kpi_departement_id = $request->kpi_departement_id;
        $monitoring->start_date = $request->start_date;
        $monitoring->end_date = $request->end_date;
        $monitoring->current_progress = $request->current_progress;
        $monitoring->follow_up = $request->follow_up;
        $monitoring->achievement = $request->achievement;
        $monitoring->user_id = auth()->user()->id;
        $monitoring->save();

        // Get the corresponding kpi_departement and update its achievement field with the latest monitoring achievement
        $kpiDepartement = kpiDepartement::findOrFail($request->kpi_departement_id);
        $latestAchievement = $kpiDepartement->monitorings()->latest()->value('achievement');
        $kpiDepartement->achievement = $latestAchievement;

        // Set the status based on the latest achievement
        if ($latestAchievement == 0) {
            $kpiDepartement->status = 'Open';
        } elseif ($latestAchievement >= 1 && $latestAchievement <= 99) {
            $kpiDepartement->status = 'On Progress';
        } else {
            $kpiDepartement->status = 'Done';
        }

        $kpiDepartement->save();


        // Update achievement on corresponding KpiDirectorate based on average achievement of KpiDepartement
        $kpiDirectorateId = $kpiDepartement->kpi_directorate_id;
        $kpiDirectorate = KpiDirectorate::findOrFail($kpiDirectorateId);
        $averageAchievement = KpiDepartement::where('kpi_directorate_id', $kpiDirectorateId)
            ->avg('achievement');

        $kpiDirectorate->achievement = $averageAchievement;

        // Set the status based on the average achievement
        if ($averageAchievement == 0) {
            $kpiDirectorate->status = 'Open';
        } elseif ($averageAchievement >= 1 && $averageAchievement <= 99) {
            $kpiDirectorate->status = 'On Progress';
        } else {
            $kpiDirectorate->status = 'Done';
        }

        $kpiDirectorate->save();


        //kpicorproate
        // Update achievement on corresponding KpiCorporate based on average achievement of KpiDirectorate
        $kpiCorporateId = $kpiDirectorate->kpi_corporate_id;
        $kpiCorporate = KpiCorporate::where('kpi_corporate_id', $kpiCorporateId)->first();
        $averageAchievementKpiCorporate = KpiDirectorate::where('kpi_corporate_id', $kpiCorporateId)
            ->avg('achievement');

        $kpiCorporate->achievement = $averageAchievementKpiCorporate;

        // Set the status based on the average achievement
        if ($averageAchievementKpiCorporate == 0) {
            $kpiCorporate->status = 'Open';
        } elseif ($averageAchievementKpiCorporate >= 1 && $averageAchievementKpiCorporate <= 99) {
            $kpiCorporate->status = 'On Progress';
        } else {
            $kpiCorporate->status = 'Done';
        }

        $kpiCorporate->save();

        // Redirect back with success message
        return redirect()->route('kpidepartement.index')->with('success', 'Monitoring berhasil diperbarui!');
    } catch (\Throwable $th) {
        // Handle errors
        return redirect()->back()->withInput()->withErrors(['error' => 'Gagal memperbarui data monitoring. ' . $th->getMessage()]);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitoring $monitoring)
    {
        //
    }
}