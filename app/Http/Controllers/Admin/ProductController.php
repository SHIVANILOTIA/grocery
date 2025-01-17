<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller

// ===show page=============================
{  public function product(Request $request)
    {
        // $showlist = DB::table('product')->get();

        // return view('Admin.product',compact('showlist'));

        $status = $request->input('status');

        if ($status !== null) {
            $showlist = DB::table('product')->where('status', $status)->get();
        } else {
            $showlist = DB::table('product')->get();
        }
        return view('Admin.product',compact('showlist'));
    }


// =========== inseret data ==================
    public function Addproduct(Request $request)
    {
        $rules = [
            'name'=> 'required|max:255|alpha',
            'category'=> 'required|max:255',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif',
            'sailing'=> 'required|max:255',
            'discount'=> 'required|max:255',
            'rating'=> 'required|max:255',
            'description'=> 'required|max:255',
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if(!$validator->fails()){
            $date = now();
            if($request->hasfile('image')){

                $image = $request->file('image');
                $imagename = time().'.'. $image->getClientOriginalExtension();
                $image->move(public_path('image'),$imagename);
                $imagePath = 'image/'.$imagename;

            $data =[
                'name'=>$request->input('name'),
                'category'=>$request->input('category'),
                'image'=>$imagePath,
                'created_at'=>$date,
                'sailing'=>$request->input('sailing'),
                'discount'=>$request->input('discount'),
                'rating'=>$request->input('rating'),
                'description'=>$request->input('description'),
            ];
            
            $result = DB::table('product')->insert($data);
            if($result>0){
                return response()->json(['status_code'=>1,'massage'=>'data inserted successfully']);
            }else{
                return response()->json(['status_code'=>0,'massage'=>'data not inserted']);
            }
        }
        }else{
            return response()->json(['status_code'=>2,'massage'=>$validator->errors()->first()]);
        }
    
    }

// =====status update=====================================
    public function Active($id)
    {
        if(!empty($id)){ 
            $data = [
                'status'=>1,
            ];
            $result = DB::table('product')->where('id',$id)->update($data);
    
            if($result>0){
                return response()->json(['status_code'=>1, 'massage'=>'Status change successfully']);
            }else{
                return response()->json(['status_code'=>0, 'massage'=>'Unable to change Status']);
            }

        }else{
            return response()->json(['status_code'=>3, 'massage'=>'Id not found']);
        }
    }
    

    public function InActive($id)
    {
        if(!empty($id)){
            
            $data = [
                'status'=>2,
            ];

            $result = DB::table('product')->where('id',$id)->update($data);
    
            if($result>0){
                return response()->json(['status_code'=>1, 'massage'=>'Status change successfully']);
            }else{
                return response()->json(['status_code'=>0, 'massage'=>'Unable to change Status']);
            }

        }else{
            return response()->json(['status_code'=>3, 'massage'=>'Id not found']);
        }

    }

    

    // ======= delete =======================
    public function delete($id){
        if($id){
            $delete = DB::table('product')->where('id',$id)->delete();
            if($delete>0){
                return redirect()->back();
            }else{
                return response()->json(['status_code'=>1, 'massage'=>'Unable to delete record']);
            }
        }else{
            return response()->json(['status_code'=>0, 'massage'=>'data not deleted']);
        }
    }


    // ========= Edit update product =============================================
    public function EditProduct(Request $request)
    {
        $id = $request->input('id');
        if($id !=""){
            $checkedId = DB::table('product')->where('id',$id)->exists();
            if ($checkedId>0){
                $record = DB::table('product')->find($id);
                return response()->json(['data' => $record]);
            }else{
                return response()->json(['status_code' =>0, 'message'=>'Invalid id found']);
            }
        }else{
            return response()->json(['status_code' =>2, 'message'=> 'Id is required']);
        }
       
        
    }

    public function updateproduct(Request $request)
    {
        $rules = [
            'Editname'=> 'required|max:255|alpha',
            'category'=> 'required|max:255',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif',
            'sailing'=> 'required|max:255',
            'discount'=> 'required|max:255',
            'rating'=> 'required|max:255',
            'description'=> 'required|max:255',
        ];
        
        $validator = validator::make($request->all(),$rules);
        if(!$validator->fails()){
            $date = now();
             if($request->hasfile('image')){

                $image = $request->file('image');
                $imagename = time().'.'. $image->getClientOriginalExtension();
                $image->move(public_path('image'),$imagename);
                $imagePath = 'image/'.$imagename;
               

                $data = [
                        'name'=> $request->input('Editname'),
                        'category'=> $request->input('category'),
                        'image'=> $imagePath,
                        'updated_at'=> $date,
                        'sailing'=>$request->input('sailing'),
                        'discount'=>$request->input('discount'),
                        'rating'=>$request->input('rating'),
                        'description'=>$request->input('description'),
                ];
                $id = $request->idfield;
                $result = DB::table('product')->where('id',$id)->update($data);

                if($result>0){
                    return response()->json(['status_code'=>1,'message'=>'update data successfully']);
                }else{
                    return response()->json(['status_code'=>0,'message'=>'unable to data updated']);
                }
             }
        }else{
            return response()->json(['status_code'=>2, 'message'=>$validator->errors()->first()]);
        }
    }

}
