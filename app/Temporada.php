<?php

namespace App;

use Illuminate\Database\Eloquent\{Collection, Model};
use App\Episodio;

class Temporada extends Model
{

    protected $fillable = ['numero'];
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodiosAssistidos(): Collection
    {
        return $this->episodios->filter(function(Episodio $episodio)
        {
            return $episodio->assistido;
        });
    }
}
