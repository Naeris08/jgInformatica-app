<?php

namespace App\Http\Controllers;

use App\Models\tipo_equipamento;
use Illuminate\Http\Request;

class tipos_equipamentos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_equipamentos = tipo_equipamento::all();
    
    return view('tipos_equipamentos.index', compact('tipos_equipamentos'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('tipos_equipamentos.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        tipo_equipamento::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('tipos_equipamentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(tipo_equipamento $tipo_equipamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipo_equipamento $tipo_equipamento)
    {
        return view('tipos_equipamentos.edit', compact('tipo_equipamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipo_equipamento $tipo_equipamento)
    {
        $tipo_equipamento->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('tipos_equipamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipo_equipamento $tipo_equipamento)
    {
        $tipo_equipamento->delete();
        return redirect()->route('tipos_equipamentos.index');
    }
}
