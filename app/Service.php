<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;



class Service extends Model {

	protected $table = 'Services';
	public $timestamps = false;
	protected $fillable = array('service_name_id','details', 'price', 'price_subtract', 'doctor_id');

	public function doctors()
	{
		return $this->hasMany('Doctor');
	}

	public function bookings()
	{
		return $this->hasMany('Booking_item');
	}

	public function discount()
	{
		return $this->morphOne('Discount', 'discount');
	}

	public function service_names()
	{
		return $this->belongsTo('ServiceNames');
	}


    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }

    use HasTranslations;

    public $translatable = ['details'];


}