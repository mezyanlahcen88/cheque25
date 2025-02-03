<?php

namespace Modules\Effet\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Effet\Database\factories\EffetFactory;
use Illuminate\Support\Str;

class Effet extends Model
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

    protected static function newFactory(): EffetFactory
    {
        return EffetFactory::new();
    }
        protected $fillable = [
        'bank_id',
        'compte_id',
        'carnet_id',
        'series',
        'number',
        'amount',
        'doi',
        'poi',
        'beneficiary',
        'status',
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
        });
    }

    //  put the relation of this Model Here
        public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

public function compte()
    {
        return $this->belongsTo(Compte::class);
    }

public function carnet()
    {
        return $this->belongsTo(Carnet::class);
    }


    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

        public function getRowsTable()
    {
        return [
            'created_at' => 'created_at',
            'bank_id' => 'bank_id',
            'compte_id' => 'compte_id',
            'carnet_id' => 'carnet_id',
            'series' => 'series',
            'number' => 'number',
            'amount' => 'amount',
            'doi' => 'doi',
            'poi' => 'poi',
            'beneficiary' => 'beneficiary',
            'status' => 'status',
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
            'bank_id' => 'bank_id',
            'compte_id' => 'compte_id',
            'carnet_id' => 'carnet_id',
            'series' => 'series',
            'number' => 'number',
            'amount' => 'amount',
            'doi' => 'doi',
            'poi' => 'poi',
            'beneficiary' => 'beneficiary',
            'status' => 'status',
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
                'data' => 'bank_id',
                'visible' => true,
            ],
            [
                'data' => 'compte_id',
                'visible' => true,
            ],
            [
                'data' => 'carnet_id',
                'visible' => true,
            ],
            [
                'data' => 'series',
                'visible' => true,
            ],
            [
                'data' => 'number',
                'visible' => true,
            ],
            [
                'data' => 'amount',
                'visible' => false,
            ],
            [
                'data' => 'doi',
                'visible' => false,
            ],
            [
                'data' => 'poi',
                'visible' => false,
            ],
            [
                'data' => 'beneficiary',
                'visible' => false,
            ],
            [
                'data' => 'status',
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
                'data' => 'bank_id',
                'visible' => true,
            ],
            [
                'data' => 'compte_id',
                'visible' => true,
            ],
            [
                'data' => 'carnet_id',
                'visible' => true,
            ],
            [
                'data' => 'series',
                'visible' => true,
            ],
            [
                'data' => 'number',
                'visible' => true,
            ],
            [
                'data' => 'amount',
                'visible' => false,
            ],
            [
                'data' => 'doi',
                'visible' => false,
            ],
            [
                'data' => 'poi',
                'visible' => false,
            ],
            [
                'data' => 'beneficiary',
                'visible' => false,
            ],
            [
                'data' => 'status',
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
