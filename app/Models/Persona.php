<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
  /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'idpersona';
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $table = 'persona';
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'rut',
        'mail',
        'direccion'
    ];

    

}
