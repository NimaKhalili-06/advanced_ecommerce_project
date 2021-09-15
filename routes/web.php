<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\SliderController;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');

Route::middleware(['auth:admin'])->group(function () {
    // Admin Brand All Routes

    Route::prefix('brand')->group(function () {
        Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
        Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    });

    // Admin Category All Routes

    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('delete/{id}', [CategoryController::class, 'Categorydelete'])->name('category.delete');
        // Admin Sub Category

        Route::get('sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('/sub/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
        // Amin Sub->SubCategory
        Route::get('sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
        Route::post('sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
        Route::get('sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('sub/sub/update/{id}', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');

        Route::get('subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategoryAjax']);
        Route::get('subsubcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategoryAjax']);
        // Admin Products All Routes
    });

    Route::prefix('product')->group(function () {
        Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
        Route::post('/store', [ProductController::class, "StoreProduct"])->name('product-store');
        Route::get('/manage', [ProductController::class, "ManageProduct"])->name('manage-product');
        Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'UpdateProduct'])->name('product.update');
        Route::post('image/update/{id}', [ProductController::class, "MultiImageUpdate"])->name('multiImg.update');
        Route::post('thumbnail/update/{id}', [ProductController::class, "ThumbnailUpdate"])->name('thumbnail.update');
        Route::get('/image/delete/{id}', [ProductController::class, 'ImageDelete'])->name('image.delete');
        Route::get('/image/delete/{id}', [ProductController::class, 'ImageDelete'])->name('image.delete');
        Route::get('/product/inactive/{id}', [ProductController::class, 'InActive'])->name('product.inactive');
        Route::get('/product/active/{id}', [ProductController::class, 'Active'])->name('product.active');
        Route::get("product/delete/{id}", [ProductController::class, 'deleteProduct'])->name('product.delete');
    });
    Route::prefix('slider')->group(function () {
        Route::get('manage', [SliderController::class, 'ManageSlider'])->name('manage-slider');
        Route::post('store', [SliderController::class, 'StoreSlider'])->name('slider.store');
        Route::get('edit/{id}', [SliderController::class, 'EditSlider'])->name('slider.edit');
        Route::post('update/{id}', [SliderController::class, 'UpdateSlider'])->name('slider.update');
        Route::get('delete/{id}', [SliderController::class, 'DeleteSlider'])->name('slider.delete');
        Route::get('active/{id}', [SliderController::class, 'ActiveSlider'])->name('slider.active');
        Route::get('inactive/{id}', [SliderController::class, 'InActiveSlider'])->name('slider.inactive');
    });

    Route::get('/admin/logout', [AdminController::class, 'destroy']);
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile']);
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit']);
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore']);
    Route::get('admin/change/password', [AdminProfileController::class, 'AdminChangePassword']);
    Route::post('update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword']);
});



//User All Routes
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword']);
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// Frontend All Routes 
// Multi language All Routes 
Route::get('language/english',[LanguageController ::class,'English'])->name('english.language');
Route::get('language/persian',[LanguageController::class,'Persian'])->name('persian.language');
