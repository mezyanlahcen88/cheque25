<?php

namespace Modules\Product\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductFactory;
use Illuminate\Support\Str;

class Product extends Model
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

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
        protected $fillable = [
        'picture',
        'reference',
        'name',
        'description',
        'product_type',
        'service',
        'buy_unit',
        'buy_price',
        'actions',
        'lot_number',
        'date_of_expiration',
        'destockage_unit',
        'category_id',
        'brand_id',
        'warehouse_id',
        'iscomposable',
        'isactive',
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
        public function category()
    {
        return $this->belongsTo(Category::class);
    }

public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
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
            'reference' => 'reference',
            'name' => 'name',
            'description' => 'description',
            'product_type' => 'product_type',
            'service' => 'service',
            'buy_unit' => 'buy_unit',
            'buy_price' => 'buy_price',
            'actions' => 'actions',
            'lot_number' => 'lot_number',
            'date_of_expiration' => 'date_of_expiration',
            'destockage_unit' => 'destockage_unit',
            'category_id' => 'category_id',
            'brand_id' => 'brand_id',
            'warehouse_id' => 'warehouse_id',
            'iscomposable' => 'iscomposable',
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
            'reference' => 'reference',
            'name' => 'name',
            'description' => 'description',
            'product_type' => 'product_type',
            'service' => 'service',
            'buy_unit' => 'buy_unit',
            'buy_price' => 'buy_price',
            'actions' => 'actions',
            'lot_number' => 'lot_number',
            'date_of_expiration' => 'date_of_expiration',
            'destockage_unit' => 'destockage_unit',
            'category_id' => 'category_id',
            'brand_id' => 'brand_id',
            'warehouse_id' => 'warehouse_id',
            'iscomposable' => 'iscomposable',
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
                'data' => 'reference',
                'visible' => true,
            ],
            [
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'description',
                'visible' => true,
            ],
            [
                'data' => 'product_type',
                'visible' => true,
            ],
            [
                'data' => 'service',
                'visible' => false,
            ],
            [
                'data' => 'buy_unit',
                'visible' => false,
            ],
            [
                'data' => 'buy_price',
                'visible' => false,
            ],
            [
                'data' => 'actions',
                'visible' => false,
            ],
            [
                'data' => 'lot_number',
                'visible' => false,
            ],
            [
                'data' => 'date_of_expiration',
                'visible' => false,
            ],
            [
                'data' => 'destockage_unit',
                'visible' => false,
            ],
            [
                'data' => 'category_id',
                'visible' => false,
            ],
            [
                'data' => 'brand_id',
                'visible' => false,
            ],
            [
                'data' => 'warehouse_id',
                'visible' => false,
            ],
            [
                'data' => 'iscomposable',
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
                'data' => 'picture',
                'visible' => true,
            ],
            [
                'data' => 'reference',
                'visible' => true,
            ],
            [
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'description',
                'visible' => true,
            ],
            [
                'data' => 'product_type',
                'visible' => true,
            ],
            [
                'data' => 'service',
                'visible' => false,
            ],
            [
                'data' => 'buy_unit',
                'visible' => false,
            ],
            [
                'data' => 'buy_price',
                'visible' => false,
            ],
            [
                'data' => 'actions',
                'visible' => false,
            ],
            [
                'data' => 'lot_number',
                'visible' => false,
            ],
            [
                'data' => 'date_of_expiration',
                'visible' => false,
            ],
            [
                'data' => 'destockage_unit',
                'visible' => false,
            ],
            [
                'data' => 'category_id',
                'visible' => false,
            ],
            [
                'data' => 'brand_id',
                'visible' => false,
            ],
            [
                'data' => 'warehouse_id',
                'visible' => false,
            ],
            [
                'data' => 'iscomposable',
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
