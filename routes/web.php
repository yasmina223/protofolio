
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OnlineCoursesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/run-storage-link', function () {
    \Artisan::call('storage:link');
    return 'Storage link created';
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/do-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::group(['prefix' => 'adminPanel', 'middleware' => 'auth'], function () {
    Route::get('/logout', [LoginController::class, 'signOut']);
    Route::get('/', function () {
        return view('index');
    });
    Route::resource('settings', SettingController::class);
    Route::resource('setting_create', SettingController::class);
    Route::resource('courses', OnlineCoursesController::class);
    Route::resource('skills', SkillsController::class);
    Route::resource('contacts', ContactUsController::class);
    Route::resource('social_media', SocialMediaController::class);
    Route::resource('experiences', ExperienceController::class);
});
// Route::get('front',function(){
// return view('front.index');
// });

Route::get('/', [FrontController::class, 'index']);
Route::post('data', [FrontController::class, 'store'])->name('data.store');


Route::get('/{page}', [AdminController::class, 'index']);
