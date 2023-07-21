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
        try {
            // Validate the input fields
            $request->validate([
                'coporate' => 'nullable|string|max:255',
                'goals' => 'nullable|string',
                'kpi_corporate' => 'required|string|max:255',
                'target_corporate' => 'required|string|max:255',
                'bobot' => 'required|integer',
                'year' => 'required|integer',
                'achievement' => 'nullable|integer',
                'status' => 'nullable|string|max:255',
            ]);

            // Create the new KPI corporate
            KpiCorporate::create($request->all());

            return redirect()->route('corporates.index')->with('success', 'KPI corporate created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('corporates.index')->with('error', 'An error occurred while creating the KPI corporate.');
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
            $kpiCorporate = KpiCorporate::findOrFail($id);
            return view('corporate.edit', compact('kpiCorporate'));
        } catch (\Throwable $th) {
            return redirect()->route('corporates.index')->with('error', 'KPI corporate not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $kpiCorporate = KpiCorporate::findOrFail($id);

            // Validate the input fields
            $request->validate([
                'coporate' => 'nullable|string|max:255',
                'goals' => 'nullable|string',
                'kpi_corporate' => 'required|string|max:255',
                'target_corporate' => 'required|string|max:255',
                'bobot' => 'required|integer',
                'year' => 'required|integer',
                'achievement' => 'nullable|integer',
                'status' => 'nullable|string|max:255',
            ]);

            // Update the KPI corporate data
            $kpiCorporate->update($request->all());

            return redirect()->route('corporates.show', $id)->with('success', 'KPI corporate updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('corporates.index')->with('error', 'An error occurred while updating the KPI corporate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $kpiCorporate = KpiCorporate::findOrFail($id);
            $kpiCorporate->delete();

            return redirect()->route('corporates.index')->with('success', 'KPI corporate deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('corporates.index')->with('error', 'An error occurred while deleting the KPI corporate.');
        }
    }
}
