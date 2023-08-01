<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiDirectorate extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'kpi_corporate_id',
        'directorate_id',
        'kpi_directorate',
        'target',
        'description',
        'year',
        'user_id',
        'updated',
        'deleted',
    ];


    public function directorate(): BelongsTo
    {
        return $this->belongsTo(Directorate::class)->withDefault();
    }

    /**
     * Get the KpiCorporate that owns the KpiDirectorate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kpicorporate(): BelongsTo
    {
        return $this->belongsTo(KpiCorporate::class, 'kpi_corporate_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Get all of the comments for the KpiDirectorate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kpidepartement(): HasMany
    {
        return $this->hasMany(kpiDepartement::class,'kpi_directorate_id');
    }


    //  // Method to calculate average achievement for the given kpi_directorate_id
    //  public function calculateAverageAchievement()
    //  {
    //      // Calculate average achievement from KpiDepartement with the same kpi_directorate_id
    //      $averageAchievement = KpiDepartement::where('kpi_directorate_id', $this->kpi_directorate_id)
    //          ->avg('achievement');

    //      return $averageAchievement ?? 0;
    //  }

    //  // Mutator to update 'achievement' and 'status' based on average achievement
    //  public function setAchievementAttribute($value)
    //  {
    //      $this->attributes['achievement'] = $value;

    //      // Update 'status' based on 'achievement'
    //      if ($value < 40) {
    //          $this->attributes['status'] = 'Open';
    //      } elseif ($value >= 40 && $value <= 99) {
    //          $this->attributes['status'] = 'On Progress';
    //      } else {
    //          $this->attributes['status'] = 'Done';
    //      }
    //  }


}