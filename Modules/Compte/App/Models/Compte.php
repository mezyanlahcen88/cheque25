<?php

namespace Modules\Compte\App\Models;

use Illuminate\Support\Str;
use Modules\Bank\App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Modules\Society\App\Models\Society;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Compte\Database\factories\CompteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compte extends Model
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

    protected static function newFactory(): CompteFactory
    {
        return CompteFactory::new();
    }
        protected $fillable = [
        'type_compte',
        'bank_id',
        'society_id',
        'agence',
        'city',
        'rip',
        'start_solde',
        'start_date',
        'isactive',
        'comment',
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
        });
    }

    //  put the relation of this Model Here
        public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

public function society()
    {
        return $this->belongsTo(Society::class);
    }


    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

        public function getRowsTable()
    {
        return [
            'created_at' => 'created_at',
            'type_compte' => 'type_compte',
            'bank_id' => 'bank_id',
            'society_id' => 'society_id',
            'agence' => 'agence',
            'city' => 'city',
            'rip' => 'rip',
            'start_solde' => 'start_solde',
            'start_date' => 'start_date',
            'isactive' => 'isactive',
            'comment' => 'comment',
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
            'type_compte' => 'type_compte',
            'bank_id' => 'bank_id',
            'society_id' => 'society_id',
            'agence' => 'agence',
            'city' => 'city',
            'rip' => 'rip',
            'start_solde' => 'start_solde',
            'start_date' => 'start_date',
            'isactive' => 'isactive',
            'comment' => 'comment',
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
                'data' => 'type_compte',
                'visible' => true,
            ],
            [
                'data' => 'bank_id',
                'visible' => true,
            ],
            [
                'data' => 'society_id',
                'visible' => true,
            ],
            [
                'data' => 'agence',
                'visible' => true,
            ],
            [
                'data' => 'city',
                'visible' => true,
            ],
            [
                'data' => 'rip',
                'visible' => false,
            ],
            [
                'data' => 'start_solde',
                'visible' => false,
            ],
            [
                'data' => 'start_date',
                'visible' => false,
            ],
            [
                'data' => 'isactive',
                'visible' => false,
            ],
            [
                'data' => 'comment',
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
                'data' => 'type_compte',
                'visible' => true,
            ],
            [
                'data' => 'bank_id',
                'visible' => true,
            ],
            [
                'data' => 'society_id',
                'visible' => true,
            ],
            [
                'data' => 'agence',
                'visible' => true,
            ],
            [
                'data' => 'city',
                'visible' => true,
            ],
            [
                'data' => 'rip',
                'visible' => false,
            ],
            [
                'data' => 'start_solde',
                'visible' => false,
            ],
            [
                'data' => 'start_date',
                'visible' => false,
            ],
            [
                'data' => 'isactive',
                'visible' => false,
            ],
            [
                'data' => 'comment',
                'visible' => false,
            ],
            [
                'data' => 'actions',
            ],

        ];
    }

}
