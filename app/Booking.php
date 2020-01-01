<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Booking extends Model {

	protected $table = 'Bookings';
	public $timestamps = true;
	protected $fillable = array('status', 'appointment', 'price', 'discounted_price', 'service_id', 'discount_id', 'patient_id');

	public function discount()
	{
		return $this->belongsTo('Discount', 'discount_id');
	}

	public function patient()
	{
		return $this->belongsTo('Patient', 'patient_id');
	}

	public function bookings()
	{
		return $this->hasMany('Booking_item');
	}


    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }



}

