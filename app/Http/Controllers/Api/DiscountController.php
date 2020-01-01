<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Discount;
use Illuminate\Support\Facades\Validator;


class DiscountController extends Controller
{

    public function index()
    {

        $data = Discount::Show();
        return formatResponse($data);
    }




    public function store(Request $request)
    {

        $data =  [
            'link' => 'required',
            'percentage' => 'required|integer',
            'duration' => 'required|integer',
            'discount_code.*' => 'required|string',
            'discounted_type' => 'required|string',
            'discounted_id' => 'required|integer',
        ];

        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }

        $data = Discount::create($request->all());
        return formatResponse($data);

    }


    public function update(Request $request, $id)
    {
        $data = Discount::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show($id)
    {
        $data = Discount::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {
        $check = Discount::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }


}
