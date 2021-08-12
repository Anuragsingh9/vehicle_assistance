<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mechanic;
use Illuminate\Support\Facades\DB;
class mechanicController extends Controller
{
    public function index(){
        return view('mechanic');

    }

    public function store(Request $request){
        $insert= new mechanic([
            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'phone'=>$request->get('phone'),
            'lat' => $request->get('lat'),
            'long' => $request->get('long'),
        ]);
            
        $insert->save();
        return redirect()->back();
    }

    public function show(){
        $show=mechanic::get();
        return view('mechdetails' , compact('show'));
    }

    public function edit(Request $request,$id)
    {
        // edit a particular resource

        $Edit = mechanic::where('id','=', $request->id)->first();
        return view('mechupdate' , compact('Edit'));

    }

    public function update(Request $request, $id)
    {
        
            $student=mechanic::find($id);
            $student->name = $request->get('name');
            $student->email = $request->get('email');
            $student->phone = $request->get('phone');
            $student->save();
            return redirect()->back();
    }

    public function getlist(Request $request) {

        // $latitude       =       "26.219622";
        // $longitude      =       "84.356659";
        $latitude=$request->lat;
        $longitude=$request->long;

        $mechanic          =       DB::table("mechanics");

        $mechanic          =       $mechanic->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(lat)) * cos(radians(`long`) - radians(" . $longitude . "))
                                + sin(radians(" .$latitude. ")) * sin(radians(lat))) AS distance"));
        $mechanic          =       $mechanic->having('distance', '<', 200);
        $mechanic          =       $mechanic->orderBy('distance', 'asc');

        $mechanic          =       $mechanic->get();
        // dd($mechanic);
        return view('mechlist', compact("mechanic"));
    }






}
