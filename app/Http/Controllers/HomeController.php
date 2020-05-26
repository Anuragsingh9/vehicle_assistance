<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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
    public function index()
    {
        // Role::create(['name'=>'user']);
        // Permission::create(['name'=>'send request']);
        // $permission=Permission::create(['name'=>'send feedback']);
        // $role= Role::findById(3);
        // $permission=Permission::findById(4);
        // $role->givePermissionTo($permission);
        // auth()->user()->givePermissionTo('manage details');
        // auth()->user()->assignRole('machanic');
        // return auth()->user()->permissions;

        return view('home');
        // return view('');

    }
}
