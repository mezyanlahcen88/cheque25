<?php

namespace Modules\Carnet\App\Models;

use Illuminate\Support\Str;
use Modules\Bank\App\Models\Bank;
use Modules\Compte\App\Models\Compte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Carnet\Database\factories\CarnetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carnet extends Model
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

    protected static function newFactory(): CarnetFactory
    {
        return CarnetFactory::new();
    }
        protected $fillable = [
        'bank_id',
        'compte_id',
        'nbr_cheque',
        'rest',
        'society',
        'series',
        'nbr_first_cheque',
        'nbr_last_cheque',
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
            'nbr_cheque' => 'nbr_cheque',
            'rest' => 'rest',
            'society' => 'society',
            'series' => 'series',
            'nbr_first_cheque' => 'nbr_first_cheque',
            'nbr_last_cheque' => 'nbr_last_cheque',
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
            'nbr_cheque' => 'nbr_cheque',
            'rest' => 'rest',
            'society' => 'society',
            'series' => 'series',
            'nbr_first_cheque' => 'nbr_first_cheque',
            'nbr_last_cheque' => 'nbr_last_cheque',
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
                'data' => 'nbr_cheque',
                'visible' => true,
            ],
            [
                'data' => 'rest',
                'visible' => true,
            ],
            [
                'data' => 'society',
                'visible' => true,
            ],
            [
                'data' => 'series',
                'visible' => false,
            ],
            [
                'data' => 'nbr_first_cheque',
                'visible' => false,
            ],
            [
                'data' => 'nbr_last_cheque',
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
                'data' => 'nbr_cheque',
                'visible' => true,
            ],
            [
                'data' => 'rest',
                'visible' => true,
            ],
            [
                'data' => 'society',
                'visible' => true,
            ],
            [
                'data' => 'series',
                'visible' => false,
            ],
            [
                'data' => 'nbr_first_cheque',
                'visible' => false,
            ],
            [
                'data' => 'nbr_last_cheque',
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
