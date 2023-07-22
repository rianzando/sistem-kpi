<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiCorporate extends Model
{
    use HasFactory;

    protected $fillable = [
        'coporate',
        'goals',
        'kpi_corporate',
        'target_corporate',
        'bobot',
        'year',
        'achievement',
        'status',
        'user_id',
        'updated',
    ];


    protected static function boot()
    {
        parent::boot();

        self::saving(function ($corporate) {
            if ($corporate->achievement < 40) {
                $corporate->status = 'Open';
            } elseif ($corporate->achievement < 100) {
                $corporate->status = 'On Progress';
            } else {
                $corporate->status = 'Done';
            }
        });
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}