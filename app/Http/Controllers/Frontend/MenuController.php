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
        
        // dd($note);
        return view("$this->prefix.index",[
            'prefix' => $this->prefix,
            'row'   => $f_id,
            'qty_num' => $num ,
            'pointer' => $point,
            'food_name' => $name,
            'qty_price' => $price,
            'note' =>$note,
        ]);
    }
}
