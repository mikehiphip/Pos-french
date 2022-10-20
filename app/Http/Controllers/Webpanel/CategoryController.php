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


class CategoryController extends Controller
{
    protected $prefix = 'backend';
    protected $segment = 'webpanel';
    protected $controller = 'category';
    protected $folder = 'category';
    protected $menu_id = '1';
    protected $name_page = "Food lists";

    public function auth_menu()
    {
        return view("$this->prefix.alert.alert",[
            'url'=> "webpanel",
            'title' => "เกิดข้อผิดพลาด",
            'text' => "คุณไม่ได้รับสิทธิ์ในการใช้เมนูนี้ ! ",
            'icon' => 'error'
        ]); 
    }

    public function datatable(Request $request){
			
        $like = $request->Like;
        $sTable = CategoryModel::orderby('id','desc')
        ->when($like, function ($query) use ($like) {
            if (@$like['name'] != "") {
                $query->where('name_th', 'like', '%' . $like['name'] . '%');
            }
            if (@$like['email'] != "") {
                $query->where('email', 'like', '%' . $like['email'] . '%');
            }
            if (@$like['tel'] != "") {
                $query->where('tel', 'like', '%' . $like['tel'] . '%');
            }
        })
        ->get();
        
        $sQuery = DataTables::of($sTable);
        
        return $sQuery
        ->addIndexColumn()
        ->editColumn('name', function($row) {
        	return $row->name;
        })
        ->editColumn('name_en', function($row) {
        	return is_null($row->name_en) ? '-' : $row->name_en . ' ' . $row->lastname_en;
        })
        ->addColumn('updated_at', function($row) {
        	return is_null($row->updated_at) ? '-' : $row->updated_at;
        })
        ->addColumn('action', function ($row) {
        return "<a href='$this->segment/$this->folder/$row->id/edit' class='btn btn-sm btn-info' title='Edit'><i class='far fa-edit'></i></a>                                                
            <a href='javascript:void(0);' class='btn btn-sm btn-danger' onclick='deleteItem($row->id)' title='Delete'><i class='far fa-trash-alt'></i></a>
        ";
        })
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
        
        return view("$this->prefix.pages.$this->folder.add", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
        ]);
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
                $data = new CategoryModel();
                $data->created_at = date('Y-m-d H:i:s');
                $data->updated_at = date('Y-m-d H:i:s');
                $data->sort = CategoryModel::count() + 1;
            } else {
                $data = CategoryModel::find($id);
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
                'title' => "เกิดข้อผิดพลาดทางโปรแกรม",
                'text' => "กรุณาแจ้งรหัส Code : $log_id ให้ทางผู้พัฒนาโปรแกรม ",
                'icon' => 'error'
            ]);
        }
    }
}
