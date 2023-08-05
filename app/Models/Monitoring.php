<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monitoring extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'kpi_departement_id',
        'start_date',
        'end_date',
        'current_progress',
        'follow_up',
        'achievement',
        'status',
        'user_id',
        'updated',
    ];

    /**
     * Get the user that owns the Monitoring
     *
     * @return \Illuminate\Database\El -   */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Get the kpidepartement that owns the Monitoring
     *
     * @return \Illuminate\KpiDepartmentbase\Eloquent\Relations\BelongsTo
     */
    public function kpidepartement(): BelongsTo
    {
        return $this->belongsTo(KpiDepartment::class)->withDefault();
    }
}