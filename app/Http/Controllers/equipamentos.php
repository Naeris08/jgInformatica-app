<?php

namespace App\Http\Controllers;

use App\Models\equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\tipos_equipamento;

class equipamentos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipamentos = equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipamentos = equipamento::all();
        return view('equipamentos.create', compact('equipamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            //'title' => 'required|string|max:255',
            'modelo' => 'required|string',
            'marca' => 'required|string',
            'tensao' => 'required|integer',
            'tamanhoTela' => 'required|string',
            'cor' => 'required|string',
            'material' => 'required|string',
            'acessorios' => 'nullable|string',
            'resolucaoTela' => 'required|string',
            'processador' => 'required|string',
            'memoriaRam' => 'required|integer',
            'armazenamento' => 'required|integer',
            'wifi' => 'required|boolean',
            'portasEthernet' => 'required|boolean',
            'bluetooth' => 'required|boolean',
            'portasUSB' => 'required|integer',
            'portasHDMI' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB
            'categorias_id' => 'required|exists:categorias,id',
        ], [
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        // Processar upload da imagem
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('equipamentos', 'public');
            $validated['image'] = $imagePath;
        }

        // Criar equipamento
        equipamento::create($validated);

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(equipamento $equipamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(equipamento $equipamento)
    {
        $equipamentos = equipamento::all();
        return view('equipamentos.edit', compact('equipamento', 'equipamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, equipamento $equipamento)
    {
         $validated = $request->validate([
            //'title' => 'required|string|max:255',
            'tensao' => 'required|integer',
            'tamanhoTela' => 'required|string',
            'cor' => 'required|string',
            'material' => 'required|string',
            'acessorios' => 'nullable|string',
            'resolucaoTela' => 'required|string',
            'processador' => 'required|string',
            'memoriaRam' => 'required|integer',
            'armazenamento' => 'required|integer',
            'wifi' => 'required|boolean',
            'portasEthernet' => 'required|boolean',
            'bluetooth' => 'required|boolean',
            'portasUSB' => 'required|integer',
            'portasHDMI' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorias_id' => 'required|exists:categorias,id',
        ], [
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        // Processar upload da nova imagem
        if ($request->hasFile('image')) {
            // Deletar imagem anterior se existir
            if ($equipamento->image && Storage::disk('public')->exists($equipamento->image)) {
                Storage::disk('public')->delete($equipamento->image);
            }

            // Armazenar nova imagem
            $imagePath = $request->file('image')->store('equipamentos', 'public');
            $validated['image'] = $imagePath;
        }

        // Atualizar equipamento
        $equipamento->update($validated);

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(equipamento $equipamento)
    {
        if ($equipamento->image && Storage::disk('public')->exists($equipamento->image)) {
            Storage::disk('public')->delete($equipamento->image);
        }

        // Deletar equipamento
        $equipamento->delete();

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento deletado com sucesso!');
    }
}
