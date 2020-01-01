<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceNames;
use Illuminate\Support\Facades\Validator;



/**
 * This Controller contains two Methods has the tables and they are :
 * [ The First : Service ,
 * The Second : ServiceName ]
 *
 */


class ServiceController extends Controller
{
    public function index()
    {

        $data = Service::Show();
        return formatResponse($data);
    }



    public function store(Request $request)
    {

        $data =  [
            'details' => 'required|array|min:2',
            'details.*' => 'required|string|distinct|min:2',
            'price' => 'required',
            'price_subtract' => 'required',
            'service_name_id' => 'required|integer',
            'doctor_id' => 'required|integer',
        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }

        $data = Service::create($request->all());
        return formatResponse($data);

    }


    public function update(Request $request, $id)
    {
        $data = Service::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show($id)
    {
        $data = Service::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {
        $check = Service::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");

    }




//Services_name :


    public function index_services_name()
    {

        $data = ServiceNames::Show();
        return formatResponse($data);
    }


    public function translations(){

//        $data = City::where('name->ar', 'Naam in het Nederlands')->get('name')->all();
//        return formatResponse($data);
        $data =  ServiceNames::all();
        return $data;
    }



    public function store_services_name(Request $request)
    {

        $data =  [
            'name' => 'required|array|min:2',
            'name.*' => 'required|string|distinct|min:2',

        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }


        $data = ServiceNames::create($request->all());
        return formatResponse($data);

    }


    public function update_services_name(Request $request, $id)
    {
        $data = ServiceNames::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show_services_name($id)
    {
        $data = ServiceNames::find($id);
        return formatResponse($data);

    }



    public function destroy_services_name($id)
    {
        $check = ServiceNames::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }

}
