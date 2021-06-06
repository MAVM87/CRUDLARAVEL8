<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
    use HasFactory;
    public function animal(){
        return $this->hasMany(Animal::class);
    }
    protected $primaryKey = 'id_recinto';
}