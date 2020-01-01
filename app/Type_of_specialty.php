<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Type_of_specialty extends Model {

	protected $table = 'Type_of_specialties';
	public $timestamps = true;
	protected $fillable = array('name', 'color', 'icon');

	public function clinics()
	{
		return $this->hasMany('Clinic');
	}

	public function doctors()
	{
		return $this->hasMany('Doctor');
	}

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'like', "%" . $name . "%");

    }

    use HasTranslations;

    public $translatable = ['name'];

}