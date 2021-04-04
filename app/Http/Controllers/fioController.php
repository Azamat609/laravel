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
		   	$label = true; $res .= 'Не заполнено поле NAME \n'; 
		} 

		if($req->FAMILIA == null) 
		{
		 	$label = true; 
			$res .= 'Не заполнено поле FAMILIA \n'; 
		}

		if($req->Dota == null) 
		{
			$label = true; 
		  	$res .= 'Не заполнено поле Dota \n';
		  
		} 
			
		 if($label == false) 
		{
		$user = new User();
		$user -> create($req->all());
		$res = 'Регистрация прошла успешно';
		}

		 return response()->json($res);
		
	}


}
