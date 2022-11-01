<?php

namespace App\Http\Controllers\Webpanel;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Functions\MenuControl;
use App\Http\Controllers\Functions\FunctionControl;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Webpanel\LogsController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

use App\Models\Backend\OrderModel;
use App\Models\Backend\OrderListModel;
use App\Models\Backend\FoodModel;

class OrderController extends Controller
{
    protected $prefix = 'backend';
    protected $segment = 'webpanel';
    protected $controller = 'order';
    protected $folder = 'order';
    protected $menu_id = '9';
    protected $name_page = "Order Lists";

    public function auth_menu()
    {
        return view("$this->prefix.alert.alert",[
            'url'=> "webpanel",
            'title' => "Error Occurred",
            'text' => "You are not authorized to use this menu! ",
            'icon' => 'error'
        ]); 
    }

    public function datatable(Request $request){
			
        $like = $request->Like;
        $sTable = OrderModel::orderby('tb_order.id','desc')
        ->whereDate('tb_order.created_at',date('Y-m-d'))
        ->leftjoin('tb_customer','tb_order.cus_id','=','tb_customer.id')
        ->select('*','tb_order.id as o_id','tb_order.created_at as o_created')
        ->when($like, function ($query) use ($like) {
            if (@$like['name'] != "") {
                $query->where('name', 'like', '%' . $like['name'] . '%');
            }
            if (@$like['name'] != "") {
                $query->where('company', 'like', '%' . $like['name'] . '%');
            }
            if (@$like['start_date'] != "") {
                $query->whereDate('tb_order.created_at', '>=', $like['start_date'] );
            }
            if (@$like['end_date'] != "") {
                $query->whereDate('tb_order.created_at', '<=', $like['end_date'] );
            }
        })
        ->get();
        $sQuery = DataTables::of($sTable);
        return $sQuery
        ->addIndexColumn()
        ->addColumn('created_at', function ($row) {
            $data = date('d-m-Y', strtotime($row->o_created));
            return $data;
        })
        ->addColumn('paid', function ($row) {
            $data = number_format($row->total_paid,2);
            return $data;
        })
        ->addColumn('action', function ($row) {
        return "<a href='$this->segment/$this->folder/$row->o_id' class='btn btn-sm btn-info' title='View'><i class='far fa-eye'></i></a>                                                
            <a href='javascript:void(0);' class='btn btn-sm btn-danger' onclick='deleteItem($row->o_id)' title='Delete'><i class='far fa-trash-alt'></i></a>
        ";
        })
        ->rawColumns(['action','created_at','paid'])
        ->make(true);
    }
  

    public function index(Request $request)
    {
        $menu_control = Helper::menu_active($this->menu_id);
        if($menu_control){ if($menu_control->read  == "off") { return $this->auth_menu(); } } else { return $this->auth_menu();}
        return view("$this->prefix.pages.$this->folder.index", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
        ]);
    }

    public function datatable_view(Request $request,$id)
    {
        $sTable = OrderModel::orderby('tb_order.id','desc')
        ->where('tb_order.id',$id)
        ->leftjoin('tb_order_list','tb_order.id','=','tb_order_list.order_id')
        ->leftjoin('tb_food','tb_order_list.food_id','=','tb_food.id')
        ->leftjoin('tb_category','tb_order_list.cat_id','=','tb_category.id')
        ->select('*','tb_order.id as o_id','tb_order.created_at as o_created')
        ->get();
        $sQuery = DataTables::of($sTable);
        return $sQuery
        ->addIndexColumn()
        ->addColumn('img', function ($row) {
            $data = "<img src='$row->img' width='30%' >";
            return $data;
        })
        ->rawColumns(['img','created_at','paid'])
        ->make(true);
    }

    public function view(Request $request,$id)
    {
        $menu_control = Helper::menu_active($this->menu_id);
        if($menu_control){ if($menu_control->read  == "read") { return $this->auth_menu(); } } else { return $this->auth_menu();}
        $order =  OrderModel::where('tb_order.id',$id)
        ->leftjoin('tb_customer','tb_order.cus_id','=','tb_customer.id')
        ->leftjoin('tb_order_list','tb_order.id','=','tb_order_list.order_id')
        ->leftjoin('tb_food','tb_order_list.food_id','=','tb_food.id')
        ->leftjoin('tb_category','tb_order_list.cat_id','=','tb_category.id')
        ->select('*','tb_order.id as o_id','tb_order.created_at as o_created','tb_food.name as fname','tb_category.name as cat_name','tb_customer.name as cus_name')
        ->get();
        return view("$this->prefix.pages.$this->folder.edit", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'row'       => $order,
            'id'        => $id,
        ]);
    }

    public function destroy($id)
    {
        $datas = FoodModel::find($id);
        if (@$datas) {
            $query = FoodModel::destroy($datas->id);
        }

        if (@$query) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
