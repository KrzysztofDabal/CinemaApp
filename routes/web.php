<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserReservationController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ProfileReservationsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\SeanceController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Frontend\MoviesController;
use App\Http\Controllers\Frontend\SeancesController;


Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/home', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/regulamin', [FrontendController::class, 'regulamin'])->name('regulamin');
Route::get('/price', [FrontendController::class, 'price'])->name('price');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::prefix('/profile')->middleware(['auth'])->group(function (){
    Route::get('/', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
    Route::get('/edit', [ProfileController::class, 'profile_update_form'])->name('profile.update_form');
    Route::put('/edit/{user_id}', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::get('/passedit', [ProfileController::class, 'password_update_form'])->name('profile.update_password_form');
    Route::put('/passedit/{user_id}', [ProfileController::class, 'password_update'])->name('profile.password_update');

    Route::get('/tickets', [ProfileReservationsController::class, 'tickets_list'])->name('profile.tickets');
    Route::get('/tickets/{ticket_id}', [ProfileReservationsController::class, 'ticket_show'])->name('profile.ticket_show');
});
Route::prefix('/movie')->group(function (){
    Route::get('/', [MoviesController::class, 'movies'])->name('movies');
    Route::get('/{movie_id}', [MoviesController::class, 'show_movie'])->name('show_movie');
});
Route::prefix('/seances')->group(function (){
    Route::get('/', [SeancesController::class, 'seances'])->name('get_seances');
    Route::post('/', [SeancesController::class, 'seances'])->name('seances');
});
Route::prefix('/reservation')->group(function (){
    Route::get('/{seance_id}', [UserReservationController::class, 'seat_select'])->name('reservation.seat_select');
    Route::post('/user_form', [UserReservationController::class, 'user_form'])->name('reservation.user_form');
    Route::post('/check_user', [UserReservationController::class, 'check_user'])->name('reservation.check_user');
    Route::post('/guest', [UserReservationController::class, 'guest_user'])->name('reservation.guest_add');
});

//GOOGLE
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');


//ADMIN
Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin/profile');
    //USER
    Route::prefix('/user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin/user');
        Route::get('/add_user', [UserController::class, 'create'])->name('admin/add_user');
        Route::post('/add_user', [UserController::class, 'store'])->name('admin/store_user');
        Route::get('/edit_user/{user_id}', [UserController::class, 'edit'])->name('admin/edit_user');
        Route::put('/edit_user/{user_id}', [UserController::class, 'update'])->name('admin/update_user');
        Route::put('/change_role/{user_id}', [UserController::class, 'change_role'])->name('admin/change_role');
        Route::get('/delete_user/{user_id}', [UserController::class, 'delete'])->name('admin/user_delete');
    });
    //MOVIE
    Route::prefix('/movie')->group(function() {
        Route::get('/', [MovieController::class, 'index'])->name('admin/movie');
        Route::get('/add_movie', [MovieController::class, 'create'])->name('admin/movie_add');
        Route::post('/add_movie', [MovieController::class, 'store_request'])->name('admin/movie_store');
        Route::get('/edit_movie/{movie_id}', [MovieController::class, 'edit'])->name('admin/movie_edit');
        Route::put('/edit_movie/{movie_id}', [MovieController::class, 'update'])->name('admin/movie_update');
        Route::get('/delete_movie/{movie_id}', [MovieController::class, 'delete'])->name('admin/delete_movie');
    });
    //HALL
    Route::prefix('/hall')->group(function() {
        Route::get('/', [HallController::class, 'index'])->name('admin/hall');
        Route::get('/add_hall', [HallController::class, 'create'])->name('admin/add_hall');
        Route::post('/add_hall', [HallController::class, 'store'])->name('admin/store_hall');
        Route::get('/edit_hall/{hall_id}', [HallController::class, 'edit'])->name('admin/edit_hall');
        Route::put('/edit_hall/{hall_id}', [HallController::class, 'update'])->name('admin/update_hall');
        Route::get('/delete_hall/{hall_id}', [HallController::class, 'delete'])->name('admin/delete_hall');
    });
    //SEANCE
    Route::prefix('/seance')->group(function() {
        Route::get('/', [SeanceController::class, 'index'])->name('admin/seance');
        Route::get('/add_seance', [SeanceController::class, 'create'])->name('admin/add_seance');
        Route::post('/add_seance', [SeanceController::class, 'store'])->name('admin/store_seance');
        Route::get('/edit_seance/{seance_id}', [SeanceController::class, 'edit'])->name('admin/edit_seance');
        Route::put('/edit_seance/{seance_id}', [SeanceController::class, 'update'])->name('admin/update_seance');
        Route::put('/edit_seance_status/{seance_id}', [SeanceController::class, 'update_status'])->name('admin/edit_seance_status');
        Route::get('/delete_seance/{seance_id}', [SeanceController::class, 'delete'])->name('admin/delete_seance');
    });
    //RESERVATION
    Route::prefix('/reservation')->group(function() {
        Route::get('/', [ReservationController::class, 'index'])->name('admin/reservation');
        Route::get('/add_reservation', [ReservationController::class, 'create'])->name('admin/add_reservation');
        Route::post('/add_reservation', [ReservationController::class, 'create_admin_reservation'])->name('admin/store_reservation');
        Route::post('/select_seat', [ReservationController::class, 'select_seat'])->name('admin/select_seat');
        Route::get('/edit_reservation/{reservation_id}', [ReservationController::class, 'edit'])->name('admin/edit_reservation');
        Route::put('/edit_reservation/{reservation_id}', [ReservationController::class, 'update_reservation_admin'])->name('admin/update_reservation');
        Route::post('/select_seat_edit/{reservation_id}', [ReservationController::class, 'select_seat_edit'])->name('admin/select_seat_edit');
        Route::get('/delete_reservation/{reservation_id}', [ReservationController::class, 'delete'])->name('admin/delete_reservation');
    });
    //PRICE
    Route::prefix('/price')->group(function() {
        Route::get('/', [PriceController::class, 'index'])->name('admin/price');
        Route::get('/add_price', [PriceController::class, 'add_price_form'])->name('admin/add_price_form');
        Route::post('/add_price', [PriceController::class, 'add_price'])->name('admin/add_price');
        Route::get('/edit_price/{price_id}', [PriceController::class, 'edit'])->name('admin/edit_price');
        Route::put('/edit_price/{price_id}', [PriceController::class, 'update'])->name('admin/update_price');
        Route::get('/delete_price/{price_id}', [PriceController::class, 'delete'])->name('admin/delete_price');
    });
    //DISCOUNT
    Route::prefix('/discount')->group(function() {
        Route::get('/', [DiscountController::class, 'index'])->name('admin/discount');
        Route::get('/add_discount', [DiscountController::class, 'add_discount_form'])->name('admin/add_discount_form');
        Route::post('/add_discount', [DiscountController::class, 'add_discount'])->name('admin/add_discount');
        Route::get('/edit_discount/{discount_id}', [DiscountController::class, 'edit'])->name('admin/edit_discount');
        Route::put('/edit_discount/{discount_id}', [DiscountController::class, 'update'])->name('admin/update_discount');
        Route::get('/delete_discount/{discount_id}', [DiscountController::class, 'delete'])->name('admin/delete_discount');
    });
});