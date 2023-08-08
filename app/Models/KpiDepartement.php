<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class KpiDepartement extends Model
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
        'user_id',
        'updated',
        'deleted',
        'achievement',
        'status'
    ];


    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class, 'departement_id')->withDefault();
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }


    public function kpidirectorate(): BelongsTo
    {
        return $this->belongsTo(KpiDirectorate::class,'kpi_directorate_id');
    }

    public function monitorings()
    {
    return $this->hasMany(Monitoring::class);
    }

}
