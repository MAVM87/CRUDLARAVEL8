<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    public function recinto(){
        return $this->belongsTo(Recinto::class);
    }
    protected $primaryKey = 'id_animal';
}