<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use App\Professor;
use App\Http\Requests\RegisterRequest;



class AuthController extends Controller
{
  public function register(RegisterRequest $request){
      
    $user = User::create(array_merge($request->except('password'),['password' => bcrypt($request->input('password'))]));

    $token = \JWTAuth::fromUser($user);

    $professor = new Professor();
    $professor->first_name = $request->input('first_name');
    $professor->last_name = $request->input("last_name");
    $professor->user_id = $user->id;
    $professor->save();

    return response()->json(compact('user','token'),201);    

  } 

  public function login(Request $request)
  {
      $credentials = $request->only(['email', 'password']);
  
      try {
          if (!$token = \JWTAuth::attempt($credentials)) {

              return response()->json(['error' => 'invalid_credentials'], 401);
          }
      } catch(JWTException $e) {

          return response()->json(['error' => 'could_not_create_token'], 500);
      }

      return response()->json(compact('token'));
  }

  // public function proba(){

  //    $user = \JWTAuth::user();

  //    return $user;
  // }

}
