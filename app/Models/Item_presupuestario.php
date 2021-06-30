<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_presupuestario extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
