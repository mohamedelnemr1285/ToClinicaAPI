<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Appointments;
use Illuminate\Support\Facades\Validator;


class AppointmentsController extends Controller
{
    public function index()
    {

        $data = Appointments::Show();
        return formatResponse($data);
    }



    public function store(Request $request)
    {

        $data = [
            'week_day' => 'required|integer',
            'from_hour_to_hour' => 'required|integer',
        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }

        $data = Appointments::create($request->all());
        return formatResponse($data);

    }


    public function update(Request $request, $id)
    {
        $data = Appointments::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show($id)
    {
        $data = Appointments::find($id);
        return formatResponse($data);


    }



    public function destroy($id)
    {
        $check = Appointments::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }


}
