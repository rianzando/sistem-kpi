<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiDepartment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'kpi_directorate_id',
        'departement_id',
        'framework',
        'kpi_departement',
        'target_departement',
        'year',
        'start_date',
        'end_date',
        'achievement',
        'status',
        'user_id',
        'updated',
        'deleted',
    ];


    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class)->withDefault();
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }


    public function kpidirectorate(): BelongsTo
    {
        return $this->belongsTo(KpiDirectorate::class)->withDefault();
    }
}