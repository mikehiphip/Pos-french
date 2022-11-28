<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webpanel as Webpanel;
use App\Http\Controllers\Member as Member;
use App\Http\Controllers\Frontend as Frontend;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//========== Session Lang (กรณี 2 ภาษา) ============
// Route::get('/set/lang/{lang}', [Frontend\HomeController::class, 'setLang']);
// Route::get('/', function () {
//     $default = 'th';
//     $lang = Session('lang');
//     if ($lang == "") {
//         Session::put('lang', $default);
//         return redirect("/$default");
//     } else {
//         return redirect("/$lang");
//     }
// });
// Route::group(['middleware' => ['Language']], function () {
//     $locale = ['th', 'en', 'jp'];
//     foreach ($locale as $lang) {
//         Route::prefix($lang)->group(function () {
//             Route::get('', [Frontend\HomeController::class, 'index']);
//         });
//     }
// });
//========== Session Lang ============


// Route
// Route::get('/', function () {
//     return redirect('/webpanel');
// });
Route::get("/", [Frontend\HomeController::class, 'index']);
Route::get("/menu", [Frontend\MenuController::class, 'index']);
Route::post("/menu-list", [Frontend\MenuController::class, 'get_food']);

require('web-backend.php');


