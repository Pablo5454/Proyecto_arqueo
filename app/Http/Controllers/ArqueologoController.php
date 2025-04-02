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

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:9', 
            'especialidad' => 'nullable|string|max:255',
            'yacimiento_id' => 'required|array',  
            'yacimiento_id.*' => 'exists:yacimientos,id', 
        ]);
    
        $arqueologo = Arqueologo::create($request->all());
    
        $arqueologo->yacimientos()->attach($request->yacimiento_id);
    
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

