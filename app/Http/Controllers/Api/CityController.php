<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\Validator;



class CityController extends Controller
{
    public function index(Request $request)
    {
        $data = City::Search($request->get('name'))->orderby('id' , 'DESC')->Paginate(10);
        return formatResponse($data);

    }


//    public function location(){
//
//        $arr_ip = geoip()->getLocation('156.194.60.135');
//        dd($arr_ip);
//
//    }



    public function store(Request $request)
    {

        $data =  [
            'name' => 'required|array|min:2',
            'name.*' => 'required|string|distinct|min:2',
        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }
        $data = City::create($request->all());
        return formatResponse($data);

    }


    public function update(Request $request, $id)
    {
        $data = City::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }


    public function show($id)
    {
        $data = City::find($id);
        return formatResponse($data);


    }


    public function destroy($id)
    {
        $check = City::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
                 }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }
}
