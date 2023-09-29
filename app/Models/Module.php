<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "title",
    ];

    public function seances(): HasMany
    {
        return $this->hasMany(\App\Models\Seance::class);
    }
}
