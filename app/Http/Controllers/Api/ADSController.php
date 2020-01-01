<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ADS;
use Illuminate\Support\Facades\Validator;


class ADSController extends Controller
{
    public function index()
    {

        $data = ADS::Show();
        return formatResponse($data);
    }


    public function show($id)
    {
        $data = ADS::find($id);
        return formatResponse($data);

    }


    public function store(Request $request)
    {

        $data =  [
            'expire_at' => 'required|date',
            'clinic_id' => 'required|integer',
            'doctor_id' => 'required|integer',
        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }

        $data = ADS::create($request->all());
        return formatResponse($data);

    }

    public function update(Request $request, $id)
    {
        $data = ADS::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }

    public function destroy($id)
    {
        $check = ADS::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");

    }

}
