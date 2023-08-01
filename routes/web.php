<?php

use App\Http\Controllers\Front\Homepage;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){
Route::get('giris',[\App\Http\Controllers\Back\AuthController::class,'login'])->name('login');
Route::post('giris',[\App\Http\Controllers\Back\AuthController::class,'loginPost'])->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
    Route::get('panel',[\App\Http\Controllers\Back\Dashboard::class,'index'])->name('dashboard');
    //Makale Route's
    Route::get('makaleler/silinenler',[\App\Http\Controllers\Back\ArticleController::class,'trashed'])->name('trashed.article');
    Route::resource('makaleler','App\Http\Controllers\Back\ArticleController');
    Route::get('/switch',[\App\Http\Controllers\Back\ArticleController::class,'switch'])->name('switch');
    Route::get('/deletearticle/{id}',[\App\Http\Controllers\Back\ArticleController::class,'delete'])->name('delete.article');
    Route::get('/harddeletearticle/{id}',[\App\Http\Controllers\Back\ArticleController::class,'hardDelete'])->name('hard.delete.article');
    Route::get('/recoverarticle/{id}',[\App\Http\Controllers\Back\ArticleController::class,'recover'])->name('recover.article');
    //Category Route's
    Route::get('/kategoriler',[\App\Http\Controllers\Back\CategoryController::class,'index'])->name('category.index');
    Route::post('/kategoriler/create',[\App\Http\Controllers\Back\CategoryController::class,'create'])->name('category.create');
    Route::post('/kategori/update',[\App\Http\Controllers\Back\CategoryController::class,'update'])->name('category.update');
    Route::post('/kategori/delete',[\App\Http\Controllers\Back\CategoryController::class,'delete'])->name('category.delete');
    Route::get('/kategori/status',[\App\Http\Controllers\Back\CategoryController::class,'switch'])->name('category.switch');
    Route::get('/kategori/getData',[\App\Http\Controllers\Back\CategoryController::class,'getData'])->name('category.getdata');
    //Page Route's
    Route::get('/sayfalar',[\App\Http\Controllers\Back\PageController::class,'index'])->name('page.index');
    Route::get('/sayfalar/olustur',[\App\Http\Controllers\Back\PageController::class,'create'])->name('page.create');
    Route::get('/sayfalar/guncelle/{id}',[\App\Http\Controllers\Back\PageController::class,'update'])->name('page.edit');
    Route::post('/sayfalar/guncelle/{id}',[\App\Http\Controllers\Back\PageController::class,'updatePost'])->name('page.edit.post');
    Route::post('/sayfalar/olustur',[\App\Http\Controllers\Back\PageController::class,'post'])->name('page.create.post');
    Route::get('/sayfa/switch',[\App\Http\Controllers\Back\PageController::class,'switch'])->name('page.switch');
    Route::get('/sayfa/sil/{id}',[\App\Http\Controllers\Back\PageController::class,'delete'])->name('page.delete');
    Route::get('/sayfa/siralama',[\App\Http\Controllers\Back\PageController::class,'orders'])->name('page.orders');
    //
    Route::get('cikis',[\App\Http\Controllers\Back\AuthController::class,'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/a','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/',[Homepage::class, 'index'])->name('homepage');
Route::get('/sayfa','App\Http\Controllers\Front\Homepage@index');
Route::get('/iletisim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletisim','App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('{category}/single/{id}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}','App\Http\Controllers\Front\Homepage@page')->name('page');



