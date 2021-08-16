<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cometido extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_emicion',
        'fecha_inicio',
        'fecha_termino',
        'objetivo',
        'dias_c_pernoctar',
        'dias_s_pernoctar',
        'tipo_transporte_ida',
        'tipo_transporte_regreso',
        'progreso',
        'estado',
        'item_presupuestario_id',
        'user_solicita_id',
        'user_jefe_id',
        'user_aprueba_id',
    ];


    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function automovil(){
        return $this->belongsTo(Automovil::class);
    }
    public function itemPresupuestario(){
        return $this->belongsTo(Item_presupuestario::class);
    }

    public function ciudads(){
        return $this->belongsToMany(Ciudad::class);
    }

}
