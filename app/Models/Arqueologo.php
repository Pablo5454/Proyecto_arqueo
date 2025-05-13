<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arqueologo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'apellidos', 
        'dni', 
        'especialidad'
    ];

    public function yacimientos()
    {
        return $this->belongsToMany(Yacimiento::class, 'arqueologos_yacimientos', 'arqueologo_id', 'yacimiento_id');    }
}
