<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arqueologo extends Model
{
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre', 
        'apellidos', 
        'dni', 
        'especialidad', 
        'yacimiento_id'
    ];

    public function yacimiento()
    {
        return $this->belongsTo(Yacimiento::class);
    }
}
