<?php

namespace Modules\City\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\City\Database\factories\CityFactory;
use Illuminate\Support\Str;

class City extends Model
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

    protected static function newFactory(): CityFactory
    {
        return CityFactory::new();
    }
        protected $fillable = [
        'name',
        'state_id',
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

    /**
 * Scope a query to only include actived items.
 *
 * @param \Illuminate\Database\Eloquent\Builder $query The query builder instance.
 * @return \Illuminate\Database\Eloquent\Builder The modified query builder.
 */
public function scopeActive($query){
    return $query->where('isactive',1);
}

    //  put the relation of this Model Here
        public function state()
    {
        return $this->belongsTo(State::class);
    }


    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

        public function getRowsTable()
    {
        return [
            'created_at' => 'created_at',
            'name' => 'name',
            'state_id' => 'state_id',
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
            'state_id' => 'state_id',
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
                'data' => 'state_id',
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
                'data' => 'state_id',
                'visible' => true,
            ],
            [
                'data' => 'actions',
            ],

        ];
    }

}
