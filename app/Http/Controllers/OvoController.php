<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class OvoController extends Controller
{
    public function getOvo(Request $req)
    {
    	$user=Ovo::get();
    	return =response()->json($user);

    }
    public function addOvo(Request $req)
    {
    	$user=Ovo::get();
    
    	$user->name=$req->name;
		$user->quantity=$req->quantity;
		$user->price=$req->price;

		$u=$user->save();
		if($u)
			return"ок";
		return"net";
return =response()->json($user);
    	
    }
    
    public function deleteOvo(Request $req)
    {
    	$user = Product::where("name", $req->name)->first();	
        if(!$user)
        		return response()->json("Товар не найде");


        	$user->delete();
        return response()->json("Товар удален");
    }
}
