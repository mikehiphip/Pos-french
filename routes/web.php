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
Route::get('pos/login', [Frontend\AuthController::class, 'getLogin']);
Route::post('pos/login', [Frontend\AuthController::class, 'postLogin']);
Route::get('pos/logout', [Frontend\AuthController::class, 'logOut']);

Route::group(['middleware' => ['POS']], function () {
    Route::get("/", [Frontend\MenuController::class, 'get_food']);
    Route::get("/menu", [Frontend\MenuController::class, 'index']);
    Route::post("/menu-list", [Frontend\MenuController::class, 'get_food']);
    Route::get("/menu-list", [Frontend\MenuController::class, 'get_food']);
    Route::get("/list", [Frontend\MenuController::class, 'food_list']);
    Route::get("/del-list", [Frontend\MenuController::class, 'del_all']);
    Route::get("/note", [Frontend\MenuController::class, 'add_note']);
    Route::post("/save-menu", [Frontend\MenuController::class, 'insert']);
    Route::post("/order-save", [Frontend\MenuController::class, 'save_order']);
    Route::get("/service-data/{id}", [Frontend\MenuController::class, 'service_data']);
    Route::get("/paid-data/{id}", [Frontend\MenuController::class, 'paid_data']);
    Route::post("/change-price", [Frontend\MenuController::class, 'change_price']);
});





require('web-backend.php');


