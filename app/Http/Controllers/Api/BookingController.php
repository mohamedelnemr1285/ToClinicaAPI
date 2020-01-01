<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Booking_item;
use Illuminate\Support\Facades\Validator;


/**
 * This Controller contains two Methods has the tables and they are :
 * [ The First : Booking ,
 *  The Second : Booking_item ]
 *
 */

class BookingController extends Controller
{
    public function index()
    {

        $data = Booking::Show();
        return formatResponse($data);
    }




    public function store(Request $request)
    {


        $data =  [
            'status' => 'required|string',
            'appointment' => 'required|string',
            'price' => 'required',
            'discounted_price' => 'required',
            'service_id' => 'required|integer',
            'discount_id' => 'required|integer',
            'patient_id' => 'required|integer',

        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }

        $data = Booking::create($request->all());
        return formatResponse($data);


    }


    public function update(Request $request, $id)
    {
        $data = Booking::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show($id)
    {
        $data = Booking::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {
        $check = Booking::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }




//Booking_item :

    public function index_booking_item()
    {

        $data = Booking_item::Show();
        return formatResponse($data);
    }




    public function store_booking_item(Request $request)
    {
        $data =  [

            'service_id' => 'required|integer',
            'booking_id' => 'required|integer',

        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $data = Booking_item::create($request->all());
        return formatResponse($data);


    }


    public function update_booking_item(Request $request, $id)
    {
        $data = Booking_item::find($id);
        $data->update($request->all());
    //    $data = response()->json($data);
        return formatResponse($data);
    }



    public function show_booking_item($id)
    {
        $data = Booking_item::find($id);
        return formatResponse($data);

    }



    public function destroy_booking_item($id)
    {
        $check = Booking_item::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
        }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }



}
