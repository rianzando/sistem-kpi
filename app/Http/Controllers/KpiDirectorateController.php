<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Models\KpiCorporate;
use App\Models\KpiDirectorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

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
                $query->where('kpi_directorate', 'LIKE', '%' . $search . '%');
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
        $directorates = Directorate::all();
        $kpicorporates = KpiCorporate::all();
        return view('kpidirectorate.create',compact('directorates','kpicorporates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'kpi_corporate_id' => 'required',
        'directorate_id' => 'required',
        'kpi_directorate' => 'required',
        'target' => 'required',
        'description' => 'required',
        'year' => 'required|numeric',
    ]);

    $kpicor = $request->input('kpi_corporate_id');
    $direc = $request->input('directorate_id');
    $kpidir = $request->input('kpi_directorate');
    $target = $request->input('target');
    $desc = $request->input('description');
    $year = $request->input('year');

    try {
        DB::beginTransaction();
        $kpidirectorate = new KpiDirectorate();
        $kpidirectorate->user_id = auth()->user()->id;
        $kpidirectorate->kpi_corporate_id = $kpicor;
        $kpidirectorate->directorate_id = $direc;
        $kpidirectorate->kpi_directorate = $kpidir;
        $kpidirectorate->target = $target;
        $kpidirectorate->description = $desc;
        $kpidirectorate->year = $year;
        $kpidirectorate->save();

        DB::commit();
        return redirect()->route('kpidirectorate.index')->with('success', 'KPi Directorate data has been saved successfully.');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('kpidirectorate.index')->with('error', 'failed save data kpi directorate');
    }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            // Find the specified kpidirectorate by its ID
            $kpidirectorate = KpiDirectorate::findOrFail($id);

            return view('kpidirectorate.show', compact('kpidirectorate'));
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
            // Find the KPI KpiDirectorate by ID
            $kpidirectorate = KpiDirectorate::findOrFail($id);

            // Fetch the Directorate for dropdown options
            $directorates = Directorate::all();
            $kpicorporates = KpiCorporate::all();
            // Return the view with KPI KpiDirectorate data and dropdown options
            return view('kpidirectorate.edit', compact('kpidirectorate', 'directorates','kpicorporates'));
        } catch (\Throwable $th) {
            // Handle database query exception
            return redirect()->route('kpidirectorate.index')->with('error', 'Failed to fetch KPI Departement data. ' . $th->getMessage());
        } catch (\Exception $e) {
            // Handle other general exceptions
            return redirect()->route('kpidirectorate.index')->with('error', 'An error occurred. Please try again or contact the administrator.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KpiDirectorate $kpidirectorate)
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

    $kpicor = $request->input('kpi_corporate_id');
    $direc = $request->input('directorate_id');
    $kpidir = $request->input('kpi_directorate');
    $target = $request->input('target');
    $desc = $request->input('description');
    $year = $request->input('year');

    try {
        DB::beginTransaction();
        $kpidirectorate->kpi_corporate_id = $kpicor;
        $kpidirectorate->directorate_id = $direc;
        $kpidirectorate->kpi_directorate = $kpidir;
        $kpidirectorate->target = $target;
        $kpidirectorate->description = $desc;
        $kpidirectorate->year = $year;
        $kpidirectorate->updated = auth()->user()->id;
        $kpidirectorate->save();

        DB::commit();

        return redirect()->route('kpidirectorate.index')->with('success','Data kpi directorate success updated');
    } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->route('kpidirectorate.index')->with('error', 'Failed updated data kpi directorate');
    }

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    try {
        // Cari pengguna berdasarkan $id
        $kpidirectorate = KpiDirectorate::findOrFail($id);

        // Hapus data pengguna
        $kpidirectorate->delete();

        // Redirect ke halaman index pengguna dengan pesan sukses
        return redirect()->route('kpidirectorate.index')->with('success', 'KPI Directorate berhasil dihapus!');
    } catch (\Throwable $th) {
        // Tangkap exception jika ada masalah dalam menghapus data
        return redirect()->route('kpidirectorate.index')->with('error', 'Gagal menghapus KPI Directorate . ' . $th->getMessage());
    }
    }
}
