<?php

namespace Modules\Bank\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Bank\Database\factories\BankFactory;
use Illuminate\Support\Str;

class Bank extends Model
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

    protected static function newFactory(): BankFactory
    {
        return BankFactory::new();
    }
        protected $fillable = [
        'logo',
        'picture',
        'effet',
        'name',
        'tel',
        'address',
        'isactive',
    ];

        private $files = [
        'logo',
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
        });
    }

    //  put the relation of this Model Here
        
    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

        public function getRowsTable()
    {
        return [
            'created_at' => 'created_at',
            'logo' => 'logo',
            'picture' => 'picture',
            'effet' => 'effet',
            'name' => 'name',
            'tel' => 'tel',
            'address' => 'address',
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
            'logo' => 'logo',
            'picture' => 'picture',
            'effet' => 'effet',
            'name' => 'name',
            'tel' => 'tel',
            'address' => 'address',
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
                'data' => 'logo',
                'visible' => true,
            ],
            [
                'data' => 'picture',
                'visible' => true,
            ],
            [
                'data' => 'effet',
                'visible' => true,
            ],
            [
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'tel',
                'visible' => true,
            ],
            [
                'data' => 'address',
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
                'data' => 'logo',
                'visible' => true,
            ],
            [
                'data' => 'picture',
                'visible' => true,
            ],
            [
                'data' => 'effet',
                'visible' => true,
            ],
            [
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'tel',
                'visible' => true,
            ],
            [
                'data' => 'address',
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
