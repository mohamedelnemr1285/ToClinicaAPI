<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class City extends Model {

	protected $table = 'Cities';
	public $timestamps = false;
	protected $fillable = array('name');

	public function clinics()
	{
		return $this->hasMany('Clinic');
	}


    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'like', "%" . $name . "%");

    }

    use HasTranslations;

    public $translatable = ['name'];

}

