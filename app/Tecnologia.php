<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    /**
     * Indica si el modelo usara las estampas de timpo automaticas
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function checklist()
    {
        return $this->hasMany('App\Checklist');
    }
}
