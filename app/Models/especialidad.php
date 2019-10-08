<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class especialidad
 * @package App\Models
 * @version October 7, 2019, 9:43 pm UTC
 *
 * @property string nombre
 * @property string descripcion
 */
class especialidad extends Model
{
    use SoftDeletes;

    public $table = 'especialidads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'descripcion' => 'max:255'
    ];
}
