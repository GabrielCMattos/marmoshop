<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Insumo;
use App\Models\Unit;
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
        $categorias = Category::all();
        $marcas = Brand::all();
        $unidades = Unit::all();
        return view('insumos.create', compact('categorias', 'marcas', 'unidades'));
    }

    public function store(Request $request)
    {

        $price = $request->input('price');
        $price = str_replace(['R$', ' '], '', $price);
        $price = str_replace(',', '.', $price);

        $imageRoute = $request->file("image")->store("images", "public");
        Insumo::create([
            "category_id" => $request->category_id,
            "unit_id" => $request->unit_id,
            "brand_id" => $request->brand_id,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $price,
            "stock" => $request->stock,
            "image" => $imageRoute,
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
