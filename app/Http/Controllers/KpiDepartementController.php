<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\kpiDepartement;
use App\Models\KpiDirectorate;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KpiDepartementController extends Controller
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
        $query = KpiDepartement::query();
        if ($search) {
            $query->where('kpi_departement', 'LIKE', '%' . $search . '%');
        }

        // Fetch the KPI Departements with pagination
        $kpiDepartements = $query->paginate($perPage);
        $entries = [5, 10, 25, 50]; // Options for the number of data entries per page

        return view('kpidepartement.index', compact('kpiDepartements', 'perPage', 'entries', 'search'));
    } catch (\Throwable $th) {
        return redirect()->route('kpidepartement.index')->with('error', 'Failed to fetch KPI Departement data. ' . $th->getMessage());
    }
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        $kpidirectorates = KpiDirectorate::all();
        // ...
        return view('kpidepartement.create', compact('departements','kpidirectorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input dari form
            $request->validate([
                'kpi_directorate_id' => 'required',
                'departement_id' => 'required',
                'framework' => 'required',
                'kpi_departement' => 'required',
                'year' => 'required|numeric',
            ]);

            // Simpan data ke dalam tabel kpi_departements
            $kpiDepartement = new KpiDepartement();
            $kpiDepartement->user_id = auth()->user()->id;
            $kpiDepartement->kpi_directorate_id = $request->kpi_directorate_id;
            $kpiDepartement->departement_id = $request->departement_id;
            $kpiDepartement->framework = $request->framework;
            $kpiDepartement->kpi_departement = $request->kpi_departement;
            $kpiDepartement->target_departement = $request->target_departement;
            $kpiDepartement->year = $request->year;
            $kpiDepartement->start_date = $request->start_date;
            $kpiDepartement->end_date = $request->end_date;
            $kpiDepartement->save();

            // Redirect ke halaman index kpi_departements dengan pesan sukses
            return redirect()->route('kpidepartement.index')->with('success', 'KPI Departement berhasil ditambahkan!');
        } catch (\Throwable $th) {
            // Tangkap exception jika ada masalah dengan query database
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menyimpan data KPI Departement. ' . $th->getMessage()]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            // Find the specified KpiDepartement by its ID
            $kpidepartement = KpiDepartement::findOrFail($id);

            return view('kpidepartement.show', compact('kpidepartement'));
        } catch (\Throwable $th) {
            // Handle exceptions and redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Gagal menampilkan data KPI Departement. ' . $th->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    try {
        // Find the KPI Departement by ID
        $kpiDepartement = KpiDepartement::findOrFail($id);

        // Fetch the departements for dropdown options
        $departements = Departement::all();
        $kpidirectorates = KpiDirectorate::all();
        // Return the view with KPI Departement data and dropdown options
        return view('kpidepartement.edit', compact('kpiDepartement', 'departements','kpidirectorates'));
    } catch (\Throwable $th) {
        // Handle database query exception
        return redirect()->route('kpidepartement.index')->with('error', 'Failed to fetch KPI Departement data. ' . $th->getMessage());
    } catch (\Exception $e) {
        // Handle other general exceptions
        return redirect()->route('kpidepartement.index')->with('error', 'An error occurred. Please try again or contact the administrator.');
    }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        // Validate input from the form
        $request->validate([
            'kpi_directorate_id' => 'required',
            'departement_id' => 'required',
            'framework' => 'required',
            'kpi_departement' => 'required',
            'year' => 'required|numeric',
        ]);

        $kpidepartement = kpiDepartement::findOrFail($id);
        // Prepare the data for update

           $kpidepartement->user_id = auth()->user()->id;
           $kpidepartement->kpi_directorate_id =  $request->input('kpi_directorate_id');
           $kpidepartement->departement_id =  $request->input('departement_id');
           $kpidepartement->framework =  $request->input('framework');
           $kpidepartement->kpi_departement =  $request->input('kpi_departement');
           $kpidepartement->target_departement =  $request->input('target_departement');
           $kpidepartement->year =  $request->input('year');
           $kpidepartement->start_date =  $request->input('start_date');
           $kpidepartement->end_date =  $request->input('end_date');
           $kpidepartement->updated = Auth::id();
           $kpidepartement->save();


        // Redirect to the index page with a success message
        return redirect()->route('kpidepartement.index')->with('success', 'KPI Departement berhasil diperbarui!');
    } catch (\Throwable $th) {
        // Handle exceptions and redirect back with an error message
        return redirect()->back()->withInput()->withErrors(['error' => 'Gagal memperbarui data KPI Departement. ' . $th->getMessage()]);
    }
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    try {
        // Cari pengguna berdasarkan $id
        $kpidepartement = kpiDepartement::findOrFail($id);

        // Hapus data pengguna
        $kpidepartement->delete();

        // Redirect ke halaman index pengguna dengan pesan sukses
        return redirect()->route('kpidepartement.index')->with('success', 'KPI Departement berhasil dihapus!');
    } catch (\Throwable $th) {
        // Tangkap exception jika ada masalah dalam menghapus data
        return redirect()->route('kpidepartement.index')->with('error', 'Gagal menghapus KPI Departement . ' . $th->getMessage());
    }
    }


}