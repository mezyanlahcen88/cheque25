<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at',
        'last_login_ip',
        'profile_photo_path',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        // 'roles_name' => 'array',
    ];



    public function getFullName()
    {
        return $this->first_name .' '.$this->last_name;
    }

    public static function getRowsTable()
    {
        return [
            'user' => 'user',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'occupation' => 'occupation',
            'country_id' => 'country_id',
            'Role' => 'roles_name',
            'Phone' => 'phone',
            'Active' => 'isactive',
            'Action' => 'action',
        ];
    }


}

