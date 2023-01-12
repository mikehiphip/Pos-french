<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Webpanel\LogsController;

//=== Model Backend ===
use App\Models\Backend\EmployeeInfoModel;

//=====================

class AuthController extends Controller
{
    protected $prefix = 'front-end';

    //=== Submit Auth ===
    public function getLogin()
    {
        return view("$this->prefix.login", [
            'prefix' => $this->prefix
        ]);
    }
    public function postLogin(Request $request)
    {
        $username = $request->fname;
        $password = $request->password;  
        Auth::guard('employee')->attempt(['username'=>$username,'password'=>$password,'status'=>'active']);
        if(Auth::guard('employee')->check()){
            return redirect('/');
        }else{
            return back()->with(['error'=> true]);
        }
    }

    public function logOut()
    {
        if (!Auth::guard('employee')->logout()) {
            return redirect("pos\login");
        }
    }
}
