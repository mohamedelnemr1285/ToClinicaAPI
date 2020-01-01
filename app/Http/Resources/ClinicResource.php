<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ClinicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return[
            'id'=>$this->clinic_id,
            'name'=>$this->name,
            'address'=>$this->address,
            'link'=>$this->link,
            'city_id'=>$this->city_id,
             'specialty_id'=>$this->specialty_id,
             'type_of_specialty_id'=>$this->type_of_specialty_id,
               'image'=>$this->image,



        ];
    }
}
