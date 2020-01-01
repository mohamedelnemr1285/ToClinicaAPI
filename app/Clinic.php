<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use Spatie\Translatable\HasTranslations;


class Clinic extends Model
{

    protected $table = 'Clinics';
    public $timestamps = true;
    protected $fillable = array('name', 'address', 'image', 'link', 'city_id', 'specialty_id', 'type_of_specialty_id');

    public function advertisements()
    {
        return $this->hasMany('Advertisement');
    }

    public function city()
    {
        return $this->belongsTo('City', 'city_id');
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }

    public function type_of_specialty()
    {
        return $this->belongsTo('Clinic', 'type_of_specialty_id');
    }

    public function doctors()
    {
        return $this->hasMany('Doctor');
    }

    public function discount()
    {
        return $this->morphOne('Discount', 'discounted');
    }

    public function user()
    {
        return $this->morphOne('User', 'related');
    }


        public function children()
    {
        return $this->hasMany('Specialty' ,'parent_id');
    }


    public function scopeSearch($query,$id)
    {
        return $query
            ->where('specialty_id', '=', $id);
           // ->orWhere('address', 'like', "%" . $name . "%")
        // ->orWhere('name', 'like', "%" . $name . "%");

    }

    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }


    use HasTranslations;

    public $translatable = ['name','address','image'];

}



