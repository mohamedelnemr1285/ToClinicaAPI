<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Doctor extends Model {

	protected $table = 'Doctors';
	public $timestamps = true;
	protected $fillable = array('name', 'image', 'nationality', 'price', 'details', 'clinic_id', 'specialty_id', 'type_of_specialty_id');

	public function clinic()
	{
		return $this->belongsTo('Clinic', 'clinic_id');
	}

	public function specialty()
	{
		return $this->belongsTo(Specialty::class, 'specialty_id');
	}

	public function type_of_specialty()
	{
		return $this->belongsTo('type_of_specialty', 'type_of_specialty_id');
	}

	public function service()
	{
		return $this->belongsTo('Service', 'service_id');
	}

	public function discount()
	{
		return $this->morphOne('Discount', 'discounted');
	}

    public function scopeSearch($query, $id)
    {
        return $query
            ->where('specialty_id', '=', $id);
    }

    use HasTranslations;

    public $translatable = ['name','nationality','details'];

}