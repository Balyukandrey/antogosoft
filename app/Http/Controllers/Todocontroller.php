<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use Illuminate\Support\Facades\Session;


class Todocontroller extends Controller
{

    public function index(){

        $addresses = Address::orderBy('name','DESC')->paginate(2);

        return view('index')->with('addresses' , $addresses);
    }

    public function store(Request $request){


        $this->validate($request , array(
            'name' => 'required | max:20 | min:3|regex:/^[a-zA-Z ]+$/',
            'city' => 'required ',
            'area' => 'required ',
            'street' => 'required | max:20| min:3',
            'house' => 'required | max:10|',
            'information' => 'max:255',

        ));
        $addr = new Address;

        $addr->name = $request->input('name');

        if($request->input('city') == 'Other'){
            $addr->city = $request->input('other1');
        }
        else {
            $addr->city = $request->input('city');
        }

        if($request->input('area') == 'Other'){
            $addr->area = $request->input('other2');
        }
        else {
            $addr->area = $request->input('area');

        }
        $addr->street = $request->input('street');
        $addr->house = $request->input('house');
        $addr->information = $request->input('information');

        $addr->save();

        Session::flash('success','The address  was successfully save!');


        return redirect()->back();

    }

    public function delete($id){

        $addr = Address::find($id);
        $addr->delete();
        return redirect()->back();
    }


}
