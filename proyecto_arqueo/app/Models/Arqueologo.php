<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arqueologo extends Model
{
    use HasFactory;

    public function yacimiento()
    {
        return $this->belongsTo(Yacimiento::class);
    }
}
