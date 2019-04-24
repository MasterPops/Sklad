<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Accaunt_type;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (Auth::user()->type == 2) 
    	{
    		return view('admin')->with('users', User::all())->with('types', Accaunt_type::all());
    	}
    	else
    	{
    		 return redirect()->action('HomeController@index');
    	}    
    }

    public function changetype(Request $request)
    {
    	$user = User::find($request->id);
    	$user->type = Accaunt_type::where('type', $request->type)->first()->id;
    	$user->save();
       return redirect()->action('AdminController@index');
    }

    public function search(Request $request)
    {
    	if (Auth::user()->type == 2) 
    	{
    		$users = User::all();
    		if (!empty($request->identify)) 
    		{
    			$users = $users->where('id',$request->identify);
    		}
    		if (!empty($request->nameAccaunt)) 
    		{
    			$users = $users->where('name',$request->nameAccaunt);
    		}
    		if (!empty($request->typeAccaunt)) 
    		{
    			$type = Accaunt_type::where('type', $request->typeAccaunt)->first();
    			$users = $users->where('type',$type->id);
    		}

    		return view('admin')->with('users', $users)->with('types', Accaunt_type::all())->with('all',1);
    	}
    	else
    	{
    		 return redirect()->action('HomeController@index');
    	}    
    }
}
