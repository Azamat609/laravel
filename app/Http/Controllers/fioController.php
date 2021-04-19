<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;

class fioController extends Controller
{
	public function getfio()
	{
		$user = User::get();

		return response()->json($user);
	}
	public function addfios(Request $req)
	{
		$user = new User();

		$user->FAMILIA = $req->FAMILIA;
		$user->NAME = $req->NAME;
		$user->Dota = $req->Dota;
		$user->telephone = $req->telephone;
		$user->password = $req->password;


		$u=$user->save();
		if($u)
			return"ок";
		return"net";
	}
	public function updatefio(Request $req)
	{
		$user = User::where("ID", $req->ID)->first();

		$user->FAMILIA = $req->FAMILIA;
		$user->NAME = $req->NAME;
		$user->Dota = $req->Dota;

		$user->save();
	
		return response()->json($user);
	}
	public function registerfio(Request $req)
	{
		$label = false;
		$res = "";

		if($req->NAME == null)
		{
		   	$label = true; $res .= 'Не заполнено поле NAME '; 
		} 

		if($req->FAMILIA == null) 
		{
		 	$label = true; 
			$res .= 'Не заполнено поле FAMILIA '; 
		}

		if($req->Dota == null) 
		{
			$label = true; 
		  	$res .= 'Не заполнено поле Dota ';
		  
		} 
			
		 if($label == false) 
		{
		$user = new User();
		$user -> create($req->all());
		$res = 'Регистрация прошла успешно';
		}

		 return response()->json($res);
		
	}
	public function avtorfio(Request $req)
	{
		$user = User::where("telephone", $req->telephone)->first();

		if($user)
		{
			if($req->password == $user->password)
			{
				return response()->json('Успешно пройдено ');
			}
			else
			{
				return response()->json('Неправельный пароль ');
			}
		}
		else 
		{
			return response()->json('Неправельный Логин ');
		}
	}

 	
//ошибка  Class 'App\Http\Controllers\fio' not found
	public function registerValidate(Request $req)
 	{ 

 		$validator = Validator::make($req->all(),
			[ 
				'NAME' => 'required', 
				'FAMILIA' => 'required', 
				'Dota' => 'required', 
				'telephone' => 'required|unique:fio', 
				'password' => 'required',

			]
		); 

		if ($validator->fails()) 
			return response()->json($validator->errors()); 
			$user = user::create($req->all());
 			return response()->json('Регистрация прошла успешно');
 	} 


	public function loginValidate(Request $req) 
	{ 
		$validator = Validator::make($req->all(),
 		[ 
 			'telephone' => 'required',
 			'password' => 'required', ]);

 		if ($validator->fails())
 		{ 
 			$failedRule = $validator->failed();
 			if(isset($failedRule['telephone']['Exists']) || isset($failedRule['password']['Exists']))
 			return response()->json('Логин или пароль введены неверно');
 			return response()->json($validator->errors());
 		} 
 		$user = User::where("telephone",$req->telephone)->first();
 		$user->api_token = Str::random(50);
 		$user->save();
 		return response()->json('Авторизация прошла успешно, api_token юзера: '.$user->api_token);
 	} 




 	public function logout(Request $req)
    { 
    	$user = User::where("api_token",$req->api_token)->first();
 		if($user && $req->api_token != null)
 		{ 
 			$user->api_token = null;

 			$user->save();
 			return response()->json('Пользователь разлогинился');
 		} 
 		else return response()->json("Введен неверный api_token"); 
 	}


 	





}
