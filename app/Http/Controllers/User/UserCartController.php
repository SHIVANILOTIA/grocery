<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserCartController extends Controller
{
    public function AddToCart(Request $request){
        $productId = $request->product_id;
        // dd($productId);
        if($productId)
        {
            $userId = Auth::user()->id;
            $productId = $productId;
            $date = now();
            $data = [
                'user_id'=> $userId,
                'product_id'=> $productId,
                'quantity'=> 1,
                'created_at'=> $date,
            ];
            
            $existData = DB::table('user_cart')->where('user_id',$userId)->where('product_id',$productId)->get();
           
            if (!$existData->isEmpty())
            {   
                
                $quantity = $existData->first()->quantity;
                $newQuantity = $quantity + 1;

                $result = DB::table('user_cart')->where('user_id',$userId)->where('product_id',$productId)->update(['quantity' => $newQuantity,'updated_at'=> $date,]);
            }else{

                $result = DB::table('user_cart')->insert($data);
            }

            if($result>0){
                return response()->json(['status_code'=>1,'massage'=>'Add to cart successfully']);
            }else{
                return response()->json(['status_code'=>0,'massage'=>'Unable Add to cart']);

            }
        }else{
            return response()->json(['status_code'=>2,'massage'=>'Product id not found']);
        }
    
    }

   public function descproduct(Request $request)
   {
        $producttid = $request->product_id;

        if($producttid){
            $UserId = Auth::user()->id;
            $cartItem = DB::table('user_cart')->where('id',$producttid)->first();
            if ($cartItem->quantity > 1) {
                // Decrease quantity by 1
                $minusqant = DB::table('user_cart')->where('id', $producttid)->update(['quantity' => $cartItem->quantity - 1]);
                
                if($minusqant>0)
                {
                    return response()->json(['status_code'=>1,'message'=>'Quantity Descrease Successsfully',]);
                }else{
                    return response()->json(['status_code'=>2,'message'=>'Unable to Descrease Quantity',]);

                }
            } else {
                $delete = DB::table('user_cart')->where('id', $producttid)->delete();

                if($delete>0)
                {
                    return response()->json(['status_code'=>1,'message'=>'Quantity Deleted Successsfully',]);
                }else{
                    return response()->json(['status_code'=>2,'message'=>'Unable to Deleted Quantity',]);

                }
            }

        }else{
            return response()->json(['status_code'=>3,'message'=>'Product Id not found',]);
        }
   }


   public function Incproduct(Request $request){

    $pproductid = $request->product_id;
    // dd($pproductid);
    if($pproductid){
        $USERID = Auth::user()->id;
        $CARTITEM = DB::table('user_cart')->where('id',$pproductid)->first();

        if( $CARTITEM->quantity >= 1){
            $ENCRISS = DB::table('user_cart')->where('id', $pproductid)->update(['quantity' => $CARTITEM->quantity + 1]);

            if($ENCRISS>0)
            {
                return response()->json(['status_code'=>1,'message'=>'Quantity Increase Successsfully',]);
            }else{
                return response()->json(['status_code'=>2,'message'=>'Unable to Increase Quantity',]);

            }
        } else {
            return response()->json(['status_code'=>1,'message'=>'Unable to  incriment quantity',]);

        }
    }else{
        return response()->json(['status_code'=>3,'message'=>'Product Id not found',]);
    }
   }

   public function DeleteproId(Request $request){
        $USERRID = $request->product_id;
        // dd($USERID);
        $USerid = Auth::user()->id;
        $result = DB::table('user_cart')->where('id',$USERRID)->delete();
        
        if($result>0){
            return response()->json(['status_code'=>1,'message'=>'product Deleted Successsfully']);
        }else{
            return response()->json(['status_code'=>2,'message'=>'Unable to deleted product']);

        }
   }
}
