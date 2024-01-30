<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->only('logout');
    }



    public function login(Request $request) {


    try {
             
        $validator = Validator::make($request->all(),[
          
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);

        }
        

        $user = User::where('username', $request->username)->first();
        if( !$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'massage' => 'Incorect username or password',
                'success' => false,  ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json(
            $user->createToken($request->username)->plainTextToken
            // 'data' => [
            //     'nama' => $user->nama,
            //     'email' => $user->email,
            //     'access_token' => $user->createToken($request->email)->plainTextToken
                
            // ],
            // 'success' => true,
            // 'massage' => 'token has been created.',
        , Response::HTTP_OK);







        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function logout(Request $request) {

        try {

            $request->user()->currentAccessToken()->delete();
    
            return response()->json([
                'massage' => 'all token has been revoked from this user',
            ], Response::HTTP_OK);
    
    
    
            } catch (\Exception $e) {
                return response()->json([
                    'message' => $e->getMessage()
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

    }
}
