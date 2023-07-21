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
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}