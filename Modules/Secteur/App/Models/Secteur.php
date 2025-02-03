<?php

namespace Modules\Secteur\App\Models;

use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Secteur\Database\factories\SecteurFactory;

class Secteur extends Model
{
    use HasFactory, SoftDeletes;



    protected static function newFactory(): SecteurFactory
    {
        return SecteurFactory::new();
    }
        protected $fillable = [
        'name',
        'city_id',
        'isactive',
    ];

        private $files = [
    ];

    public function getFiles()
    {
        return $this->files;
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
        public function city()
    {
        return $this->belongsTo(City::class);
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
            'city_id' => 'city_id',
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
            'city_id' => 'city_id',
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
                'data' => 'city_id',
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
                'data' => 'city_id',
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
