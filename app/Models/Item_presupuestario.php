<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_presupuestario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_item_presupuestario',
        'descripccion',
        'valor',
        'estado',
        
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
