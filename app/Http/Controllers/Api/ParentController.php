<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clinic;
use App\Doctor;
use App\Specialty;

class ParentController extends Controller
{
    public function Search(){

      //  $Specialty = Specialty::with('children')->where('parent_id')->orderBy('name')->get();
        $Specialty = Specialty::with( 'children','parent')->get();
      // $Specialty = Specialty::where('parent_id',null)->first();

        return $Specialty;

    }

}
