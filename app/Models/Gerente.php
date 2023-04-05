<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerente extends Model
{
    use HasFactory;
    protected $table = 'gerentes';
    protected $fillable = [
        'trabajador_id',
        'salario',
    ];

    public function calcularSueldo()
    {
        return $this->salario;
    }
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }

}
