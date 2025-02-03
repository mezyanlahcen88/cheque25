<?php

namespace Modules\Society\App\Models;

use Illuminate\Support\Str;
use Modules\Site\App\Models\Site;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Society\Database\factories\SocietyFactory;

class Society extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected static function newFactory(): SocietyFactory
    {
        return SocietyFactory::new();
    }
        protected $fillable = [
        'site_id',
        'ice',
        'name',
        'phone',
        'fax',
        'email',
        'state_id',
        'city_id',
        'secteur_id',
        'cd_postale',
        'address',
        'comment',
        'created_by',
        'total_acs',
        'isactive',
    ];

        private $files = [
    ];

    public function getFiles()
    {
        return $this->files;
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
            $model->created_by = Auth::user()->id;
        });
    }

    //  put the relation of this Model Here
        public function site()
    {
        return $this->belongsTo(Site::class);
    }

public function state()
    {
        return $this->belongsTo(State::class);
    }

public function city()
    {
        return $this->belongsTo(City::class);
    }

public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }


    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

        public function getRowsTable()
    {
        return [
            'created_at' => 'created_at',
            'site_id' => 'site_id',
            'ice' => 'ice',
            'name' => 'name',
            'phone' => 'phone',
            'fax' => 'fax',
            'email' => 'email',
            'state_id' => 'state_id',
            'city_id' => 'city_id',
            'secteur_id' => 'secteur_id',
            'cd_postale' => 'cd_postale',
            'address' => 'address',
            'comment' => 'comment',
            'created_by' => 'created_by',
            'total_acs' => 'total_acs',
            'isactive' => 'isactive',
        ];
    }




    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

  public function getRowsTableTrashed()
    {
        return [
            'created_at' => 'created_at',
            'site_id' => 'site_id',
            'ice' => 'ice',
            'name' => 'name',
            'phone' => 'phone',
            'fax' => 'fax',
            'email' => 'email',
            'state_id' => 'state_id',
            'city_id' => 'city_id',
            'secteur_id' => 'secteur_id',
            'cd_postale' => 'cd_postale',
            'address' => 'address',
            'comment' => 'comment',
            'created_by' => 'created_by',
            'total_acs' => 'total_acs',
            'isactive' => 'isactive',
        ];
    }


        public static function getColumns()
    {
        return [
            [
                'data' => 'checkbox',
                'searchable' => false,
                'orderable' => false,
                'visible' => true,
            ],
            [
                'data' => 'created_at',
                'searchable' => false,
                'visible' => false,
            ],
            [
                'data' => 'site_id',
                'visible' => true,
            ],
            [
                'data' => 'ice',
                'visible' => true,
            ],
            [
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'phone',
                'visible' => true,
            ],
            [
                'data' => 'fax',
                'visible' => true,
            ],
            [
                'data' => 'email',
                'visible' => false,
            ],
            [
                'data' => 'state_id',
                'visible' => false,
            ],
            [
                'data' => 'city_id',
                'visible' => false,
            ],
            [
                'data' => 'secteur_id',
                'visible' => false,
            ],
            [
                'data' => 'cd_postale',
                'visible' => false,
            ],
            [
                'data' => 'address',
                'visible' => false,
            ],
            [
                'data' => 'comment',
                'visible' => false,
            ],
            [
                'data' => 'created_by',
                'visible' => false,
            ],
            [
                'data' => 'total_acs',
                'visible' => false,
            ],
            [
                'data' => 'isactive',
                'visible' => false,
            ],
            [
                'data' => 'actions',
            ],

        ];
    }

        public static function getTrashedColumns()
    {
        return [
            [
                'data' => 'checkbox',
                'searchable' => false,
                'orderable' => false,
                'visible' => true,
            ],
            [
                'data' => 'created_at',
                'searchable' => false,
                'visible' => false,
            ],
            [
                'data' => 'site_id',
                'visible' => true,
            ],
            [
                'data' => 'ice',
                'visible' => true,
            ],
            [
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'phone',
                'visible' => true,
            ],
            [
                'data' => 'fax',
                'visible' => true,
            ],
            [
                'data' => 'email',
                'visible' => false,
            ],
            [
                'data' => 'state_id',
                'visible' => false,
            ],
            [
                'data' => 'city_id',
                'visible' => false,
            ],
            [
                'data' => 'secteur_id',
                'visible' => false,
            ],
            [
                'data' => 'cd_postale',
                'visible' => false,
            ],
            [
                'data' => 'address',
                'visible' => false,
            ],
            [
                'data' => 'comment',
                'visible' => false,
            ],
            [
                'data' => 'created_by',
                'visible' => false,
            ],
            [
                'data' => 'total_acs',
                'visible' => false,
            ],
            [
                'data' => 'isactive',
                'visible' => false,
            ],
            [
                'data' => 'actions',
            ],

        ];
    }

}
