<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conductor extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_licencia',
        'annos_experiencia',
        'nombre_conductor',
        'apellido_p_conductor',
        'apellido_m_conductor',
        'telefono_conductor',
        'direccion_conductor',
        'estado',
        'automovil_id',
        
    ];

    public function conductor(){
        return $this->belongsTo(conductor::class);
    }
}
