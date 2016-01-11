<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    /**
     * Indica si el modelo usara las estampas de timpo automaticas
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['user_id', 'tecnologia_id', 'nivel', 'usado_en'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function tecnologia()
    {
        return $this->belongsTo('App\Tecnologia');
    }

    public function nivel()
    {
        switch ($this->nivel)
        {
            case "1" :
                return "Basico";
            break;

            case "2" :
                return "Medio";
            break;

            case "3" :
                return "Alto";
            break;

            case "4" :
                return "Experto";
            break;
        }
    }
}
