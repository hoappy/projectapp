<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cometido extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', //example
        

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
