<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ChefsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SearchController;


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


// Route::get('/profile', function () {
//     return view('profile.profile');
// });

Route::get('/contact', function () {
    return view('contact');
});



Route::get('/register_page', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerPost']);
Route::get('/login_page', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginPost']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/service', [ServiceController::class, 'index']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/team', [ChefsController::class, 'index']);
Route::get('/testimonial', [CommentController::class, 'index']);
Route::get('/booking', [BookingController::class, 'index']);




Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::Post('/reserve-booking', [BookingController::class, 'store']);
    Route::Post('/update-booking/{id}', [BookingController::class, 'update']);
    Route::Post('/update-form/{id}', [BookingController::class, 'update_form']);
    Route::delete('/delete-booking/{booking_id}', [BookingController::class, 'delete']);

    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/dashboard-password', [AdminController::class, 'dashboard_password']);
    Route::get('/dashboard-chefs', [AdminController::class, 'dashboard_chefs']);
    Route::get('/dashboard-menu', [AdminController::class, 'dashboard_menu']);
    Route::get('/dashboard-users', [AdminController::class, 'dashboard_users']);
    Route::get('/dashboard-booking', [AdminController::class, 'dashboard_booking']);
    Route::get('/dashboard-images', [ImageController::class, 'index']);
    Route::Post('/user-search', [SearchController::class, 'user_search']);
    Route::Post('/menu-search', [SearchController::class, 'menu_search']);
    Route::delete('/delete-users/{user_id}', [AuthController::class, 'delete_users']);
    Route::get('/info-users/{user_id}', [AuthController::class, 'get_info_users']);
    Route::get('/delete_food/{food_id}', [MenuController::class, 'delete']);
    Route::get('/info-menu/{food_id}', [MenuController::class, 'info_food']);
    Route::get('/info-chefs/{chefs_id}', [ChefsController::class, 'info_chefs']);
    Route::get('/new-pla', [MenuController::class, 'new_pla']);
    Route::get('/new-chefs', [ChefsController::class, 'new_chefs']);
    Route::get('/new-user', [AuthController::class, 'new_user']);
    Route::post('/make-admin/{user_id}', [AuthController::class, 'make_admin']);
    Route::post('/validate-booking/{booking_id}', [BookingController::class, 'validate_booking']);
    Route::get('/is-validate-info/{booking_id}', [BookingController::class, 'validate_info']);
    Route::get('/booking-info/{booking_id}', [BookingController::class, 'booking_info']);
    Route::get('/is-admin-info/{user_id}', [AuthController::class, 'is_admin']);
    Route::post('/new-user/store', [AuthController::class, 'registerPost']);
    Route::post('/new-pla/store', [MenuController::class, 'store']);
    Route::post('/new-chefs/store', [ChefsController::class, 'store']);
    Route::post('/update-pla/{food_id}', [MenuController::class, 'update']);
    Route::delete('/delete-chefs/{chef_id}', [ChefsController::class, 'delete']);
    Route::post('/update-chefs/{chef_id}', [ChefsController::class, 'update']);

    Route::get('/profile',[AuthController::class,'profile']);
    Route::Post('/profile-update',[AuthController::class,'update']);
    
});




