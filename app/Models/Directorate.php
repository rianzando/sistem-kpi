<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function departement()
    {
        return $this->hasMany(Departement::class);
    }

    public function userdetail()
    {
        return $this->hasMany(UserDetail::class);
    }
}