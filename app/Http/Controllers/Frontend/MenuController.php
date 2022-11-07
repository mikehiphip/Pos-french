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

class MenuController extends Controller
{
    protected $prefix = 'front-end';

    public function index(Request $request)
    {
        return view("$this->prefix.menu",[
            'prefix' => $this->prefix,
        ]);
    }
}
