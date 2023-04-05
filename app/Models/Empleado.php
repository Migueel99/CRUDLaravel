<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $fillable = [
        'trabajador_id',
        'horasTrabajadas',
        'precioPorHora',

    ];

    public function calcularSueldo()
    {
        return $this->horasTrabajadas * $this->precioPorHora;
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }

}
