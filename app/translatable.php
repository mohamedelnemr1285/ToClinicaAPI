<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class translatable extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

}


$translations = [
    'en' => 'Name in English',
    'ar' => 'الاسم فى اللغة العربية'
];
//
$translations->setTranslations('name', $translations);






