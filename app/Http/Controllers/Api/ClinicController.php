<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clinic;
use App\Doctor;
use App\Specialty;
use Illuminate\Support\Facades\Validator;



class ClinicController extends Controller
{


    public function index(Request $request)
    {

        $data = Clinic::Show();
        return formatResponse($data);
    }


    public function search(Request $request ,$query,$keyword,$id){


        if($request->where('name','=', Doctor::class)) {
            Doctor::where('name','like', "%" . $keyword . "%")->get();


        }else if($request->where('name','=',Clinic::class)){
                Clinic::where('name','like', "%" . $keyword . "%")->get();


            }
        $Specialty = Specialty::class;
            if($Specialty->$id){

          return $query->where('$Specialty->$id', '=' ,$request->$Specialty)->get();
        }

        }

//        $data = Clinic::with('specialty')->search($request->get('id'))->orderby('name' ,'ASC')->Paginate(10);
//        return formatResponse($data);




    public function store(Request $request)
    {


        $data =  [
            'name' => 'required|array|min:2',
            'name.*' => 'required|string|distinct|min:2',
            'address' => 'required|array|min:2',
            'address.*' => 'required|string|distinct|min:2',
            'image' => 'required|array|min:2',
            'image.*' => 'required|distinct|min:2',
            'link' => 'required',
            'city_id' => 'required|integer',
            'specialty_id' => 'required|integer',
            'type_of_specialty_id' => 'required|integer',
        ];


        $validator = Validator::make($request->all(),$data);
        if($validator->fails()){
            return formatResponse('',400,$validator->errors());
        }

        $data = Clinic::create($request->all());

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
        $data = Clinic::find($id);
        $data->update($request->all());
        return formatResponse($data);
    }




    public function show($id)
    {
        $data = Clinic::find($id);
        return formatResponse($data);

    }



    public function destroy($id)
    {
//        $clinics->delete();
//
//        $data = response()->json(null, 204);
//        return formatResponse($data);
        $check = Clinic::find($id);
        if(!$check) {
            return formatResponse('',true,"This Object Already Deleted");
                       }

        $check->delete();
        return formatResponse('',false, "Deleted successfully");


    }


}
