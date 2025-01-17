<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Userlist()
    {
        $userlist = DB::table('users')->where('type', '!=','Admin')->get();
        return view ('Admin.Userlist',compact('userlist'));
        
    }


}
