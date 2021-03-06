<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_dependencia',
        'direccion_dependencia',
        'estado',
        
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
