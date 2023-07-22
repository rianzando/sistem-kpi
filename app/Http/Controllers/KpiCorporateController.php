<?php

namespace App\Http\Controllers;

use App\Models\KpiCorporate;
use Illuminate\Http\Request;

class KpiCorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Get the search keyword from the query parameter 'q'
            $keyword = $request->query('q');

            // Get the number of items per page from the query parameter 'per_page'
            $perPage = $request->query('per_page', 10);

            // Query the KpiCorporate model based on the search keyword
            $query = KpiCorporate::query();
            if ($keyword) {
                $query->where('kpi_corporate', 'LIKE', '%' . $keyword . '%');
            }

            // Fetch the KPI corporates with pagination
            $kpiCorporates = $query->paginate($perPage);

            return view('corporate.index', compact('kpiCorporates', 'keyword', 'perPage'));
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('error', 'An error occurred while fetching KPI corporates.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('corporate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'goals' => 'required|string',
            'kpi_corporate' => 'required|string',
            'target_corporate' => 'nullable|string',
            'bobot' => 'required|numeric',
            'year' => 'required|integer|between:1900,' . (date('Y') + 50),
            'achievement' => 'required|numeric',
        ]);

        // Simpan data ke database
        $corporate = new KpiCorporate();
        $corporate->user_id = auth()->user()->id;
        $corporate->goals = $request->input('goals');
        $corporate->kpi_corporate = $request->input('kpi_corporate');
        $corporate->target_corporate = $request->input('target_corporate');
        $corporate->bobot = $request->input('bobot');
        $corporate->year = $request->input('year');
        $corporate->achievement = $request->input('achievement');
        $corporate->status = $this->calculateStatus($request->input('achievement'));
        $corporate->save();

        // Redirect ke halaman yang diinginkan (misalnya halaman index)
        return redirect()->route('corporates.index')->with('success', 'Corporate data has been saved successfully.');
    }

    // Fungsi untuk menghitung nilai status berdasarkan achievement
    private function calculateStatus($achievement)
    {
        if ($achievement < 40) {
            return 'Open';
        } elseif ($achievement < 100) {
            return 'On Progress';
        } else {
            return 'Done';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $kpiCorporate = KpiCorporate::findOrFail($id);
            return view('corporate.show', compact('kpiCorporate'));
        } catch (\Throwable $th) {
            return redirect()->route('corporates.index')->with('error', 'KPI corporate not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $corporate = KpiCorporate::findOrFail($id);
            return view('corporate.edit', compact('corporate'));
        } catch (\Throwable $th) {
            return redirect()->route('corporates.index')->with('error', 'KPI corporate not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'goals' => 'required|string',
            'kpi_corporate' => 'required|string',
            'target_corporate' => 'nullable|string',
            'bobot' => 'required|numeric',
            'year' => 'required|integer|between:1900,' . (date('Y') + 50),
            'achievement' => 'required|numeric',
        ]);

        // Cari data KpiCorporate berdasarkan ID
        $corporate = KpiCorporate::findOrFail($id);

        // Perbarui data KpiCorporate dengan data dari form
        $corporate->goals = $request->input('goals');
        $corporate->kpi_corporate = $request->input('kpi_corporate');
        $corporate->target_corporate = $request->input('target_corporate');
        $corporate->bobot = $request->input('bobot');
        $corporate->year = $request->input('year');
        $corporate->achievement = $request->input('achievement');
        $corporate->status = $this->calculateStatus($request->input('achievement'));
        $corporate->save();

        // Redirect ke halaman yang diinginkan (misalnya halaman index)
        return redirect()->route('corporates.index')->with('success', 'Corporate data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $corporate = KpiCorporate::findOrFail($id);
            $corporate->delete();

            return redirect()->route('corporates.index')->with('success', 'KPI corporate deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('corporates.index')->with('error', 'An error occurred while deleting the KPI corporate.');
        }
    }
}
