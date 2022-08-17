<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\frontend\indexController;
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
    return view('layout');
});

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function(){
   Route::get('login',[AdminController::class,'login'])->name('login_form');
   Route::post('login',[AdminController::class,'checkLoginData'])->name('admin.login');
   Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware('admin');
   Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
   Route::get('regester',[AdminController::class,'regester'])->name('regester_form');
   Route::post('regester',[AdminController::class,'store'])->name('admin.regester');
   Route::get('profile',[AdminProfileController::class,'profileData'])->name('admin.profile')->middleware('admin');
   Route::get('profile/edite',[AdminProfileController::class,'editeProfile'])->name('admin.profile.edite')->middleware('admin');
   Route::post('profile/edite',[AdminProfileController::class,'save_edites_Profile'])->name('admin.save.edits')->middleware('admin');
   Route::get('profile/deleteImage',[AdminProfileController::class,'deleteImage'])->name('deleteImage')->middleware('admin');
   Route::get('changepassword',[AdminProfileController::class,'changepassword'])->name('admin.changepassword')->middleware('admin');
   Route::post('changepassword',[AdminProfileController::class,'check_and_save_newpassword'])->name('admin.save.newPassword')->middleware('admin');
});






//frontend
route::get('/home',function (){return view('user.index');})->name('home');

Route::prefix('user')->group(function(){

route::get('login',[indexController::class,'login'])->name('user.login');
route::get('changepassword',[indexController::class,'changepassword'])->name('user.change.password')->middleware('auth');
route::post('changepassword',[indexController::class,'check_and_save_newpassword'])->name('user.change.password');
route::get('profile',[indexController::class,'profileData'])->name('user.profile')->middleware('auth');

route::post('login',[indexController::class,'checkLoginData'])->name('user.login.check');
route::post('register',[indexController::class,'store'])->name('user.register.check');
route::get('logout',[indexController::class,'logout'])->name('user.logout');
route::get('forgetpassword',[indexController::class,'resetpassword'])->name('user.resetPassword')->middleware('auth');
//route::post('forgetpassword',[indexController::class,'passwordResetLink'])->name('password.email');
route::get('profile',[indexController::class,'profile'])->name('user.profile')->middleware('auth');
route::get('profile/update',[indexController::class,'updatProfile'])->name('user.update.profile')->middleware('auth');
route::post('profile/update',[indexController::class,'save_edites_Profile'])->name('users.save.edits')->middleware('auth');
route::get('profile/image/delete',[indexController::class,'deleteImage'])->name('deleteImage')->middleware('auth');
});
