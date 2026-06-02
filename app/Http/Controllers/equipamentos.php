<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tipo_equipamento;

class Equipamentos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipamentos = Equipamento::all();
        $tipos_equipamentos = Tipo_equipamento::all();
        return view('equipamentos.create', compact('equipamentos', 'tipos_equipamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'tensao' => 'required|integer|min:0',
            'tamanhoTela' => 'required|string|max:255',
            'cor' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'acessorios' => 'nullable|string',
            'resolucaoTela' => 'required|string|max:255',
            'processador' => 'required|string|max:255',
            'memoriaRam' => 'required|integer|min:0',
            'armazenamento' => 'required|integer|min:0',
            'wifi' => 'sometimes|boolean',
            'portasEthernet' => 'sometimes|boolean',
            'bluetooth' => 'sometimes|boolean',
            'portasUSB' => 'required|integer|min:0',
            'portasHDMI' => 'required|integer|min:0',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipos_equipamentos_id' => 'required|exists:tipos_equipamentos,id',
        ], [
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        $validated['wifi'] = $request->boolean('wifi');
        $validated['portasEthernet'] = $request->boolean('portasEthernet');
        $validated['bluetooth'] = $request->boolean('bluetooth');
        $validated['title'] = $validated['modelo'];

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('equipamentos', 'public');
        }

        Equipamento::create($validated);

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipamento $equipamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipamento $equipamento)
    {
        $equipamentos = Equipamento::all();
        $tipos_equipamentos = Tipo_equipamento::all();
        return view('equipamentos.edit', compact('equipamento', 'equipamentos', 'tipos_equipamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipamento $equipamento)
    {
        $validated = $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'tensao' => 'required|integer|min:0',
            'tamanhoTela' => 'required|string|max:255',
            'cor' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'acessorios' => 'nullable|string',
            'resolucaoTela' => 'required|string|max:255',
            'processador' => 'required|string|max:255',
            'memoriaRam' => 'required|integer|min:0',
            'armazenamento' => 'required|integer|min:0',
            'wifi' => 'sometimes|boolean',
            'portasEthernet' => 'sometimes|boolean',
            'bluetooth' => 'sometimes|boolean',
            'portasUSB' => 'required|integer|min:0',
            'portasHDMI' => 'required|integer|min:0',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipos_equipamentos_id' => 'required|exists:tipos_equipamentos,id',
        ], [
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        $validated['wifi'] = $request->boolean('wifi');
        $validated['portasEthernet'] = $request->boolean('portasEthernet');
        $validated['bluetooth'] = $request->boolean('bluetooth');
        $validated['title'] = $validated['modelo'];

        if ($request->hasFile('image')) {
            if ($equipamento->image && Storage::disk('public')->exists($equipamento->image)) {
                Storage::disk('public')->delete($equipamento->image);
            }
            $validated['image'] = $request->file('image')->store('equipamentos', 'public');
        }

        $equipamento->update($validated);

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipamento $equipamento)
    {
        if ($equipamento->image && Storage::disk('public')->exists($equipamento->image)) {
            Storage::disk('public')->delete($equipamento->image);
        }

        // Deletar equipamento
        $equipamento->delete();

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento deletado com sucesso!');
    }
}
