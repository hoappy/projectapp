<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_ciudad',
        'estado',
        'provincia_id',
        
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function cometidos(){
        return $this->belongsToMany(Cometido::class);
    }
}
