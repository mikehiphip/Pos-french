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
use App\Models\Backend\InfoModel;

//=====================

class AuthController extends Controller
{
    protected $prefix = 'front-end';

    //=== Submit Auth ===
    public function getLogin()
    {
        if (Auth::guard()->id() != null) {
            return redirect('webpanel');
        } else {
            return view("$this->prefix.login", [
                'css' => [""],
                'prefix' => $this->prefix
            ]);
        }
    }
    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $remember = ($request->remember == 'on') ? true : false;
        if (Auth::attempt(['email' => $username, 'password' => $password], $remember)) {
            $member = User::find(Auth::guard()->id());
            if ($member->status != "active") {
                return redirect('webpanel\login')->with(['error' => 'ไม่สามารถใช้งานได้ กรุณาติดต่อผู้ดูแล !']);
            } else {
                return redirect('webpanel');
            }
        } else {
            return redirect('webpanel\login')->with(['error' => 'ชื่อผู้ใช้งาน หรือรหัสผ่านผิด !']);
        }
    }

    public function logOut()
    {
        if (!Auth::logout()) {
            return redirect("webpanel\login");
        }
    }
}
