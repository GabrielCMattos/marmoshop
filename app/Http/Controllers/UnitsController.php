<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
public function index()
{
    $units = Unit::all();
    return view('units.index', compact('units'));
}

public function create()
{
    return view('units.create');
}

public function store(Request $request)
{
    Unit::create($request->all());
    return redirect('units')->with('success', 'Unit created successfully.');
}

public function edit($id)
{
    $unit = Unit::findOrFail($id);
    return view('units.edit', compact('unit'));
}

public function update(Request $request, $id)
{
    $unit = Unit::findOrFail($id);
    $unit->update($request->all());
    return redirect('units')->with('success', 'Unit updated successfully.');
}

public function destroy($id)
{
    $unit = Unit::findOrFail($id);
    $unit->delete();
    return redirect('units')->with('success', 'Unit deleted successfully.');
}
}
