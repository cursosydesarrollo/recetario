<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receta extends Model
{

    use SoftDeletes;

    /**
     * protección de asignación masiva
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'user_id', 'imagen_url'];    
    
    /**
     * Campos escondidos de entidad
     *
     * @var array
     */
    protected $hidden = ['deleted_at'];

    /**
     * Relacion a usuarios
     *
     * @return void
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
