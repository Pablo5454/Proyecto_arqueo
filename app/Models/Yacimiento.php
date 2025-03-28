<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yacimiento extends Model
{
    use HasFactory;

    // Agrega estos campos como "fillable"
    protected $fillable = [
        'nombre',
        'ubicacion',
        'poblacion',
        'pais',
        'anio_descubrimiento',
    ];

    public function piezas()
    {
        return $this->hasMany(Pieza::class);
    }

    public function arqueologos()
    {
        return $this->belongsToMany(Arqueologo::class, 'arqueologos_yacimientos', 'yacimiento_id', 'arqueologo_id');
    }
}
