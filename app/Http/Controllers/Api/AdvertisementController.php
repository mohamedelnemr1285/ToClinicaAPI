<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Advertisement;
use Illuminate\Support\Facades\Validator;


class AdvertisementController extends Controller
{
    public function index()
    {
        $data = Advertisement::Show();
        return formatResponse($data);
    }




    public function store(Request $request)
    {



        $data = [
            'expire_at' => 'required|integer',
            'image' => 'required|array|min:2',
            'image.*' => 'required|distinct|min:2',
            'discount_id' => 'required|integer',
            'clinic_id' => 'required|integer',
        ];


            $validator = Validator::make($request->all(),$data);
            if($validator->fails()){
                return formatResponse('',400,$validator->errors());
            }

            $data = Advertisement::create($request->all());


            if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $image) {
                    $fileName = $image->getClientOriginalName();
                    $destinationPath = base_path() . '/public/images/' . $fileName;
                    $image->move($destinationPath, $fileName);

                    $attributes['image'] = $fileName;
                }
            }

            return formatResponse($data);
        }



    public function update(Request $request, $id)
    {
        $data = Advertisement::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }



    public function show($id)
    {
        $data = Advertisement::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {

        $check = Advertisement::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
                      }

        $check->delete();
        return formatResponse('',false, "Deleted");


    }
    }
