<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        "label"
    ];

    public function stagiaires(): HasMany
    {
        return $this->hasMany(Stagiaire::class);
    }

    public function seances(): HasMany
    {
        return $this->hasMany(\App\Models\Seance::class);
    }
}
