<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'patente',
        'anno',
        'tipo_automovil',
        'marca_automovil',
        'estado',
        
    ];

    public function messages()
    {
        return [
            'modelo.required' => 'A title is required',
            'patente.required' => 'A message is required',
            'unique.patente' => 'Ya existe una Automovil con esta Patente',
        ];
    }   

    /*public function getRouteKeyName()
    {
        return "patente";
    }*/

    public function posts(){
        return $this->hasMany(Post::class);
    }


}

