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
            $data = date('d-m-Y', strtotime('+543 Years', strtotime($row->o_created)));
            return $data;
        })
        ->addColumn('paid', function ($row) {
            $data = number_format($row->total_paid,2);
            return $data;
        })
        ->addColumn('action', function ($row) {
        return "<a href='$this->segment/$this->folder/$row->o_id/edit' class='btn btn-sm btn-info' title='Edit'><i class='far fa-edit'></i></a>                                                
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
    
    public function add(Request $request)
    {
        $menu_control = Helper::menu_active($this->menu_id);
        if($menu_control){ if($menu_control->read  == "add") { return $this->auth_menu(); } } else { return $this->auth_menu();}
        $cat = CategoryModel::where('status','on')->orderBy('sort','asc')->get();
        return view("$this->prefix.pages.$this->folder.add", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'category' => $cat,
        ]);
    }
    public function edit(Request $request,$id)
    {
        $menu_control = Helper::menu_active($this->menu_id);
        if($menu_control){ if($menu_control->read  == "edit") { return $this->auth_menu(); } } else { return $this->auth_menu();}
        $food = FoodModel::where('tb_food.id',$id)
        ->leftjoin('tb_category','tb_food.cat_id','=','tb_category.id')
        ->select('*','tb_category.id as cat_id','tb_food.id as f_id','tb_food.name as name','tb_category.name as cat_name','tb_food.color as f_color')
        ->first();
        $cat = CategoryModel::where('status','on')->orderBy('sort','asc')->get();
        return view("$this->prefix.pages.$this->folder.edit", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'category' => $cat,
            'row'     => $food
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
