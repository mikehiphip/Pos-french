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
            'title' => "Error Occurred",
            'text' => "You are not authorized to use this menu! ",
            'icon' => 'error'
        ]); 
    }

    public function datatable(Request $request){
			
        $like = $request->Like;
        $sTable = CategoryModel::orderby('sort','asc')
        ->when($like, function ($query) use ($like) {
            if (@$like['name'] != "") {
                $query->where('name', 'like', '%' . $like['name'] . '%');
            }
        })
        ->get();
        $sQuery = DataTables::of($sTable);
        return $sQuery
        ->addIndexColumn()
        ->addColumn('color',function ($row){
            return "<input type='color' value='$row->color' class='form-control' disabled >";
        })
        ->addColumn('change_sort', function ($row) {
            $sorts = CategoryModel::orderby('sort')->get();

            $html = "";
            $html.='<select id="sort_'.$row->id.'" name="sort_'.$row->id.'" class="form-select w100" onchange="changesort('.$row->id.')">';
            foreach($sorts as $s)
            {
                $select = '';
                if($s->sort == $row->sort){ $select = 'selected'; }
                $html.='<option value="'.$s->sort.'" '.$select.'>'.$s->sort.'</option>';
            }
            $html.='</select>';

            $data = $html;
            return $data;
        })
        ->addColumn('action', function ($row) {
        return "<a href='$this->segment/$this->folder/$row->id/edit' class='btn btn-sm btn-info' title='Edit'><i class='far fa-edit'></i></a>                                                
            <a href='javascript:void(0);' class='btn btn-sm btn-danger' onclick='deleteItem($row->id)' title='Delete'><i class='far fa-trash-alt'></i></a>
        ";
        })
        ->addColumn('action_name', function ($row) {
            $secondary = \App\Models\Backend\SubCategoryModel::where('cate_id', $row->id)->get();
            $data = "<span>$row->name</span>";
            if (count($secondary) > 0) {
                $data .= "
                <button type='button' data-tw-toggle='modal' data-tw-target='#show_modal' class='ml-3 btn btn-primary' onclick='show_submenu($row->id);' type='button'><i class='far fa-list-alt'></i></button>";
            }
            return $data;
        })
        ->rawColumns(['action','color','change_sort','action_name'])
        ->make(true);
    }

    public function showsubcate(Request $request)
    {
        $data = CategoryModel::find($request->id);
        $rows = SubCategoryModel::where('cate_id',$data->id)->get();
        return view("$this->prefix.pages.$this->folder.show_subcate", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'data' => $data,
            'rows' => $rows,
        ]);
    }
  
    public function changesort(Request $request)
    {
        $data = CategoryModel::find($request->id);
        $checksort = CategoryModel::where('id','!=',$data->id)->where('sort',$request->sort)->first();
        if($checksort)
        {
            $new_sort = CategoryModel::where('sort',$request->sort)->first();
            $new_sort->sort = $data->sort;
            $new_sort->save();
        }
        $data->sort = $request->sort;
        $data->save();
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
        $cat = CategoryModel::find($id);
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

    public function edit_sub(Request $request,$id)
    {
        $menu_control = Helper::menu_active($this->menu_id);
        if($menu_control){ if($menu_control->read  == "edit") { return $this->auth_menu(); } } else { return $this->auth_menu();}
        $sub_cat = SubCategoryModel::find($id);
        $cat_data = CategoryModel::orderBy('id','asc')->get();
        return view("$this->prefix.pages.$this->folder.edit-sub", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'row'     => $sub_cat,
            'category' => $cat_data,
        ]);
    }

    public function destroy($id)
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
                if($request->position == 'main'){
                    $data = new CategoryModel();
                    $data->created_at = date('Y-m-d H:i:s');
                    $data->updated_at = date('Y-m-d H:i:s');
                    $data->sort = CategoryModel::count() + 1;
                }else{
                    $data = new SubCategoryModel();
                    $data->cate_id = $request->cate_id;
                    $data->created_at = date('Y-m-d H:i:s');
                    $data->updated_at = date('Y-m-d H:i:s');
                }
            } else {
                if($request->position == 'main'){
                    $data = CategoryModel::find($id);
                    $data->updated_at = date('Y-m-d H:i:s');
                }else{
                    $data = SubCategoryModel::where('cate_id',$id)->first();
                    $data->cate_id = $request->cate_id;
                    $data->updated_at = date('Y-m-d H:i:s');
                }
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
}
