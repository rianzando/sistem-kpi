<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'directorate_id',
        'name'
    ];

    public function directorate()
    {
        return $this->belongsTo(Directorate::class)->withDefault();
    }

    public function user()
    {
        return $this->hasMany(UserDetail::class);
    }
}
