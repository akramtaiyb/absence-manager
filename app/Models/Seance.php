<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = [
        "label",
        "module_id",
        "date",
        "start_time",
        "end_time",
        "type",
        "marked",
        "groupe_id"
    ];

    public function marked() // Si l'absence est marquée ou non
    {
        $exists = Absence::where("seance_id", "=", $this->id)->exists();
        return $exists;
    }

    public function nbrHours(): int
    {
        $start_time = Carbon::parse($this->start_time);
        $end_time = Carbon::parse($this->end_time);
        return $end_time->diffInHours($start_time);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Module::class);
    }

    public function groupe(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Groupe::class);
    }
}
