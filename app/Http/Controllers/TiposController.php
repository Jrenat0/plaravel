<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;


class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
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
        $tipo = new Tipo();

        $tipo->nom_tipo = $request->nom_tipo;

        $tipo->save();
        return redirect()->route('tipos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        return view('tipos.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        $tipo->nom_tipo = $request->nom_tipo;
        $tipo->save();
        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index');
    }
}
