<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;

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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

/* All Route */
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/editprofile', 'Editprofile')->name('edit.profile');
    Route::post('/admin/storeprofile', 'Storeprofile')->name('store.profile');

    //passowrd change
    Route::get('/admin/changepassword', 'changePassword')->name('change.password');
    Route::post('/admin/updatepassword', 'UpdatePassword')->name('update.password');
});


/* Home slider Route */
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/Home/slider', 'HomeSlider')->name('home.slide');
    Route::post('/Update/slider', 'UpdateSlider')->name('update.slider');
});

/* About Route */
Route::controller(AboutController::class)->group(function(){
    Route::get('/About/Page', 'Index')->name('about.page');
    Route::post('/About/Page/update', 'AboutUpdate')->name('update.about');
});



