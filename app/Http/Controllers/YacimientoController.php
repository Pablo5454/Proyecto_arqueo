<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yacimiento;

class YacimientoController extends Controller
{
    public function index()
    {
        $yacimientos = Yacimiento::all();
        
        return view('yacimientos.index', compact('yacimientos'));
    }

    public function create()
    {
        return view('yacimientos.create');
    }

    public function store(Request $request)
    {
        Yacimiento::create($request->all());

        return redirect()->route('yacimientos.index');
    }

    public function edit(Yacimiento $yacimiento)
    {
        return view('yacimientos.edit', compact('yacimiento'));
    }

    public function update(Request $request, Yacimiento $yacimiento)
    {
        $yacimiento->update($request->all());

        return redirect()->route('yacimientos.index');
    }

    public function destroy(Yacimiento $yacimiento)
    {
        $yacimiento->delete();

        return redirect()->route('yacimientos.index');
    }
}

