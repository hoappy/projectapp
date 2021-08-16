<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_region',
        'numero_region',
        'estado',
        
    ];

    public function getFullNameAttribute()
    {
        return "Region {$this->nombre_region} - {$this->numero_region}";
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function provincia(){
        return $this->belongsTo(provincia::class);
    }
}
