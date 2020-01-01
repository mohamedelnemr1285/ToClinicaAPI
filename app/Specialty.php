<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Specialty extends Model {

	protected $table = 'Specialties';
	public $timestamps = false;
	protected $fillable = array('name','icon','parent_id','image');

	public function clinics()
	{
		return $this->hasMany(Clinic::class);
	}

	public function doctors()
	{
		return $this->hasMany(Doctor::class);
	}

	public function discount()
	{
		return $this->morphOne('Discount', 'discounted');
	}

	public function parent(){

	    return $this->belongsTo(Specialty::class,'parent_id')->where('parent_id',0);
    }

    public function children()
    {
        return $this->hasMany(Specialty::class ,'parent_id');
    }

    public function scopeSearch($query ,$specialty_id)
    {
        return $query->
        Where(['id'=> $specialty_id] );

    }


    use HasTranslations;

    public $translatable = ['image','name'];


}

