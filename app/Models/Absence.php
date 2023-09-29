<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        "stagiaire_id",
        "seance_id",
        "hours",
        "distribution",
        "reason",
    ];

    public function hoursAbsent(): int
    {
        $dist = json_decode($this->distribution, true);
        return count($dist);
    }

    public function stagiaire(): BelongsTo
    {
        return $this->belongsTo(Stagiaire::class);
    }

    public function seance(): BelongsTo
    {
        return $this->belongsTo(Seance::class);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where(function ($query) use ($value) {
            $query
                ->where('reason', 'like', "%{$value}%");
        })->orWhereHas("stagiaire", function ($query) use ($value) {
            $query->where('first_name', 'like', "%{$value}%")
                ->orWhere('last_name', 'like', "%{$value}%")
                ->orWhereHas('groupe', function ($query) use ($value) {
                    $query->where('label', 'like', "%{$value}%");
                });
        })->orWhereHas('seance', function ($query) use ($value) {
            $query->where('title', 'like', "%{$value}%")
                ->orWhere('id', '=', $value)
                ->orWhere('date', 'like', "%{$value}%")
                ->orWhereHas('module', function ($query) use ($value) {
                    $query->where('title', 'like', "%{$value}%")
                        ->orWhere('code', 'like', "%{$value}%");
                });
        });
    }
}
