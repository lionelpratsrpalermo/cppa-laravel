<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_model extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';

    // Consultar por servicio de timestamping
    public $timestamps = false;

    use HasFactory;
}
