<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('setting');
Route::post('/updateSiteInfo', [App\Http\Controllers\HomeController::class, 'updateSiteInfo'])->name('updateSiteInfo');
Route::post('/updateSocialAccounts', [App\Http\Controllers\HomeController::class, 'updateSocialAccounts'])->name('updateSocialAccounts');

Route::get('/sliders', [App\Http\Controllers\HomeController::class, 'sliders'])->name('sliders');
Route::post('/addSlider', [App\Http\Controllers\HomeController::class, 'addSlider'])->name('addSlider');
Route::post('/updateSlider', [App\Http\Controllers\HomeController::class, 'updateSlider'])->name('updateSlider');
Route::post('/deleteSlider', [App\Http\Controllers\HomeController::class, 'deleteSlider'])->name('deleteSlider');

Route::get('testimonial', [App\Http\Controllers\HomeController::class, 'testimonial'])->name('testimonial');
Route::post('/addTestimony', [App\Http\Controllers\HomeController::class, 'addTestimony'])->name('addTestimony ');
Route::post('/updateTestimony', [App\Http\Controllers\HomeController::class, 'updateTestimony'])->name('updateTestimony');
Route::post('/deleteTestimony', [App\Http\Controllers\HomeController::class, 'deleteTestimony'])->name('deleteTestimony');

Route::get('sections', [App\Http\Controllers\HomeController::class, 'sections'])->name('sections');
Route::post('/addSectionItem', [App\Http\Controllers\HomeController::class, 'addSectionItem'])->name('addSectionItem');
Route::post('/updateSectionItem', [App\Http\Controllers\HomeController::class, 'updateSectionItem'])->name('updateSectionItem');
Route::post('/deleteSectionItem', [App\Http\Controllers\HomeController::class, 'deleteSectionItem'])->name('deleteSectionItem');
  
