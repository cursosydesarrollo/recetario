<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receta extends Model
{

    use SoftDeletes;
    
    protected $fillable = ['nombre', 'descripcion', 'user_id', 'imagen_url'];    
    
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
