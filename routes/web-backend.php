<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webpanel as Webpanel;
//====================  ====================
//================  Backend ================
//====================  ====================


Route::get('webpanel/login', [Webpanel\AuthController::class, 'getLogin']);
Route::post('webpanel/login', [Webpanel\AuthController::class, 'postLogin']);
Route::get('webpanel/logout', [Webpanel\AuthController::class, 'logOut']);
Route::get('member/logout', [Webpanel\AuthController::class, 'logOut']);

Route::group(['middleware' => ['Webpanel']], function () {

    Route::prefix('webpanel')->group(function () {
        Route::get('/', [Webpanel\HomeController::class, 'index']);
        Route::post('/uploadimage_text', [Webpanel\HomeController::class, 'uploadimage_text'])->name('upload');

        Route::prefix('category')->group(function () {
            Route::get('/', [Webpanel\CategoryController::class, 'index']);
            Route::get('/showsubcate', [Webpanel\CategoryController::class, 'showsubcate']);
            Route::post('/datatable', [Webpanel\CategoryController::class, 'datatable']);
            Route::get('/add', [Webpanel\CategoryController::class, 'add']);
            Route::post('/add', [Webpanel\CategoryController::class, 'insert']);
            Route::get('/{id}/edit', [Webpanel\CategoryController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/edit', [Webpanel\CategoryController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', [Webpanel\CategoryController::class, 'destroy']);
            Route::post('/changesort', [Webpanel\CategoryController::class, 'changesort'])->where(['id' => '[0-9]+']);
        });
        Route::prefix('sub-category')->group(function () {
            Route::get('/', [Webpanel\SubCategoryController::class, 'index']);
            Route::post('/datatable', [Webpanel\SubCategoryController::class, 'datatable']);
            Route::get('/add', [Webpanel\SubCategoryController::class, 'add']);
            Route::post('/add', [Webpanel\SubCategoryController::class, 'insert']);
            Route::get('/{id}/edit', [Webpanel\SubCategoryController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/edit', [Webpanel\SubCategoryController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', [Webpanel\SubCategoryController::class, 'destroy']);
        });

        Route::prefix('food')->group(function () {
            Route::get('/', [Webpanel\FoodController::class, 'index']);
            Route::post('/datatable', [Webpanel\FoodController::class, 'datatable']);
            Route::get('/add', [Webpanel\FoodController::class, 'add']);
            Route::post('/add', [Webpanel\FoodController::class, 'insert']);
            Route::get('/{id}/edit', [Webpanel\FoodController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/edit', [Webpanel\FoodController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', [Webpanel\FoodController::class, 'destroy']);
        });
        Route::prefix('customer')->group(function () {
            Route::get('/', [Webpanel\CustomerController::class, 'index']);
            Route::post('/datatable', [Webpanel\CustomerController::class, 'datatable']);
            Route::get('/add', [Webpanel\CustomerController::class, 'add']);
            Route::post('/add', [Webpanel\CustomerController::class, 'insert']);
            Route::get('/{id}/edit', [Webpanel\CustomerController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/edit', [Webpanel\CustomerController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', [Webpanel\CustomerController::class, 'destroy']);
        });
        Route::prefix('info')->group(function () {
            Route::get('/', [Webpanel\InfoController::class, 'index']);
            Route::post('/datatable', [Webpanel\InfoController::class, 'datatable']);
            Route::get('/add', [Webpanel\InfoController::class, 'add']);
            Route::post('/add', [Webpanel\InfoController::class, 'insert']);
            Route::get('/{id}/edit', [Webpanel\InfoController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/edit', [Webpanel\InfoController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', [Webpanel\InfoController::class, 'destroy']);
            Route::get('/status/{id}', [Webpanel\InfoController::class, 'status'])->where(['id' => '[0-9]+']);
        });
        Route::prefix('department')->group(function () {
            Route::get('/', [Webpanel\DepartmentController::class, 'index']);
            Route::post('/datatable', [Webpanel\DepartmentController::class, 'datatable']);
            Route::get('/add', [Webpanel\DepartmentController::class, 'add']);
            Route::post('/add', [Webpanel\DepartmentController::class, 'insert']);
            Route::get('/{id}/edit', [Webpanel\DepartmentController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/edit', [Webpanel\DepartmentController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', [Webpanel\DepartmentController::class, 'destroy']);
        });
        Route::prefix('order')->group(function () {
            Route::get('/', [Webpanel\OrderController::class, 'index']);
            Route::post('/datatable', [Webpanel\OrderController::class, 'datatable']);
            Route::post('/{id}/datatable-view', [Webpanel\OrderController::class, 'datatable_view']);
            Route::get('/add', [Webpanel\OrderController::class, 'add']);
            Route::post('/add', [Webpanel\OrderController::class, 'insert']);
            Route::get('/{id}', [Webpanel\OrderController::class, 'view'])->where(['id' => '[0-9]+']);
            Route::post('/{id}', [Webpanel\OrderController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', [Webpanel\OrderController::class, 'destroy']);
        });
        Route::prefix('table')->group(function () {
            Route::get('/', [Webpanel\TableDetailController::class, 'index']);
            Route::post('/datatable', [Webpanel\TableDetailController::class, 'datatable']);
            Route::get('/add', [Webpanel\TableDetailController::class, 'add']);
            Route::post('/add', [Webpanel\TableDetailController::class, 'insert']);
            Route::get('/{id}/edit', [Webpanel\TableDetailController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/edit', [Webpanel\TableDetailController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', [Webpanel\TableDetailController::class, 'destroy']);
        });

        Route::prefix('test-form')->group(function () {
            Route::get('/', [Webpanel\Test_formController::class, 'index']);
            Route::post('/datatable', [Webpanel\Test_formController::class, 'datatable']);
            Route::get('/add', [Webpanel\Test_formController::class, 'add']);
            Route::post('/add', [Webpanel\Test_formController::class, 'insert']);
            Route::post('/menu/{id}', [Webpanel\Test_formController::class, 'update_active_menu'])->where(['id' => '[0-9]+']);
            Route::get('/{id}', [Webpanel\Test_formController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/{id}', [Webpanel\Test_formController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/status/{id}', [Webpanel\Test_formController::class, 'status'])->where(['id' => '[0-9]+']);
            Route::post('/changesort', [Webpanel\Test_formController::class, 'changesort'])->where(['id' => '[0-9]+']);
            Route::get('/destroy', [Webpanel\Test_formController::class, 'destroy']);
        });

        // System Dev
        Route::prefix('menu')->group(function () {
            Route::get('/', [Webpanel\MenuController::class, 'index']);
            Route::get('/showsubmenu', [Webpanel\MenuController::class, 'showsubmenu']);
            Route::get('/datatable', [Webpanel\MenuController::class, 'datatable']);
            Route::get('/add', [Webpanel\MenuController::class, 'add']);
            Route::post('/add', [Webpanel\MenuController::class, 'insert']);
            Route::get('/edit/{id}', [Webpanel\MenuController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/edit/{id}', [Webpanel\MenuController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/icon', [Webpanel\MenuController::class, 'icon']);
            Route::get('/status/{id}', [Webpanel\MenuController::class, 'status'])->where(['id' => '[0-9]+']);
            Route::post('/changesort', [Webpanel\MenuController::class, 'changesort'])->where(['id' => '[0-9]+']);
            Route::post('/changesort_sub', [Webpanel\MenuController::class, 'changesort_sub'])->where(['id' => '[0-9]+']);

            Route::get('/destroy', [Webpanel\MenuController::class, 'destroy']);
            Route::get('/destroy_sub', [Webpanel\MenuController::class, 'destroy_sub']);
        });

        Route::prefix('role')->group(function () {
            Route::get('/', [Webpanel\RoleController::class, 'index']);
            Route::get('/datatable', [Webpanel\RoleController::class, 'datatable']);
            Route::get('/add', [Webpanel\RoleController::class, 'add']);
            Route::post('/add', [Webpanel\RoleController::class, 'insert']);
            Route::post('/menu/{id}', [Webpanel\RoleController::class, 'update_active_menu'])->where(['id' => '[0-9]+']);
            Route::get('/edit/{id}', [Webpanel\RoleController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/edit/{id}', [Webpanel\RoleController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/status/{id}', [Webpanel\RoleController::class, 'status'])->where(['id' => '[0-9]+']);
            Route::get('/destroy', [Webpanel\RoleController::class, 'destroy']);
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [Webpanel\UserController::class, 'index']);
            Route::post('/datatable', [Webpanel\UserController::class, 'datatable']);
            Route::get('/add', [Webpanel\UserController::class, 'add']);
            Route::post('/add', [Webpanel\UserController::class, 'insert']);
            Route::get('/edit/{id}', [Webpanel\UserController::class, 'edit'])->where(['id' => '[0-9]+']);
            Route::post('/edit/{id}', [Webpanel\UserController::class, 'update'])->where(['id' => '[0-9]+']);
            Route::get('/status/{id}', [Webpanel\UserController::class, 'status'])->where(['id' => '[0-9]+']);
            Route::get('/destroy', [Webpanel\UserController::class, 'destroy']);
        });
    });
});
?>