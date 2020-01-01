<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use Illuminate\Support\Facades\Validator;


class DoctorController extends Controller
{
    public function index(Request $request)
    {

        $data = Doctor::with('specialty')->Search($request->get('id'))->orderby('id' , 'DESC')->Paginate(10);
        return formatResponse($data);
    }

    public function search(Request $request){

        $data = Doctor::with('specialty')->search($request->get('id'))->orderby('name' ,'ASC')->Paginate(10);
        return formatResponse($data);


    }



    public function store(Request $request)
    {

        $data =  [
            'name' => 'required|array|min:2',
            'name.*' => 'required|string|distinct|min:2',
            'nationality' => 'required|array|min:2',
            'nationality.*' => 'required|string|distinct|min:2',
            'image' => 'required',
            'details' => 'required|array|min:2',
            'details.*' => 'required|string|distinct|min:2',
            'price' => 'required',
            'clinic_id' => 'required|integer',
            'specialty_id' => 'required|integer',
            'type_of_specialty_id' => 'required|integer',
        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }

        $data = Doctor::create($request->all());
        return formatResponse($data);

    }


    public function update(Request $request, $id)
    {
        $data = Doctor::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show($id)
    {
        $data = Doctor::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {
        $check = Doctor::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }
}
