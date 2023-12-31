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


Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/about-us', [App\Http\Controllers\WelcomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/our-events', [App\Http\Controllers\WelcomeController::class, 'events'])->name('events');
Route::get('/event-details/{slug}', [App\Http\Controllers\WelcomeController::class, 'singleEvent'])->name('singleEvent');
Route::get('/contact', [App\Http\Controllers\WelcomeController::class, 'contact'])->name('contact');
Route::get('/blogs', [App\Http\Controllers\WelcomeController::class, 'blogs'])->name('blogs');
Route::get('/blog-details/{slug}', [App\Http\Controllers\WelcomeController::class, 'singleBlog'])->name('singleBlog');





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
  
Route::get('events', [App\Http\Controllers\HomeController::class, 'events'])->name('events');
Route::post('/addEvent', [App\Http\Controllers\HomeController::class, 'addEvent'])->name('addEvent');
Route::post('/updateEvent', [App\Http\Controllers\HomeController::class, 'updateEvent'])->name('updateEvent');
Route::post('/deleteEvent', [App\Http\Controllers\HomeController::class, 'deleteEvent'])->name('deleteEvent');

Route::get('event/{slug}', [App\Http\Controllers\HomeController::class, 'event'])->name('event');
Route::post('/addFeature', [App\Http\Controllers\HomeController::class, 'addFeature'])->name('addFeature');
Route::post('/updateFeature', [App\Http\Controllers\HomeController::class, 'updateFeature'])->name('updateFeature');
Route::post('/deleteFeature', [App\Http\Controllers\HomeController::class, 'deleteFeature'])->name('deleteFeature');

Route::post('/addSponsor', [App\Http\Controllers\HomeController::class, 'addSponsor'])->name('addSponsor');
Route::post('/updateSponsor', [App\Http\Controllers\HomeController::class, 'updateSponsor'])->name('updateSponsor');
Route::post('/deleteSponsor', [App\Http\Controllers\HomeController::class, 'deleteSponsor'])->name('deleteSponsor');

Route::post('/addSchedule', [App\Http\Controllers\HomeController::class, 'addSchedule'])->name('addSchedule');
Route::post('/updateSchedule', [App\Http\Controllers\HomeController::class, 'updateSchedule'])->name('updateSchedule');
Route::post('/deleteSchedule', [App\Http\Controllers\HomeController::class, 'deleteSchedule'])->name('deleteSchedule');


Route::get('/news', [App\Http\Controllers\HomeController::class, 'news'])->name('news');
  Route::post('/addNews', [App\Http\Controllers\HomeController::class, 'addNews'])->name('addNews');
  Route::post('/updateNews', [App\Http\Controllers\HomeController::class, 'updateNews'])->name('updateNews');
  Route::post('/deleteNews', [App\Http\Controllers\HomeController::class, 'deleteNews'])->name('deleteNews');

  Route::post('/managePost', [App\Http\Controllers\HomeController::class, 'managePost'])->name('managePost');