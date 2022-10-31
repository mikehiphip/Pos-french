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

use App\Models\Backend\CategoryModel;
use App\Models\Backend\FoodModel;


class FoodController extends Controller
{
    protected $prefix = 'backend';
    protected $segment = 'webpanel';
    protected $controller = 'food';
    protected $folder = 'food';
    protected $menu_id = '3';
    protected $name_page = "Food lists";

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
        $sTable = FoodModel::orderby('tb_food.id','desc')
        ->leftjoin('tb_category','tb_food.cat_id','=','tb_category.id')
        ->select('*','tb_category.id as cat_id','tb_food.id as f_id','tb_food.name as name','tb_category.name as cat_name','tb_food.status as status')
        ->when($like, function ($query) use ($like) {
            if (@$like['name'] != "") {
                $query->where('tb_food.name', 'like', '%' . $like['name'] . '%');
            }
        })
        ->get();
        $sQuery = DataTables::of($sTable);
        return $sQuery
        ->addIndexColumn()
        ->addColumn('category', function($row) {
        	return $row->cat_name;
        })
        ->addColumn('img', function($row) {
        	return "<center><img src='$row->img' class='img-fluid' alt='' style='width:50%; height:auto;'></center>";
        })
        ->addColumn('action', function ($row) {
        return "<a href='$this->segment/$this->folder/$row->f_id/edit' class='btn btn-sm btn-info' title='Edit'><i class='far fa-edit'></i></a>                                                
            <a href='javascript:void(0);' class='btn btn-sm btn-danger' onclick='deleteItem($row->f_id)' title='Delete'><i class='far fa-trash-alt'></i></a>
        ";
        })
        ->rawColumns(['action','img'])
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

    //==== Function Insert Update Delete Status Sort & Others ====
    public function insert(Request $request, $id = null)
    {
        return $this->store($request, $id = null);
    }
    public function update(Request $request, $id)
    {
        return $this->store($request, $id);
    }
    public function store($request, $id = null)
    {
        try {
            // dd($request->file('image'));
            DB::beginTransaction();
            if ($id == null) {
                $data = new FoodModel();
                $data->created_at = date('Y-m-d H:i:s');
                $data->updated_at = date('Y-m-d H:i:s');
                if (!empty($request->image)) {
                    $path = 'upload/food';
                    $img = $request->file('image');
                    $name_new = 'upload/food/Food-' . date('YmdHis') . '.' . $img->getClientOriginalExtension();
                    $save_path = $img->move(public_path($path), $name_new);
    
                    $data->img             = $name_new;
                    $data->save();
                } 
            } else {
                // dd($request);
                $data = FoodModel::find($id);
                $data->updated_at = date('Y-m-d H:i:s');
                if (!empty($request->file('image'))) {
                    //ลบรูปเก่าเพื่ออัพโหลดรูปใหม่แทน
                    if (!empty($data->img)) {
                        $path2 = 'public/upload/food/';
                        @unlink($path2.$data->img);
                    }
                    $path = 'upload/food';
                    $img = $request->file('image');
                    $img_name = 'upload/food/food-' . date('YmdHis') . '.' . $img->getClientOriginalExtension();
                    $save_path = $img->move(public_path($path), $img_name);
                    $image = $img_name;

                    $data->img          = $image;
                    $data->save();
                }
            }
            $data->cat_id = $request->cat_id;
            $data->name = $request->name;
            $data->name_abb = $request->name_abb;
            $data->color = $request->color;
            $data->status = $request->status;
            $data->price = $request->price;
            // dd($data);
            if ($data->save()) {
                DB::commit();
                return view("$this->prefix.alert.success", ['url' => url("$this->segment/$this->folder")]);
            } else {
                return view("$this->prefix.alert.error", ['url' => url("$this->segment/$this->folder")]);
            }
        } catch (\Exception $e) {
            $error_log = $e->getMessage();
            $error_line = $e->getLine();
            $type_log = 'backend';
            $error_url = url()->current();
            $log_id = LogsController::save_logbackend($type_log, $error_log, $error_line, $error_url);

            return view("$this->prefix.alert.alert", [
                'url' => $error_url,
                'title' => "A program error has occurred.",
                'text' => "please inform the code : $log_id to the developer of the program ",
                'icon' => 'error'
            ]);
        }
    }
}
