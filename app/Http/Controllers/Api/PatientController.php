<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\Validator;


class PatientController extends Controller
{
    public function index(Request $request)
    {

        $data = Patient::Search($request->get('name'))->orderby('id' , 'DESC')->Paginate(10);
        return formatResponse($data);
    }




    public function store(Request $request)
    {

        $data = [
            'name' => 'required|array|min:2',
            'name.*' => 'required|string|distinct|min:2',
            'address' => 'required|array|min:2',
            'address.*' => 'required|string|distinct|min:2',
            'title' => 'required|array|min:2',
            'title.*' => 'required|string|distinct|min:2',
            'mobile' => 'required',
            'email' =>'required|email' ,
            'user_id' => 'required|integer',
        ];


      //  foreach ($validator->errors() as $error)

         $validator = Validator::make($request->all(),$data);
              if($validator->fails()){

               return formatResponse('',400,$validator->errors());

                  }



        $data = Patient::create($request->all());
        return formatResponse($data);

    }


    public function update(Request $request, $id)
    {
        $data = Patient::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show($id)
    {
        $data =  Patient::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {
        $check = Patient::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");

        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");



    }
}
