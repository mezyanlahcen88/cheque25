<?php

namespace Modules\Numerotation\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Numerotation\Database\factories\NumerotationFactory;
use Illuminate\Support\Str;

class Numerotation extends Model
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

    protected static function newFactory(): NumerotationFactory
    {
        return NumerotationFactory::new();
    }
        protected $fillable = [
        'doc_type',
        'prefix',
        'increment_num',
        'comment',
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
        
    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

        public function getRowsTable()
    {
        return [
            'created_at' => 'created_at',
            'doc_type' => 'doc_type',
            'prefix' => 'prefix',
            'increment_num' => 'increment_num',
            'comment' => 'comment',
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
            'doc_type' => 'doc_type',
            'prefix' => 'prefix',
            'increment_num' => 'increment_num',
            'comment' => 'comment',
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
                'data' => 'doc_type',
                'visible' => true,
            ],
            [
                'data' => 'prefix',
                'visible' => true,
            ],
            [
                'data' => 'increment_num',
                'visible' => true,
            ],
            [
                'data' => 'comment',
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
                'data' => 'doc_type',
                'visible' => true,
            ],
            [
                'data' => 'prefix',
                'visible' => true,
            ],
            [
                'data' => 'increment_num',
                'visible' => true,
            ],
            [
                'data' => 'comment',
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

}
