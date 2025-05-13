<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arqueologo;
use App\Models\Yacimiento;  

class ArqueologoController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:gestor', [
            'only' => ['create', 'store', 'edit', 'update', 'destroy']
        ]);

        $this->middleware('permission:view arqueologos', ['only' => ['index']]);
    }

    public function index()
    {
        // Paginación de arqueólogos
        $arqueologos = Arqueologo::with('yacimientos')->paginate(10); 
        return view('arqueologos.index', compact('arqueologos'));
    }

    public function create()
    {
        $yacimientos = Yacimiento::all(); 
        return view('arqueologos.create', compact('yacimientos'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:9|unique:arqueologos,dni', 
            'especialidad' => 'required|string|max:255',
            'yacimiento_id' => 'required|array',  
            'yacimiento_id.*' => 'exists:yacimientos,id', 
        ]);
    
        // Crear arqueólogo
        $arqueologo = Arqueologo::create($request->except('yacimiento_id'));
        
        $arqueologo->yacimientos()->attach($request->yacimiento_id);
    
        return redirect()->route('arqueologos.index')
            ->with('success', 'Arqueólogo creado correctamente.');
    }
    
    public function edit(Arqueologo $arqueologo)
    {
        $yacimientos = Yacimiento::all(); 
        
        // Cargar los yacimientos actuales del arqueólogo
        $arqueologo->load('yacimientos');
        
        return view('arqueologos.edit', compact('arqueologo', 'yacimientos'));
    }

    public function update(Request $request, Arqueologo $arqueologo)
    {   
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:9|unique:arqueologos,dni,'.$arqueologo->id,
            'especialidad' => 'nullable|string|max:255',
            'yacimiento_id' => 'required|array',
            'yacimiento_id.*' => 'exists:yacimientos,id',
        ]);
        
        // Actualizar datos del arqueólogo
        $arqueologo->update($request->except('yacimiento_id'));
        
        $arqueologo->yacimientos()->sync($request->yacimiento_id);
        
        return redirect()->route('arqueologos.index')
            ->with('success', 'Arqueólogo actualizado correctamente.');
    }

    public function destroy(Arqueologo $arqueologo)
    {
        // Eliminar arqueólogo
        $arqueologo->delete();
        
        return redirect()->route('arqueologos.index')
            ->with('success', 'Arqueólogo eliminado correctamente.');
    }
}