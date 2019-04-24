<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function editGet($id)
    {
        $editUnit = Unit::find($id);
        if ($editUnit->user == Auth::user()->id) 
        {
            return view('home')->with('units', Unit::where('user', Auth::user()->id)->get())->with('editUnit', $editUnit);
        }
        else
        {
            return redirect()->action('HomeController@index');
        }
    }

    public function delete($id)
    {
        $delUnit = Unit::find($id);
        if ($delUnit->user == Auth::user()->id) 
        {
             $delUnit->delete();
            return redirect()->action('HomeController@index');
        }
        else
        {
            return redirect()->action('HomeController@index');
        }
    }

    public function editSave(Request $request)
    {
        $editUnit = Unit::find($request->id);
        if ($editUnit->user == Auth::user()->id) 
        {
            $this->validate($request, [
                'name' => 'required',
                'count' => 'required | integer',
                'price' => 'required|numeric'
            ]);
            $editUnit->name = $request->name;
            $editUnit->count = $request->count;
            $editUnit->price = $request->price;
            $editUnit->save();
            return redirect()->action('HomeController@index');
        }
        else
        {
            return redirect()->action('HomeController@index');
        }
    }

    public function index()
    {
        return view('home')->with('units', Unit::where('user', Auth::user()->id)->get());
    }

    public function post(Request $request)
    {
        $this->validate($request, [
                    'name' => 'required',
                    'count' => 'required | integer',
                    'price' => 'required|numeric'
                ]);
        $unit = new Unit;
        $unit->name = $request->name;
        $unit->count = $request->count;
        $unit->price = $request->price;
        $unit->user = Auth::user()->id;
        $unit->save();
        return redirect()->action('HomeController@index');
    }

}
