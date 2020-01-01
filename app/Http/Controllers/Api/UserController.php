<?php
//
//namespace App\Http\Controllers\Api;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use App\User;
//use Illuminate\Support\Facades\Hash;
//
//
//class UserController extends Controller
//{
//    public function index(Request $request)
//    {
//
//        $data = User::search($request->get('name'))->orderby('id' , 'DESC')->Paginate(10);
//        return formatResponse($data);
//    }
//
//
//
//
//    public function store(Request $request)
//    {
//
//        $data = User::create($request->all());
//       // $data = User::create($data);
//        $data['token'] = $data->createToken('MyApp')->accessToken;
//        return formatResponse($data);
//
//    }
//
//
//    public function update(Request $request, $id)
//    {
//        $data = User::find($id);
//        $data->update($request->all());
//        return formatResponse($data);
//    }
//
//
//
//    public function show($id)
//    {
//        $data = User::find($id);
//        return formatResponse($data);
//
//    }
//
//
//
//    public function destroy(User $users)
//    {
//        $users->delete();
//
//        $data = response()->json(null, 204);
//        return formatResponse($data);
//
//    }
//
//}



namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['mobile' => request('mobile'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['api_token']= Str::random(60);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
