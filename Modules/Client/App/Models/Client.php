<?php

namespace Modules\Client\App\Models;

use App\Models\City;
use App\Models\State;
use App\Models\Secteur;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Client\Database\factories\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Client extends Model
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

    protected static function newFactory(): ClientFactory
    {
        return ClientFactory::new();
    }
        protected $fillable = [
        'picture',
        'ref',
        'ice',
        'name',
        'fonction',
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
            $model->id = Str::uuid();
            $model->created_by = Auth::user()->uuid;
        });
    }

    //  put the relation of this Model Here
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
            'picture' => 'picture',
            'ref' => 'ref',
            'ice' => 'ice',
            'name' => 'name',
            'fonction' => 'fonction',
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
            'count_cheque' => 'count_cheque',
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
            'picture' => 'picture',
            'ref' => 'ref',
            'ice' => 'ice',
            'name' => 'name',
            'fonction' => 'fonction',
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
            'count_cheque' => 'count_cheque',
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
                'data' => 'picture',
                'visible' => true,
            ],
            [
                'data' => 'ref',
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
                'data' => 'fonction',
                'visible' => true,
            ],
            [
                'data' => 'phone',
                'visible' => false,
            ],
            [
                'data' => 'fax',
                'visible' => false,
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
                'data' => 'count_cheque',
                'visible' => true,
            ],
            [
                'data' => 'total_acs',
                'visible' => true,
            ],
            [
                'data' => 'isactive',
                'visible' => true,
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
                'data' => 'picture',
                'visible' => true,
            ],
            [
                'data' => 'ref',
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
                'data' => 'fonction',
                'visible' => true,
            ],
            [
                'data' => 'phone',
                'visible' => false,
            ],
            [
                'data' => 'fax',
                'visible' => false,
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
                'data' => 'count_cheque',
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
