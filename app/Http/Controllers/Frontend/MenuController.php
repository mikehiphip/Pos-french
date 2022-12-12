<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Webpanel\LogsController;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Backend\CategoryModel;
use App\Models\Backend\SubCategoryModel;
use App\Models\Backend\FoodModel;

class MenuController extends Controller
{
    protected $prefix = 'front-end';

    public function index(Request $request)
    {
        $cat = CategoryModel::where('status','on')->get();
        $food = FoodModel::where('status','on')->get();
        $sub = SubCategoryModel::where('status','on')->orderBy('id','asc')->get();
        return view("$this->prefix.menu",[
            'prefix' => $this->prefix,
            'catagory'  => $cat,
            'food' => json_encode($food),
            'row' =>json_encode($sub),
        ]);
    }
    public function get_food(Request $request){
        // dd(Session::get('food'));
        // dd($request);
        // Session::put('food',null);
        $f_id = array();
        $num = array();
        $point = array();
        $name = array();
        $price = array();
        $note = array();
        if($request->_token){
            if(Session::get('food') != null){
                $get_food = Session::get('food');
                // dd($get_food);
                if($get_food[0] != $request->ran_num){
                    $f_id = $get_food[1];
                    $f_id[$request->ran_num] = $request->qty_id;

                    $num = $get_food[2];
                    $num[$request->ran_num] = $request->qty_num;

                    $point = $get_food[3];
                    $point[$request->ran_num] =$request->pointer;

                    $name = $get_food[4];
                    $name[$request->ran_num] = $request->food_name;

                    $price = $get_food[5];
                    $price[$request->ran_num] = $request->qty_price;

                    $note = $get_food[6];
                    $note[$request->ran_num] = $request->note;

                    $save = [$request->ran_num,$f_id,$num,$point,$name,$price,$note];
                    Session::put('food',$save);
                }else{
                    $f_id = $get_food[1];
                    $num = $get_food[2];
                    $point = $get_food[3];
                    $name = $get_food[4];
                    $price = $get_food[5];
                    $note = $get_food[6];
                }
            }else{
                $f_id[$request->ran_num] = $request->qty_id?$request->qty_id:array();
                $num[$request->ran_num] = $request->qty_num;
                $point[$request->ran_num] =$request->pointer;
                $name[$request->ran_num] = $request->food_name;
                $price[$request->ran_num] = $request->qty_price;
                $note[$request->ran_num] = $request->note;
                $save = [$request->ran_num,$f_id,$num,$point,$name,$price,$note];
                Session::put('food',$save);
            }
        }else{
            Session::put('food',null);
        }
        // dd($get_food);
        if(isset($get_food['discount'])){
            $check = $get_food['discount']*1 >= 0?(100-$get_food['discount']*1)/100:1;
            $dis_value = $get_food['discount']*1;
        }else{
            $check = 1;
            $dis_value = 0;
        }
        return view("$this->prefix.index",[
            'prefix' => $this->prefix,
            'row'   => $f_id,
            'qty_num' => $num ,
            'pointer' => $point,
            'food_name' => $name,
            'qty_price' => $price,
            'note' =>$note,
            'discount' => $check ,
            'dis_value' =>$dis_value,
        ]);
    }
    public function food_list(Request $request){
        
        $get_food = Session::get('food');
        // dd($request,$get_food);
        // dd($get_food);
        $pointer = array_search($request->ad,$get_food[3][$request->ar]);
        // dd($pointer,$request,$get_food);
        array_splice ( $get_food[1][$request->ar], $request->ad, 1 );
        array_splice ( $get_food[2][$request->ar], $request->ad, 1 );
        array_splice ( $get_food[3][$request->ar], $request->ad, 1 );
        array_splice ( $get_food[4][$request->ar], $request->ad, 1 );
        array_splice ( $get_food[5][$request->ar], $request->ad, 1 );
        if($pointer){
            if(isset($get_food[6][$request->ar][$pointer])){  
                // dd($get_food[6][$request->ar]);
                unset($get_food[6][$request->ar][$pointer]);
                // array_splice ( $get_food[6][$request->ar][$request->ad], $request->ad, 1 ); 
            }
        }
        
        $get_food['discount'] = $request->discount;
        Session::put('food',$get_food);
        return response()->json(true);
    }
    public function del_all(Request $request){
        Session::put('food',null);
        // dd(Session::get('food'));
        return response()->json(true);
    }
    public function add_note(Request $request){
        $get_food = Session::get('food');
        $pointer = array_search($request->ad,$get_food[3][$request->ar]);
        if($pointer >= 0){
            if(isset($get_food[6][$request->ar][$pointer])){  
                $get_food[6][$request->ar][$pointer]['new_note'] =  $request->note;
            }
        }
        Session::put('food',$get_food);
        return $request->note;
    }
    public function insert(Request $request){
        dd($request);
    }
}
