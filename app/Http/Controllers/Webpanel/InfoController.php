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

use App\Models\Backend\DepartmentModel; 
use App\Models\Backend\EmployeeInfoModel; 

class InfoController extends Controller
{
    protected $prefix = 'backend';
    protected $segment = 'webpanel';
    protected $controller = 'info';
    protected $folder = 'info';
    protected $menu_id = '7';
    protected $name_page = "Employee";

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
        $sTable = EmployeeInfoModel::orderby('tb_info.id','asc')
        ->leftjoin('tb_department','tb_info.de_id','=','tb_department.id')
        ->select('*','tb_info.id as in_id')
        ->when($like, function ($query) use ($like) {
            if (@$like['name'] != "") {
                $query->where('tb_info.first_name', 'like', '%' . $like['name'] . '%');
            }
            if (@$like['name'] != "") {
                $query->where('tb_info.last_name', 'like', '%' . $like['name'] . '%');
            }
        })
        ->get();
        $sQuery = DataTables::of($sTable);
        return $sQuery
        ->addIndexColumn()
        ->addColumn('name',function ($row){
            return $row->first_name.' '.$row->last_name;
        })
        ->addColumn('action', function ($row) {
        return "<a href='$this->segment/$this->folder/$row->in_id/edit' class='btn btn-sm btn-info' title='Edit'><i class='far fa-edit'></i></a>                                                
            <a href='javascript:void(0);' class='btn btn-sm btn-danger' onclick='deleteItem($row->in_id)' title='Delete'><i class='far fa-trash-alt'></i></a>
        ";
        })
        ->editColumn('status', function ($row) {
            $status = "";
            if($row->status == "active")
            {
                $status = "checked";
            }
            $data = "<div class='form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0'>
                        <input id='status_change_$row->in_id' data-id='$row->in_id' onclick='status($row->in_id);' class='show-code form-check-input mr-0 ml-3' type='checkbox' $status>
                    </div>";
            return $data;
        })
        ->rawColumns(['action','name','status'])
        ->make(true);
    }

    public function status($id = null)
    {
        $data = EmployeeInfoModel::find($id);
        $data->status = ($data->status == 'inactive') ? 'active' : 'inactive';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
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
        $de = DepartmentModel::orderBy('id','asc')->get();
        return view("$this->prefix.pages.$this->folder.add", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'depart'  => $de,
        ]);
    }
    public function edit(Request $request,$id)
    {
        $menu_control = Helper::menu_active($this->menu_id);
        if($menu_control){ if($menu_control->read  == "edit") { return $this->auth_menu(); } } else { return $this->auth_menu();}
        $emp = EmployeeInfoModel::where('tb_info.id',$id)
        ->leftjoin('tb_department','tb_info.de_id','=','tb_department.id')
        ->select('*','tb_info.id as in_id')
        ->first();
        $de = DepartmentModel::orderBy('id','asc')->get();
        return view("$this->prefix.pages.$this->folder.edit", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'department'     => $de,
            'row'          => $emp,
        ]);
    }

    public function destroy($id)
    {
        $datas = EmployeeInfoModel::find($id);
        if (@$datas) {
            $query = EmployeeInfoModel::destroy($datas->id);
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
                $data = new EmployeeInfoModel();
                $data->created_at = date('Y-m-d H:i:s');
                $data->updated_at = date('Y-m-d H:i:s');
            } else {
                $data = EmployeeInfoModel::find($id);
                $data->updated_at = date('Y-m-d H:i:s');
            }
            $data->username = $request->username;
            $data->password = bcrypt($request->password);
            $data->de_id = $request->de_id;
            $data->emp_code = $request->emp_code;
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->nickname = $request->nickname;
            $data->sex = $request->sex;
            $data->age = $request->age;
            $data->card_id = $request->card_id;
            $data->birthday = $request->birthday;
            $data->address = $request->address;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->time_in = $request->time_in;
            $data->time_out = $request->time_out;
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
