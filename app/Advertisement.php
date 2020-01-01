<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Advertisement extends Model {

	protected $table = 'Advertisements';
	public $timestamps = true;
	protected $fillable = array('image', 'expire_at', 'discount_id', 'clinic_id');

	public function discount()
	{
		return $this->belongsTo('Discount', 'discount_id');
	}

	public function clinic()
	{
		return $this->belongsTo('Clinic', 'clinic_id');
	}

    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }

    use HasTranslations;

    public $translatable = ['image'];

}

