<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_item extends Model {

	protected $table = 'Booking_items';
	public $timestamps = false;
	protected $fillable = array('service_id', 'booking_id');

	public function service()
	{
		return $this->belongsTo('Service', 'service_id');
	}

	public function booking()
	{
		return $this->belongsTo('Discount', 'booking_id');
	}



    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }
}