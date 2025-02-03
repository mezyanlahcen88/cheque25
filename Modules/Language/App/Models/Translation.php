<?php

namespace Modules\Language\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Language\Database\factories\TranslationFactory;

class Translation extends Model
{
    use HasFactory;
    public $table = 'language_translates';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): TranslationFactory
    {
        return TranslationFactory::new();
    }
}
