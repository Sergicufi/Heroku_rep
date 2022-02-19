<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitatge extends Model
{
    protected $fillable = ['user_id'];

    use HasFactory;

    public function serveis()
    {
        return $this->belongsToMany(Servei::class);
    }    
}
