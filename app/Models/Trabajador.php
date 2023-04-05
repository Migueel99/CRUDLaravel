<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;
    protected $table = 'trabajadors';
    protected $fillable = [
        'persona_id',
        'telefono',
    ];

    public function calcularSueldo()
    {
        return 0;
    }

    public function debePagarImpuestos()
    {
        return true;
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }
    public function gerente()
    {
        return $this->hasOne(Gerente::class);
    }

}
