<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specialty;
use App\Doctor;
use App\Clinic;
use Illuminate\Support\Facades\Validator;


class SpecialtyController extends Controller
{

    public function index(Request $request)
    {
//        $Specialty = Specialty::with( 'children')->get();
//        return formatResponse($Specialty) ;

//        $Specialty = Specialty::with('doctors')->Where(['id'=>3]);
//        return formatResponse($Specialty) ;

//       $data = Specialty::with('doctors')->search($request->get('specialty_id'))->orderby('id' , 'DESC')->Paginate(10);
//        return formatResponse($data);

        $clinics =  Clinic::where(['name'=>$request->get('clinic')]);

        $doctors =  Doctor::where('name','=',$request->get('doctor'));

    //    $specialty = Specialty::where(['id'=> $request->get('id')]);
        if($clinics){
          Clinic::where('name','like','%'.$request->get('key').'%')->get();
     }

     if($doctors){
         return Doctor::where('name','like','%'.$request->get('doctor').'%')->get();
     }
//     if($specialty){
//            return $specialty;
//
//    }


    }



    public function Search($key){
//
//        $Specialty = Specialty::with('children')->where('parent_id')->get();
////        return $Specialty;
///
//        $data = Specialty::search($request->get('name'))->orderby('id' , 'DESC')->Paginate(10);
//        return formatResponse($data);



    }

    public function store(Request $request)
    {

        $data =  [
            'icon' => 'required',
            'image' => 'required|array|min:2',
            'image.*' => 'required|distinct|min:2',
            'name' => 'required|array|min:2',
            'name.*' => 'required|string|distinct|min:2',
            'parent_id' => 'required|integer',

        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }

        $data =  Specialty::create($request->all());
        return formatResponse($data);

    }


    public function update(Request $request, $id)
    {
        $data = Specialty::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show($id)
    {
        $data = Specialty::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {
        $check = Specialty::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }

}
