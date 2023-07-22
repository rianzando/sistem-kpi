<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use Illuminate\Http\Request;

class DirectorateController extends Controller
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
             $query = Directorate::query();
             if ($keyword) {
                 $query->where('name', 'LIKE', '%' . $keyword . '%');
             }

             // Fetch the KPI corporates with pagination
             $directorates = $query->paginate($perPage);

            return view('directorate.index', compact('directorates', 'keyword'));
        } catch (\Exception $e) {
            return redirect()->route('directorates.index')
                ->with('error', 'Failed to fetch Directorates. Error: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('directorate.create');
    }

   // Store a newly created Directorate in the database
   public function store(Request $request)
   {
       try {
           $request->validate([
               'name' => 'required|unique:directorates|max:255',
           ]);

           Directorate::create([
               'name' => $request->name,
           ]);

           return redirect()->route('directorates.index')
               ->with('success', 'Directorate created successfully!');
       } catch (\Exception $e) {
           return redirect()->route('directorates.index')
               ->with('error', 'Failed to create Directorate. Error: ' . $e->getMessage());
       }
   }


    /**
     * Display the specified resource.
     */
    public function show(Directorate $directorate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Directorate $directorate)
    {
        return view('directorate.edit', compact('directorate'));
    }

    // Update the specified Directorate in the database
    public function update(Request $request, Directorate $directorate)
    {
        try {
            $request->validate([
                'name' => 'required|unique:directorates,name,' . $directorate->id . '|max:255',
            ]);

            $directorate->update([
                'name' => $request->name,
            ]);

            return redirect()->route('directorates.index')
                ->with('success', 'Directorate updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('directorates.index')
                ->with('error', 'Failed to update Directorate. Error: ' . $e->getMessage());
        }
    }


    // Delete the specified Directorate from the database
    public function destroy(Directorate $directorate)
    {
        try {
            $directorate->delete();
            return redirect()->route('directorates.index')
                ->with('success', 'Directorate deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('directorates.index')
                ->with('error', 'Failed to delete Directorate. Error: ' . $e->getMessage());
        }
    }
}