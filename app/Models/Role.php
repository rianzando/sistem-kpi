<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class, ReferenceHasPermission::class, 'reference_id', 'permission_code', 'id', 'code')->wherePivot('reference_type', FeatureEnum::ROLE);
    // }
}
