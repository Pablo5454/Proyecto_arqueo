<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arqueologo;
use App\Models\Yacimiento;  

class ArqueologoController extends Controller
{
    public function index()
    {
        $arqueologos = Arqueologo::paginate(10); 
        return view('arqueologos.index', compact('arqueologos'));
    }

    public function create()
    {
        $yacimientos = Yacimiento::all(); 
        return view('arqueologos.create', compact('yacimientos'));
    }

    public function store(Request $request)
    {

    Arqueologo::create($request->all());

    return redirect()->route('arqueologos.index');
    }
    

    public function edit(Arqueologo $arqueologo)
    {
        $yacimientos = Yacimiento::all(); 
        return view('arqueologos.edit', compact('arqueologo', 'yacimientos'));
    }

    public function update(Request $request, Arqueologo $arqueologo)
    {   

    $arqueologo->update($request->all());

    return redirect()->route('arqueologos.index');
    }


    public function destroy(Arqueologo $arqueologo)
    {
        $arqueologo->delete();

        return redirect()->route('arqueologos.index');
    }
}

