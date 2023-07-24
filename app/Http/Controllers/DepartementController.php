<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Directorate;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('perPage',5);
            $search = $request->query('search');


            $query = Departement::query();
            if ($search) {
                $query->where('name','LIKE', '%' . $search . '%');
            }

            $departements = $query->paginate($perPage);
            $entries = [5,10,25,50];
            $directorates = Directorate::all();

            return view('departement.index',compact('departements','perPage','search','entries','directorates'));

        } catch (\Throwable $th) {
            return redirect()->route('departements.index')
            ->with('error','Failed to fetch Departements. Error:' .$th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:departements|max:255',
            ]);
            Departement::create([
                'name' => $request->name,
                'directorate_id' => $request->directorate_id,
            ]);

            return redirect()->route('departements.index')
                ->with('success','Departement created siccessfully');

        } catch (\Throwable $th) {
            return redirect()->route('departements.index')
            ->with('error', 'Failed to create Departement. Error: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        $directorates = Directorate::all(); // Replace 'Directorate' with the correct model name for the directorate data
        return view('departement.edit', compact('departement', 'directorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $departement = Departement::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:departements,name,' . $id . ',id|max:255',
        ]);

        $departement->update([
            'name' => $request->name,
            'directorate_id' => $request->directorate_id,
        ]);

        return redirect()->route('departements.index')
            ->with('success', 'Departement updated successfully');

    } catch (\Throwable $th) {
        return redirect()->route('departements.index')
            ->with('error', 'Failed to update Departement. Error: ' . $th->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        {
            try {
                $departement->delete();
                return redirect()->route('departements.index')
                    ->with('success', 'Departement deleted successfully!');
            } catch (\Exception $e) {
                return redirect()->route('departements.index')
                    ->with('error', 'Failed to delete Departement. Error: ' . $e->getMessage());
            }
        }
    }
}