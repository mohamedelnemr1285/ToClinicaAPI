<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model {

	protected $table = 'Discounts';
	public $timestamps = true;
	protected $fillable = array('link', 'percentage', 'duration', 'discount_code', 'discounted_type', 'discounted_id');

	public function advertisements()
	{
		return $this->hasMany('Advertisement');
	}

	public function bookings()
	{
		return $this->hasMany('Booking');
	}

	public function discounted()
	{
		return $this->morphTo();
	}


    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }

}