<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Help;
class helpController extends Controller
{
    public function store(Request $request){
        // dd("ok");
        $insert= new Help([
            'link_address' => $request->get('address'),
            'description'=> $request->get('problem'),
            'mechanic_name'=> $request->get('mech_name')
            
        ]);
             
        $insert->save();
        return redirect()->back()->with('success','Thanks for contacting Us. We will  soon contact You.');
    }

    public function show(){
        $show=Help::get();
        // dd("ok");
        return view('helpdetails' , compact('show'));
    }


}
