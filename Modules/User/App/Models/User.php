<?php

namespace Modules\User\App\Models;

use App\Models\Country;
use App\Enums\RegexEnum;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use Modules\Language\App\Models\Language;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes,HasRoles;


     protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'language_id',
        'password',
        'isactive',
        'state_id',
        'city_id',
        'phone',
        'picture',
        'address',
        'code_postale',
        'gender',
        'isSuperAdmin'
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
    ];

    private $files = [
        'picture',
    ];

    public function getFiles()
    {
        return $this->files;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();

        });
    }

    public function isSuperAdmin()
    {
        return $this->isSuperAdmin;
    }

    /**
 * Scope a query to only include actived items.
 *
 * @param \Illuminate\Database\Eloquent\Builder $query The query builder instance.
 * @return \Illuminate\Database\Eloquent\Builder The modified query builder.
 */
public function scopeActive($query){
    return $query->where('isactive',1);
}






    public const OVERVIEW_RULES = [
        'first_name' => ['bail', 'required', 'min:3', 'max:50'],
        'last_name' => ['bail', 'required', 'min:3', 'max:50'],
        'occupation' => ['bail', 'nullable', 'min:3', 'max:50'],
        'language_id' => ['bail', 'nullable'],
        'country_id' => ['bail', 'nullable'],
        'state' => ['bail', 'nullable'],
        'city' => ['bail', 'nullable'],
        // 'phone' => ['required','regex:'.RegexEnum::PHONE,'min:11','max:15',Rule::unique('users', 'phone')->ignore($this->user)],
        'address' => ['bail', 'nullable'],
        'code_postale' => ['bail', 'nullable'],
        'gender' => ['bail', 'required'],
    ];
    public const PASSWORD_RULES = [
        'old_password' => 'required|string|min:4',
        'new_password' => 'required|string|min:8|confirmed',
    ];

    public const EMAIL_RULES = [
        'email' => ['required','regex:'.RegexEnum::EMAIL],
        'roles_name' => ['required'],
        'roles_name.*' => 'exists:roles,name',
    ];

    public function getFullName()
    {
        return $this->first_name .' '.$this->last_name;
    }
    //  put the relation of this Model Here
public function Language()
    {
        return $this->belongsTo(Language::class);
    }

public function Country()
    {
        return $this->belongsTo(Country::class);
    }

/**
 * Get the role that owns the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function role()
{
    return $this->belongsTo(Role::class, 'roles_name', 'id');
}

    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

   public static function getRowsTable()
    {
        return [
            'created_at' => 'created_at',
            'picture' => 'picture',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'Phone' => 'phone',
            'Active' => 'isactive',
        ];
    }



    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

  public static function getRowsTableTrashed()
    {
        return [
            'created_at' => 'created_at',
            'picture' => 'picture',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'Phone' => 'phone',
        ];
    }


    public static function getColumns() {
        return [
            ['data' => 'checkbox', 'searchable' => false, 'orderable' => false, 'visible' => true],
            ['data' => 'created_at', 'searchable' => false,'visible' => false],
            ['data' => 'picture'],
            ['data' => 'first_name', 'searchable' => true,'visible' => false],
            ['data' => 'last_name', 'searchable' => true,'visible' => false],
            ['data' => 'email', 'visible' => false],
            ['data' => 'phone'],
            ['data' => 'isactive'],
            ['data' => 'actions'],
        ];
    }
    public static function getTrashedColumns() {
        return [
            ['data' => 'checkbox', 'searchable' => false, 'orderable' => false, 'visible' => true],
            ['data' => 'created_at', 'searchable' => false,'visible' => false],
            ['data' => 'picture'],
            ['data' => 'first_name', 'visible' => false],
            ['data' => 'last_name', 'visible' => false],
            ['data' => 'email', 'visible' => false],
            ['data' => 'role'],
            ['data' => 'phone'],
            ['data' => 'actions'],
        ];
    }


}
