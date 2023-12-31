<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'domisili',
        'address',
        'phone',
        'directorate_id',
        'departement_id',
        'position',
        'level',
        'location',
        'spk_status',
        'first_work_date',
        'end_work_date',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'education',
        'name_of_place',
        'major',
        'image',
    ];


    protected $casts = [
        'departement_id' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}