<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class PageController extends Controller
{
    
    public function login_admin(Request $request){
    	$email = $request->email;
    	$password = md5($request->password);
    	$result = DB::table('table_admin')->where('email',$email)->where('password',$password)->first();
        $select_avatar=DB::table('table_admin')->get();
    	if($result){
    		Session::put('id-admin',$result->id);
            Session::put('name-admin',$result->name);
    		return Redirect::to('/charts')->with('select_avatar',$select_avatar);
    	}else{
    		return Redirect::to('/login-admin');
    	}
        Session::save();
        
    }
    public function signup_admin(){
        return view('admins.page.signup');
    }
    public function add_admin(Request $request){
        
    	$data = array();
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['password'] = md5($request->password);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $file_name=$file->getClientOriginalName('image');
            $file->move('public/image-admin',$file_name);
        }
        if($request->file('image')!=null){
            $data['avatar']=$file_name;       
        }
    	$admin_id = DB::table('table_admin')->insertGetId($data);
    	
    	return Redirect::to('/login-admin');

    }
    public function Logout_admin(){
        Session::forget('name-admin');
        Session::forget('id-admin');
        return Redirect::to('/login-admin');
    }
// admin thống kê doanh thu
    public function getAdminChart(Request $request){
        $month=$request->month;
        $select=DB::table('bill_detail')
        ->join('products','bill_detail.id_product','=','products.id')
        ->join('bills','bill_detail.id_bill','=','bills.id')
        ->select('bill_detail.quantity','bill_detail.unit_price')
        ->whereMonth('bill_detail.updated_at','=',7)
        ->whereYear('bill_detail.updated_at','=',2021)
        ->sum('bill_detail.unit_price');

        $select_created=DB::table('bill_detail')
        ->select('updated_at')
        ->get();
        // dd($select_created[0]->created_at);
        $uservip=DB::table('bills')
        ->join('customer','bills.id_customer','=','customer.id')
        ->select('bills.id_customer','customer.name')
        ->where('bills.id_customer','=',16)
        ->count('bills.id_customer');
        return view('Admins.Page.chart',compact('select','month','select_created','uservip'));
    }
    public function getAdmin(){
        $products = Product::orderBy('id', 'DESC')->skip(1)->take(8)->get();
        return view('Admins.page.table',compact('products'));
    }
    public function editProducts($id){
        $loai = ProductType::all();
        $product = Product::find($id);
        return view('Admins.page.editproduct', compact('product','loai')); 
    }
    public function postEditProduct(Request $request){
        $id=$request->id;
        $product=Product::find($id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $file_name=$file->getClientOriginalName('image');
            $file->move('public/image/product',$file_name);
        }
        if($request->file('image')!=null){
            $product->image=$file_name;
        }
        $product->name = $request->name;       
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->id_type = $request->type;
        $product->save();
        return Redirect::to('product-admin');
    }
    public function getAdd()
    {
        $types = ProductType::all();
        return view('Admins.page.addproduct',compact('types'));
    }
    public function postAdd(Request $request)
    {
        $product = new Product();
        $file_name=$request->file('image')->getClientOriginalName();
        $product->name = $request->name;
        $product->image = $file_name;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->id_type = $request->type;  
        $request->file('image')->move('public/image/product',$file_name);
        $product->save();
        return $this->getAdmin()->with(['flash message'=>'Them san pham thanh cong']);
    }
    public function postDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return Redirect::to('product-admin');
    }
}
