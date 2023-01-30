<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCagegoryController;
use App\Http\Controllers\admin\SubsubCagegoryController;
use App\Http\Controllers\admin\productController;
use App\Http\controllers\admin\SliderController;
use App\Http\controllers\frontend\languageController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\cartControleller;
use App\Http\Controllers\WishListController;
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
   Route::get('profile/deleteImage',[AdminProfileController::class,'deleteImage'])->name('delete.admin.image')->middleware('admin');
   Route::get('changepassword',[AdminProfileController::class,'changepassword'])->name('admin.changepassword')->middleware('admin');
   Route::post('changepassword',[AdminProfileController::class,'check_and_save_newpassword'])->name('admin.save.newPassword')->middleware('admin');

});

//brands
Route::middleware(['admin'])->group(function () {
route::prefix('brand')->group(function(){
    route::get('view',[brandController::class,'brandsView'])->name('brands.view');
    route::post('newBrand/save',[brandController::class,'brandSave'])->name('brand.save');
    route::get('delete/{id}',[brandController::class,'brandDelete'])->name('brand.delete');
    route::get('edit/{id}',[brandController::class,'brandEdit'])->name('brand.edite');
    route::post('edit',[brandController::class,'brandUpdat'])->name('brand.updat');



});});



//categories
Route::middleware(['admin'])->group(function () {
route::prefix('category')->group(function(){
    route::get('view',[CategoryController::class,'categoriesView'])->name('categories.view');
    route::post('newCategory/save',[CategoryController::class,'CategorySave'])->name('Category.save');
    route::get('delete/{id}',[CategoryController::class,'CategoryDelete'])->name('Category.delete');
    route::get('edit/{id}',[CategoryController::class,'CategoryEdit'])->name('Category.edite');
    route::post('edit',[CategoryController::class,'CategoryUpdat'])->name('category.updat');

//subCategories
route::prefix('subCategory')->group(function(){
    route::get('view',[SubCagegoryController::class,'subCategoriesView'])->name('subCategories.view');
    route::post('save',[SubCagegoryController::class,'subCategorySave'])->name('subCategory.save');
    route::get('delete/{id}',[SubCagegoryController::class,'subCategorDelete'])->name('subCategory.delete');
    route::get('edit/{id}',[SubCagegoryController::class,'subCategorEdit'])->name('subCategory.edite');
    route::post('edit',[SubCagegoryController::class,'subCategorUpdat'])->name('subCategory.updat');

    route::prefix('sub->subCategory')->group(function(){
        route::get('view',[SubsubCagegoryController::class,'subsubCategoriesView'])->name('sub->subCategories.view');
        route::post('save',[SubsubCagegoryController::class,'subsubCategorySave'])->name('sub->subCategory.save');
        route::get('delete/{id}',[SubsubCagegoryController::class,'subsubCategorDelete'])->name('sub->subCategory.delete');
        route::get('edit/{id}',[SubsubCagegoryController::class,'subsubCategorEdit'])->name('sub->subCategory.edite');
        route::post('edit',[SubsubCagegoryController::class,'subsubCategorUpdat'])->name('sub->subCategory.updat');

    });});});});




//products

Route::middleware(['admin'])->group(function () {
route::prefix('product')->group(function(){
    route::get('add',[productController::class,'addNewProduct'])->name('product.add');
    route::post('add',[productController::class,'saveNewProduct'])->name('product.save');
    route::get('manage',[productController::class,'mangeProduct'])->name('products.mange');
    route::get('edit/{id}',[productController::class,'editProduct'])->name('product.edit');
    route::post('edit',[productController::class,'updateProduct'])->name('product.update');
    route::get('delete/{id}',[productController::class,'deleteProduct'])->name('product.delete');
    route::post('multiImages',[productController::class,'updateMultiImages'])->name('product.multiImages.update');
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    route::get('iamge/delete/{id}',[productController::class,'deleteImage'])->name('product.image.delete');

});
});

//slider
Route::middleware(['admin'])->group(function () {
route::prefix('slider')->group(function(){
    route::get('manage',[SliderController::class,'manageSlider'])->name('slider.mange');
    route::post('add',[SliderController::class,'saveSlider'])->name('slider.save');
    route::get('edit/{id}',[SliderController::class,'editSlider'])->name('slider.edit');
    route::post('edit',[SliderController::class,'updateSlider'])->name('slider.updat');
    route::get('delete/{id}',[SliderController::class,'deleteSlider'])->name('slider.delete');

});});






//frontend
route::get('/home',[HomeController::class,'getAllData'])->name('home');
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


Route::get('/category/subcategory/ajax/{category_id}', [SubCagegoryController::class, 'GetSubCategory']);
Route::get('/category/subcategory/subsubcategory/ajax/{subcategory_id}',[SubsubCagegoryController::class ,'GetsubSubCategory']);


//language
Route::get('language/english',[languageController::class,'English'])->name('language.english');
Route::get('language/arabic',[languageController::class,'Arabic'])->name('language.arabic');


Route::get('product/details/{id}',[HomeController::class,'productDetails'])->name('product.details');
Route::get('/product/tag/{tag}', [HomeController::class, 'TagProducts']);
Route::get('/{name}/{id}',[HomeController::class,'getSubCategoryProducts']);
Route::get('/subsubcategory/{name}/{id}',[HomeController::class,'getSubsubCategoryProducts']);
Route::get('/product/view/modal/{id}',[HomeController::class,'getproduct_json']);

//add to cart
Route::post('cart/data/store/{product_id}',[cartControleller::class,'addToCart']);
Route::get('product/mini/cart',[cartControleller::class,'minicart']);
Route::get('/mincart/remove/{rowId}',[cartControleller::class,'removeitem']);


//wish list
Route::group(['middleware'=>['user','auth'],'namespace'=>'User'],function(){

Route::post('/addtowishlist/{product_id}',[WishListController::class,'addtowishlist']);
Route::get('/wishlist/',[WishListController::class,'Getwishlist'])->name('wishList.page');
Route::get('/getwishlist',[WishListController::class,'getWishListproducts']);
Route::post('/deletefromwishlist/{id}',[WishListController::class,'removeProductFromwishList']);
});
