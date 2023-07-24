<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiDirectorate extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'kpi_directorate_id',
        'directorate_id',
        'kpi_directorate',
        'target',
        'description',
        'year',
        'achievement',
        'status',
        'user_id',
        'updated',
        'deleted',
    ];


    public function directorate(): BelongsTo
    {
        return $this->belongsTo(Directorate::class)->withDefault();
    }

    public function kpicorporate(): BelongsTo
    {
        return $this->belongsTo(KpiCorporate::class)->withDefault();
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}