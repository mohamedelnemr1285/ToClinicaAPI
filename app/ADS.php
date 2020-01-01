<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ADS extends Model 
{

    protected $table = 'ADS';
    public $timestamps = true;
    protected $fillable = array('expire_at', 'clinic_id', 'doctor_id');

    public function clinic()
    {
        return $this->belongsTo('Clinic');
    }

    public function doctor()
    {
        return $this->belongsTo('Doctor');
    }

    public function scopeShow($query )
    {
        return $query->Paginate(10);

    }

}