<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class ServiceNames extends Model {

	protected $table = 'Service_names';
	public $timestamps = false;
	protected $fillable = array('name');


    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }


    use HasTranslations;

    public $translatable = ['name'];

}