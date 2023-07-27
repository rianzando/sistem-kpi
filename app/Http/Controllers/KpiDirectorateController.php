<?php

namespace App\Http\Controllers;

use App\Models\KpiDirectorate;
use Illuminate\Http\Request;

class KpiDirectorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('perPage', 5); // Get the value of perPage from the query parameter, default 5
            $search = $request->query('search'); // Get the value of search from the query parameter

            // Query the KpiDepartement model based on the search keyword
            $query = KpiDirectorate::query();
            if ($search) {
                $query->where('kpi_departement', 'LIKE', '%' . $search . '%');
            }

            // Fetch the KPI Departements with pagination
            $kpidirectorates = $query->paginate($perPage);
            $entries = [5, 10, 25, 50]; // Options for the number of data entries per page

            return view('kpidirectorate.index', compact('kpidirectorates', 'perPage', 'entries', 'search'));
        } catch (\Throwable $th) {
            return redirect()->route('kpidirectorate.index')->with('error', 'Failed to fetch KPI Departement data. ' . $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'kpi_corporate_id' => 'required',
            'directorate_id' => 'required',
            'kpi_directorate' => 'required',
            'target' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
        ]);

        // Simpan data ke dalam tabel kpi_directorates
        $kpiDirectorate = new KpiDirectorate();
        $kpiDirectorate->fill($request->all());

        // Calculate average achievement for the given kpi_directorate_id
        $averageAchievement = $kpiDirectorate->calculateAverageAchievement();
        $kpiDirectorate->achievement = $averageAchievement;

        // Simpan data ke database
        $kpiDirectorate->save();

        // Redirect ke halaman index kpi_directorates dengan pesan sukses
        return redirect()->route('kpidirectorates.index')->with('success', 'KPI Directorate berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(KpiDirectorate $kpiDirectorate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KpiDirectorate $kpiDirectorate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KpiDirectorate $kpiDirectorate)
    {
        // Validasi input dari form
        $request->validate([
            'kpi_corporate_id' => 'required',
            'directorate_id' => 'required',
            'kpi_directorate' => 'required',
            'target' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
        ]);

        // Update data ke dalam tabel kpi_directorates
        $kpiDirectorate->fill($request->all());

        // Calculate average achievement for the given kpi_directorate_id
        $averageAchievement = $kpiDirectorate->calculateAverageAchievement();
        $kpiDirectorate->achievement = $averageAchievement;

        // Simpan data ke database
        $kpiDirectorate->save();

        // Redirect ke halaman index kpi_directorates dengan pesan sukses
        return redirect()->route('kpidirectorate.index')->with('success', 'KPI Directorate berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KpiDirectorate $kpiDirectorate)
    {
        //
    }
}