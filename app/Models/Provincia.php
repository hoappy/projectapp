<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
