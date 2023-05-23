<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_pedido extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['Codigo_producto','Nombre_producto', 'Precio_producto', 'pedido_id'];
}
