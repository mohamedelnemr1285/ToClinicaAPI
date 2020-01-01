<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type_of_specialty;
use Illuminate\Support\Facades\Validator;


class TypeOfspecialtyController extends Controller
{
    public function index(Request $request)
    {

        $data = Type_of_specialty::Search($request->get('name'))->orderby('id' , 'DESC')->Paginate(10);
        return formatResponse($data);
    }




    public function store(Request $request)
    {
        $data =  [
            'name' => 'required|array|min:2',
            'name.*' => 'required|string|distinct|min:2',
            'color' => 'required',
            'icon' => 'required',
        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }


        $data = Type_of_specialty::create($request->all());
        return formatResponse($data);

    }


    public function update(Request $request, $id)
    {
        $data = Type_of_specialty::find($id);
        $data->update($request->all());
        $data = response()->json($data);
        return formatResponse($data);
    }



    public function show($id)
    {
        $data = Type_of_specialty::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {
        $check = type_of_specialty::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }

}
