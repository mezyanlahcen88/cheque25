<?php

namespace Modules\Language\App\Models;

use Illuminate\Support\Str;
use Modules\User\App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Language\Database\factories\LanguageFactory;

class Language extends Model
{
    use HasFactory;

    public $table = 'languages';

     protected $fillable = [
        'name',
        'locale',
        'isDefault',
        'status',
        'visible',
        'flag_path',
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

     public function scopeActive($query)
     {
         return $query->where('status', 1);
     }
     public function scopeTranslated($query){
         return $query->where('language_id',1)->first();
     }


     public function users()
     {
         return $this->hasMany(User::class);
     }
   public function getRowsTable()
    {
        return [
            'name' => 'name',
            'locale' => 'locale',
            'isDefault' => 'isDefault',
            'status' => 'status',
            'created_at' => 'created_at',
        ];
    }




    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

  public function getRowsTableTrashed()
    {
        return [
            'name' => 'name',
            'locale' => 'locale',
            'locale' => 'locale',
        ];
    }

}
