<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'apellidos',
        'edad',
        
    ];
    //relacion uno a uno
    public function trabajador(){
        return $this->hasOne(Trabajador::class);
 }

}
