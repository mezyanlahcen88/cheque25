<?php

namespace Modules\Category\App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Database\factories\CategoryFactory;

class Category extends Model
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

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }
    protected $fillable = ['picture', 'name', 'category_id', 'isactive'];

    private $files = ['picture'];

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
    public function scopeActive($query)
    {
        return $query->where('isactive', 1);
    }

    //  put the relation of this Model Here
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Get all of the categoreis for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoeis(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
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
            'name' => 'name',
            'category_id' => 'category_id',
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
            'name' => 'name',
            'category_id' => 'category_id',
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
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'category_id',
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
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'category_id',
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
