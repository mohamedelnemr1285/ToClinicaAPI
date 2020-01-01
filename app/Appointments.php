<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Appointments extends Model {

	protected $table = 'Appointments';
	public $timestamps = false;
	protected $fillable = array('week_day', 'from_hour_to_hour');

	public function appointment()
	{
		return $this->belongsTo('Doctor');
	}

    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }

}