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
use App\Models\Backend\CustomerModel;
use App\Models\Backend\PaymentModel;
use App\Models\Backend\ZoneModel;
use App\Models\Backend\OrderModel;
use App\Models\Backend\OrderListModel;
use App\Models\Backend\TableDetailModel;
use App\Models\Backend\EmployeeInfoModel;

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
        $pay = PaymentModel::orderBy('id','asc')->get();
        $zone = ZoneModel::leftjoin('tb_city','tb_zone.id','=','tb_city.zone_id')->get();
        $cus = CustomerModel::orderBy('name')->get();
        // dd(json_encode($cus));

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
            'payment' => $pay,
            'zone_data' => json_encode($zone),
            'customer'  => $cus,
            'cus_data' => json_encode($cus),
        ]);
    }
    public function change_price(Request $request){
        dd($request);
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
    public function insert(Request $request)
    {
        try {
            // dd($request);
                $data = new CustomerModel();
                $data->created_at = date('Y-m-d H:i:s');
                $data->updated_at = date('Y-m-d H:i:s');
                $data->main_phone = $request->main_p;
                $data->phone = json_encode($request->tel_list);
                $data->name = $request->name;
                $data->company = $request->company;
                $data->static = $request->static;
                $data->n = $request->nn;
                $data->street = $request->street;
                $data->pc = $request->pc;
                $data->city = $request->city_select;
                $data->zone = $request->zone_select;
                $data->charge = $request->charge;
                $data->pay = $request->pay;
                $data->build = $request->build;
                $data->stairs = $request->stairs;
                $data->floor = $request->floor;
                $data->door = $request->door;
                $data->code1 = $request->code1;
                $data->code2 = $request->code2;
                $data->intvw = $request->intvw;
                $data->time = $request->time;
                $data->note = $request->note;
                $data->order_note = $request->order_note;
                $data->info = $request->info;
                $data->email = $request->email;
                $data->save();
            return response()->json(true);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(false);

        }
    }
    public function save_order(Request $request){
        try {
            // dd($request);
            $prefix = 'OD'.date('Ymd');
            $number = OrderModel::max('number');
            $number = $number == null?1:$number+1 ;
            // dd($number);
            if($number < 10){
                $text_number = $prefix."000$number";
            }else if($number >= 10 && $number < 100){
                $text_number = $prefix."00$number";
            }else if($number >= 100 && $number < 1000){
                $text_number = $prefix."0$number";
            }else{
                $text_number = $prefix.$number;
            }
            // dd($text_number);
          
            $data = new OrderModel;
            $data->prefix = $text_number;
            $data->number = $number;
            $data->total_qty = array_sum($request->qty_nump)*1;
            $data->discount = ($request->disscount)*1;
            $data->total_price = array_sum($request->free_product);
            $data->total_paid = $request->total_paid;
            $data->bill  = 'y';
            $data->cus_id = $request->cusid;
            if($request->cusid){
                $data->member = 'yes';
            }
            $data->typ = $request->type;
            $data->created_by = Auth::guard('employee')->id();
            $data->created_at = date('Y-m-d H:i:s');
            $data->updated_at = date('Y-m-d H:i:s');
            if($data->save()){
                for($x=0;$x<count($request->food_id);$x++){
                    $find = FoodModel::where('id',$request->food_id[$x])->first();
                    // dd($find);
                    $data1 = new OrderListModel;
                    $data1->order_id = $data->id;
                    $data1->cat_id  = $find->cat_id;
                    $data1->food_id = $request->food_id[$x];
                    $data1->price    = $request->free_product[$x];
                    $data1->qty     = $request->qty_nump[$x];
                    $data1->note     = $request->note_text[$x];
                    $data1->created_at = date('Y-m-d H:i:s');
                    $data1->updated_at = date('Y-m-d H:i:s');
                    $data1->save();
                }
                // dd($data,$data1);
            }
            return response()->json(true);
            // dd($data);

        } catch (\Throwable $th) {
            dd($th);
            return response()->json(false);
        }
    }
    public function service_data($id){
        if($id == 1){
            $data = OrderModel::/* whereDate('created_at',date('Y-m-d'))-> */where('paid','n')->orderBy('id','desc')->get();
        }
        if($id == 2){
            $data = OrderModel::/* whereDate('created_at',date('Y-m-d'))-> */where('paid','y')->orderBy('id','desc')->get();
        }
        if($id == 3){
            $data = OrderModel::whereDate('created_at',date('Y-m-d'))
            ->whereTime('created_at','>=', \Carbon\Carbon::parse('15:00'))
            ->whereTime('created_at','<=', \Carbon\Carbon::parse('23:59:59'))
            ->orderBy('id','desc')->get();
        }
        if($id == 4){
            $data = OrderModel::whereDate('created_at',date('Y-m-d'))->orderBy('id','desc')->get();
        }
        $test = "";
        $ser = ['L','E','P'];
        $color = ['#FF33FF','#99FFFF','#FFFACD'];
        $count_data = count($data);
        foreach($data as $d => $dat){
            $cus = CustomerModel::find($dat->cus_id);
            $table = TableDetailModel::find($dat->table_id);
            $staff = EmployeeInfoModel::find($dat->created_by);
            if($count_data < 10){
                $count_data = "000$count_data";
            }else if($count_data >= 10 && $count_data < 100){
                $count_data = "00$count_data";
            }else if($count_data >= 100 && $count_data < 1000){
                $count_data = "0$count_data";
            }else{
                $count_data = $count_data;
            }
            $co = $dat->typ ==null?'':"style='background-color:".$color[$dat->typ].";'";
            $vices = $dat->typ ==null?'':$ser[$dat->typ];
            $test .= "<tr onclick='select_paid($dat->id)' id='select_tr$dat->id'>";
            $test .= "<td $co class='text-center'>$vices</td>";
            $test .= "<td class='text-center' >$count_data</td>";
            $test .= "<td class='text-center' >".date('H:i',Strtotime($dat->created_at))."</td>";
            $test .= "<td class='text-center' >$dat->total_qty</td>";
            if($cus){
                $test .= "<td class='text-center'>$cus->name</td>";
            }else if($table){
                $test .= "<td class='text-center'>$table->tb_name</td>";
            }else{
                $test .= "<td class='text-center'>-</td>";
            }
            $test .= "<td class='text-center' >$staff->first_name</td>";
            $test .= "<td class='text-center' >M0000</td>";
            $box = $dat->paid == 'y'?'checked':'';
            $test .= "<td class='text-center'><input type='checkbox' $box disabled ></td>";
            $test .= "</tr>";
            $count_data--;
        }
        return $test;
    }
    public function paid_data($id){
        $data = OrderModel::find($id);
        $data->paid = 'y';
        $data->updated_at = date('Y-m-d H:i:s');
        $data->save();
    }
}
