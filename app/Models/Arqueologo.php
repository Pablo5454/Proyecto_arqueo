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
        'especialidad'
    ];

    public function yacimiento()
    {
        return $this->belongsToMany(Yacimiento::class, 'arqueologos_yacimientos', 'arqueologo_id', 'yacimiento_id');    }
}
