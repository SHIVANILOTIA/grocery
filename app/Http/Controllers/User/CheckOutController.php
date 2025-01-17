<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CheckOutController extends Controller
{
    public function checkout(){
        $user_id = Auth::user()->id;
        $user_data = DB::table('users')->where('id',$user_id)->first();
        $user_cart = DB::table('user_cart')
        ->join('product', 'user_cart.product_id', '=', 'product.id') // Joining condition
        ->where('user_cart.user_id', $user_id) // Filtering based on cart id
        ->select('user_cart.*', 'product.name', 'product.sailing', 'product.image') // Selecting the fields you need
        ->get();
    $totalprice = 0;

        return view('User.checkout',compact('user_data','user_cart','totalprice'));
    }

    public function Primary_mobile_update(Request $request){
        $rules = [
            'primary'=>'required|max:10|unique:users,mobile',
        ];

        $validator = Validator::make($request->all(),$rules);
        if(!$validator->fails()){
            $user_id = Auth::user()->id;
            // dd($user_id);
            $time = now();
            $data = [
                'mobile'=> $request->input('primary'),
                'updated_at'=> $time,
            ];
            $update = DB::table('users')->where('id',$user_id)->update($data);
            if($update>0){
                return response()->json(['status_code'=>1,'message'=>'primary number update']);
            }else{
                return response()->json(['status_code'=>0,'message'=>' unable to update primary number ']);

            }
        }else{
            return response()->json(['status_code'=>2,'message'=>$validator->errors()->first()]);

        }
    }


    public function Secondary_mobile_update(Request $request){
        $rules = [
            'secondary'=>'required|max:10',
        ];
        $validator = Validator::make($request->all(),$rules);
        if(!$validator->fails()){
            $user_id = Auth::user()->id;
            $time = now();
            $data = [
                'mobile_second'=> $request->input('secondary'),
                'updated_at'=> $time,
            ];
            $update = DB::table('users')->where('id',$user_id)->update($data);
            if($update>0){
                return response()->json(['status_code'=>1,'message'=>'Secondary number update']);
            }else{
                return response()->json(['status_code'=>0,'message'=>' unable to update Secondary number ']);

            }
        }else{
            return response()->json(['status_code'=>2,'message'=>$validator->errors()->first()]);

        }
    }

    public function delete_secondary(Request $request){
        $userId = $request->product_id;
        // dd($USERID);
        $USerid = Auth::user()->id;
        $result = DB::table('user')->where('id',$userId)->delete('mobile_second');
        
        if($result>0){
            return response()->json(['status_code'=>1,'message'=>'product Deleted Successsfully']);
        }else{
            return response()->json(['status_code'=>2,'message'=>'Unable to deleted product']);

        }
   }
    

}

