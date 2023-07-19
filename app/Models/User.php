<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $attribute = [
        'status' => 'inactive'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userdetail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class)->withDefault();
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, ReferenceHasRole::class, 'reference_id')->wherePivot('reference_type', FeatureEnum::USER);
    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class, ReferenceHasPermission::class, 'reference_id', 'permission_code', 'id', 'code')->wherePivot('reference_type', FeatureEnum::USER);
    // }

    // public function hasPermissions(array $permissions): bool
    // {
    //     $hasPermission = ReferenceHasPermission::query()
    //         ->where('reference_id', auth()->id())
    //         ->where('reference_type', FeatureEnum::USER)
    //         ->whereIn('permission_code', $permissions)
    //         ->first();

    //     $roles = auth()->user()->roles;

    //     $hasPermissionViaRoles = ReferenceHasPermission::query()
    //         ->whereIn('reference_id', $roles->pluck('id')->all())
    //         ->where('reference_type', FeatureEnum::ROLE)
    //         ->whereIn('permission_code', $permissions)
    //         ->first();

    //     return $hasPermission || $hasPermissionViaRoles;
    // }
}
