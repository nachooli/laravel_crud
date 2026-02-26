<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo para Category
 */
class Category extends Model
{
    use HasFactory;

    // Desactiva el manejo automático de created_at y updated_at
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    /**
     * En el caso de que se quiera acceder a las categorías visibles se puede crear un scope,
     * aunque en principio no sería necesario para la prueba.
     *
     * @param $query
     * @return mixed
     */
    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }
}
