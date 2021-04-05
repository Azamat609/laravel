<?php

namespace App\Http\Controllers;

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
}
