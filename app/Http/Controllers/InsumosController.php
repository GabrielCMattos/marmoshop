<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    public function index()
    {
        $insumos = Insumo::all();
        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('insumos.create');
    }

    public function store(Request $request)
    {
        $imageRoute = $request->file("image")->store("images","public");
        Insumo::create([
            "category_id"=>$request->category_id,
            "unit_id"=>$request->unit_id,
            "brand_id"=>$request->brand_id,
            "name"=>$request->name,
            "description"=>$request->description,
            "price"=>$request->stock,
            "status"=>$request->status,
            "image"=>$imageRoute,
        ]);
        return redirect('insumos')->with('success', 'Insumo created successfully.');
    }

    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        return view('insumos.edit', compact('insumo'));
    }

    public function update(Request $request, $id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->update($request->all());
        return redirect('insumos')->with('success', 'Insumo updated successfully.');
    }

    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();
        return redirect('insumos')->with('success', 'Insumo deleted successfully.');
    }
}
