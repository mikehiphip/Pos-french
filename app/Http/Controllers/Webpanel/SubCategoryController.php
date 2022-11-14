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
use App\Models\Backend\SubCategoryModel;


class SubCategoryController extends Controller
{
    protected $prefix = 'backend';
    protected $segment = 'webpanel';
    protected $controller = 'sub-category';
    protected $folder = 'sub-category';
    protected $menu_id = '10';
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
        $sTable = SubCategoryModel::orderby('tb_sub_category.id','asc')
        ->leftjoin('tb_category','tb_sub_category.cate_id','=','tb_category.id')
        ->select('*','tb_category.name as cat_name','tb_category.status as cat_status','tb_category.status_speical as cat_spe','tb_category.color as cat_color','tb_sub_category.name as name','tb_sub_category.id as sub_id',
                'tb_sub_category.color as sub_color','tb_sub_category.status as sub_status','tb_sub_category.status_speical as sub_spe')
        ->when($like, function ($query) use ($like) {
            if (@$like['name'] != "") {
                $query->where('tb_sub_category.name', 'like', '%' . $like['name'] . '%');
            }
        })
        ->get();
        $sQuery = DataTables::of($sTable);
        return $sQuery
        ->addIndexColumn()
        ->addColumn('color',function ($row){
            return "<input type='color' value='$row->sub_color' class='form-control' disabled >";
        })
        ->addColumn('action', function ($row) {
        return "<a href='$this->segment/$this->folder/$row->sub_id/edit' class='btn btn-sm btn-info' title='Edit'><i class='far fa-edit'></i></a>                                                
            <a href='javascript:void(0);' class='btn btn-sm btn-danger' onclick='deleteItem($row->sub_id)' title='Delete'><i class='far fa-trash-alt'></i></a>
        ";
        })
        ->rawColumns(['action','color'])
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
        $cat = CategoryModel::orderBy('id','asc')->get();
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
        $cat = SubCategoryModel::find($id);
        $cat_data = CategoryModel::orderBy('id','asc')->get();
        return view("$this->prefix.pages.$this->folder.edit", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'row'     => $cat,
            'category' => $cat_data,
        ]);
    }

    public function destroy($id)
    {
        $datas = SubCategoryModel::find($id);
        if (@$datas) {
            $query = SubCategoryModel::destroy($datas->id);
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
            DB::beginTransaction();
            if ($id == null) {
                    $data = new SubCategoryModel();
                    $data->cate_id = $request->cate_id;
                    $data->created_at = date('Y-m-d H:i:s');
                    $data->updated_at = date('Y-m-d H:i:s');
            } else {
                    $data = SubCategoryModel::find($id);
                    $data->cate_id = $request->cate_id;
                    $data->updated_at = date('Y-m-d H:i:s');
            }
            $data->name = $request->name;
            $data->color = $request->color;
            $data->status_speical = $request->status_speical;
            $data->status = $request->status;
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
    public function destroy_sub($id)
    {
        $datas = CategoryModel::find($id);
        if (@$datas) {
            $query = CategoryModel::destroy($datas->id);
        }

        if (@$query) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function update_sub($request,$id)
    {
        try {
            DB::beginTransaction();
            if($request->position == 'main'){
                $data = new CategoryModel();
                $data->created_at = date('Y-m-d H:i:s');
                $data->updated_at = date('Y-m-d H:i:s');
                $data->sort = CategoryModel::count() + 1;
            }else{
                $data = SubCategoryModel::find($id);
                $data->updated_at = date('Y-m-d H:i:s');
            }
            $data->name = $request->name;
            $data->color = $request->color;
            $data->status_speical = $request->status_speical;
            $data->status = $request->status;
            dd($data);
            
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
