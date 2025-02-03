<?php

namespace Modules\Sidebar\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sidebar\Database\factories\SidebarFactory;
use Illuminate\Support\Str;

class Sidebar extends Model
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

    protected static function newFactory(): SidebarFactory
    {
        return SidebarFactory::new();
    }
        protected $fillable = [
        'name',
        'icon',
        'permission',
        'sidebar_id',
        'order',
        'route',
        'type',
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
        public function parent()
    {
        return $this->belongsTo(Sidebar::class,'sidebar_id','id');
    }

    public function childs()
    {
        return $this->hasMany(Sidebar::class);
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
            'icon' => 'icon',
            'permission' => 'permission',
            'sidebar_id' => 'sidebar_id',
            'parent' => 'sidebar_id',
            'order' => 'order',
            'route' => 'route',
            'type' => 'type',
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
            'icon' => 'icon',
            'permission' => 'permission',
            'sidebar_id' => 'sidebar_id',
            'order' => 'order',
            'route' => 'route',
            'type' => 'type',
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
                'data' => 'icon',
                'visible' => true,
            ],
            [
                'data' => 'permission',
                'visible' => true,
            ],
            [
                'data' => 'sidebar_id',
                'visible' => false,
            ],
            [
                'data' => 'parent.name',
                'visible' => true,
            ],
            [
                'data' => 'order',
                'visible' => true,
            ],
            [
                'data' => 'route',
                'visible' => false,
            ],
            [
                'data' => 'type',
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
                'data' => 'name',
                'visible' => true,
            ],
            [
                'data' => 'icon',
                'visible' => true,
            ],
            [
                'data' => 'permission',
                'visible' => true,
            ],
            [
                'data' => 'sidebar_id',
                'visible' => true,
            ],
            [
                'data' => 'order',
                'visible' => true,
            ],
            [
                'data' => 'route',
                'visible' => false,
            ],
            [
                'data' => 'type',
                'visible' => false,
            ],
            [
                'data' => 'actions',
            ],

        ];
    }

}
