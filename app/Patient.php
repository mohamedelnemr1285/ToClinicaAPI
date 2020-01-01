<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Patient extends Model {

	protected $table = 'Patients';
	public $timestamps = true;
	protected $fillable = array('name', 'title', 'mobile', 'email', 'address','user_id');

	public function bookings()
	{
		return $this->hasMany('Booking');
	}

    public function user()
    {
        return $this->morphOne('User', 'related');
    }


    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'like', "%" . $name . "%")
            ->orWhere('mobile', 'like', "%" . $name . "%");


    }


    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->title}";
    }




    use HasTranslations;

    public $translatable = ['name','title','address'];


}