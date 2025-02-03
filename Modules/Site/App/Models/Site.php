<?php

namespace Modules\Site\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Site\Database\factories\SiteFactory;
use Illuminate\Support\Str;

class Site extends Model
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

    protected static function newFactory(): SiteFactory
    {
        return SiteFactory::new();
    }
        protected $fillable = [
        'name',
        'longitude',
        'latitude',
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
            'name' => 'name',
            'longitude' => 'longitude',
            'latitude' => 'latitude',
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
            'name' => 'name',
            'longitude' => 'longitude',
            'latitude' => 'latitude',
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
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'longitude',
                'visible' => true,
            ],
            [
                'data' => 'latitude',
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
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'longitude',
                'visible' => true,
            ],
            [
                'data' => 'latitude',
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
