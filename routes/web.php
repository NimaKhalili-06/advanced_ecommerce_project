<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
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
})->name('admin.dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy']);

Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile']);
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit']);
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore']);
Route::get('admin/change/password', [AdminProfileController::class, 'AdminChangePassword']);
Route::post('update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword']);


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

// Admin Brand All Routes

Route::prefix('brand')->group(function () {
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');
});

// Admin Category All Routes

Route::prefix('category')->group(function () {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('delete/{id}',[CategoryController::class,'Categorydelete'])->name('category.delete');
});
