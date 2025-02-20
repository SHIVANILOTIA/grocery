<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function Shop()
    {
        $data = DB::table('product')->where('status',1)->get();
        return view('User.Shop',compact('data'));
    }

    // =======singleproduct===========//
    public function SingleProduct($id)
    {
        $data = DB::table('product')->where('id',$id)->first();
        // dd($data);
        return view('User.singleproduct',compact('data'));
    }
}
