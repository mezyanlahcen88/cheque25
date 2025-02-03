<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageTranslate extends Model
{
    use HasFactory;
   public $table = 'language_translates';
    public static function getColumns() {
        return [
            ['data' => 'checkbox', 'searchable' => false, 'orderable' => false, 'visible' => true],
            ['data' => 'model'],
            ['data' => 'label', 'visible' => true],
            ['data' => 'translation', 'visible' => true],
        ];
    }

}
