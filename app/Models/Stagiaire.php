<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "last_name",
        "groupe_id",
    ];

    public function absenteeismRate(): float
    {
        $groupeId = $this->groupe_id;

        $totalPossibleAttendance = Seance::where('groupe_id', $groupeId)
            ->sum(DB::raw("(strftime(end_time)) - (strftime(start_time))"));

        $totalAbsences = $this->absences()->sum("hours");

        if ($totalPossibleAttendance > 0) {
            $absenteeismRate = ((float) $totalAbsences / (float) $totalPossibleAttendance) * 100;
        } else {
            $absenteeismRate = 0;
        }

        return $absenteeismRate;
    }

    public function groupe(): BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }

    public function absences(): HasMany
    {
        return $this->hasMany(Absence::class);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where(function ($query) use ($value) {
            $query
                ->where('first_name', 'like', "%{$value}%")
                ->orWhere('last_name', 'like', "%{$value}%");
        })->orWhereHas("groupe", function ($query) use ($value) {
            $query->where('label', 'like', "%{$value}%");
        });
    }
}
