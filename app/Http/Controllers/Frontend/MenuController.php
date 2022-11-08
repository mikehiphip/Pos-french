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
use App\Models\Backend\FoodModel;

class MenuController extends Controller
{
    protected $prefix = 'front-end';

    public function index(Request $request)
    {
        $cat = CategoryModel::where('status','on')->get();
        $food = FoodModel::where('status','on')->get();
        return view("$this->prefix.menu",[
            'prefix' => $this->prefix,
            'catagory'  => $cat,
            'food' => json_encode($food),
        ]);
    }
    public function get_food(Request $request , $id){
        
    }
}
