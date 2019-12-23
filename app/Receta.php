<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receta extends Model
{

    use SoftDeletes;


    protected $guarded = [];

    /**
     * protección de asignación masiva
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'user_id', 'imagen_url', 'published'];    
    
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

    
    public function scopePublished(Builder $query)
    {
        return $query->where('published', 1);
    }

}
