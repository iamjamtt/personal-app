<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    use HasFactory;

    protected $table = 'gastos';
    protected $fillable = [
        'id',
        'title',
        'description',
        'monto_ingreso',
        'monto_gasto',
        'monto_restante',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detalle_gasto()
    {
        return $this->hasMany(DetalleGastos::class);
    }
}
