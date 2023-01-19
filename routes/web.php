<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserReservationController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ProfileReservationsController;


Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/home', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/regulamin', [FrontendController::class, 'regulamin'])->name('regulamin');

Route::prefix('/profile')->middleware(['auth'])->group(function (){
    Route::get('/', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
    Route::get('/data', [ProfileController::class, 'profile_data'])->name('profile.data');
    Route::post('/data', [ProfileController::class, 'profile_update_form'])->name('profile.update_form');
    Route::post('/post', [ProfileController::class, 'profile_update'])->name('profile.update');

    Route::get('/tickets', [ProfileReservationsController::class, 'tickets_list'])->name('profile.tickets');
    Route::get('/tickets/{ticket_id}', [ProfileReservationsController::class, 'ticket_show'])->name('profile.ticket_show');
});
Route::prefix('/movie')->group(function (){
    Route::get('/', [FrontendController::class, 'movies'])->name('movies');
    Route::get('/{movie_id}', [FrontendController::class, 'show_movie'])->name('show_movie');
});
Route::prefix('/seances')->group(function (){
    Route::get('/', [FrontendController::class, 'seances'])->name('seances');
    Route::post('/', [FrontendController::class, 'seances'])->name('seances');
});
Route::prefix('/reservation')->group(function (){
    Route::get('/{seance_id}', [UserReservationController::class, 'seat_select'])->name('reservation.seat_select');
    Route::post('/user_form', [UserReservationController::class, 'user_form'])->name('reservation.user_form');
    Route::post('/check_user', [UserReservationController::class, 'check_user'])->name('reservation.check_user');
    Route::post('/guest', [UserReservationController::class, 'guest_user'])->name('reservation.guest_add');
});

//GOOGLE
Route::get('/google/login', [GoogleController::class, 'provider'])->name('google.login');
Route::get('/google/callback', [GoogleController::class, 'callback'])->name('google.callback');


//ADMIN
Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin/profile');
    //USER
    Route::prefix('/user')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin/user');
        Route::get('/add_user', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin/user.add');
        Route::post('/add_user', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin/user.add');
        Route::get('/edit_user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin/user.edit');
        Route::put('/edit_user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin/user.edit');
        Route::put('/change_role/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'change_role'])->name('admin/change.role');
        Route::get('/delete_user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin/user.delete');
    });
    //MOVIE
    Route::prefix('/movie')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\MovieController::class, 'index'])->name('admin/movie');
        Route::get('/add_movie', [App\Http\Controllers\Admin\MovieController::class, 'create'])->name('admin/add_movie');
        Route::post('/add_movie', [App\Http\Controllers\Admin\MovieController::class, 'store_request'])->name('admin/add_movie');
        Route::get('/edit_movie/{movie_id}', [App\Http\Controllers\Admin\MovieController::class, 'edit'])->name('admin/edit_movie');
        Route::put('/edit_movie/{movie_id}', [App\Http\Controllers\Admin\MovieController::class, 'update'])->name('admin/edit_movie');
        Route::get('/delete_movie/{movie_id}', [App\Http\Controllers\Admin\MovieController::class, 'delete'])->name('admin/delete_movie');
    });
    //HALL
    Route::prefix('/hall')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\HallController::class, 'index'])->name('admin/hall');
        Route::get('/add_hall', [App\Http\Controllers\Admin\HallController::class, 'create'])->name('admin/add_hall');
        Route::post('/add_hall', [App\Http\Controllers\Admin\HallController::class, 'store'])->name('admin/add_hall');
        Route::get('/edit_hall/{hall_id}', [App\Http\Controllers\Admin\HallController::class, 'edit'])->name('admin/edit_hall');
        Route::put('/edit_hall/{hall_id}', [App\Http\Controllers\Admin\HallController::class, 'update'])->name('admin/edit_hall');
        Route::get('/delete_hall/{hall_id}', [App\Http\Controllers\Admin\HallController::class, 'delete'])->name('admin/delete_hall');
    });
    //SEANCE
    Route::prefix('/seance')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\SeanceController::class, 'index'])->name('admin/seance');
        Route::get('/add_seance', [App\Http\Controllers\Admin\SeanceController::class, 'create'])->name('admin/add_seance');
        Route::post('/add_seance', [App\Http\Controllers\Admin\SeanceController::class, 'store'])->name('admin/add_seance');
        Route::get('/edit_seance/{seance_id}', [App\Http\Controllers\Admin\SeanceController::class, 'edit'])->name('admin/edit_seance');
        Route::put('/edit_seance/{seance_id}', [App\Http\Controllers\Admin\SeanceController::class, 'update'])->name('admin/edit_seance');
        Route::put('/edit_seance_status/{seance_id}', [App\Http\Controllers\Admin\SeanceController::class, 'update_status'])->name('admin/edit_seance_status');
        Route::get('/delete_seance/{seance_id}', [App\Http\Controllers\Admin\SeanceController::class, 'delete'])->name('admin/delete_seance');
    });
    //RESERVATION
    Route::prefix('/reservation')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('admin/reservation');
        Route::get('/add_reservation', [App\Http\Controllers\Admin\ReservationController::class, 'create'])->name('admin/add_reservation');
        Route::post('/add_reservation', [App\Http\Controllers\Admin\ReservationController::class, 'create_admin_reservation'])->name('admin/add_reservation');
        Route::post('/select_seat/', [App\Http\Controllers\Admin\ReservationController::class, 'select_seat'])->name('admin/select_seat');
        Route::get('/edit_reservation/{reservation_id}', [App\Http\Controllers\Admin\ReservationController::class, 'edit'])->name('admin/edit_reservation');
        Route::put('/edit_reservation/{reservation_id}', [App\Http\Controllers\Admin\ReservationController::class, 'update_reservation_admin'])->name('admin/edit_reservation');
        Route::post('/select_seat_edit/{reservation_id}', [App\Http\Controllers\Admin\ReservationController::class, 'select_seat_edit'])->name('admin/select_seat_edit');
        Route::get('/delete_reservation/{reservation_id}', [App\Http\Controllers\Admin\ReservationController::class, 'delete'])->name('admin/delete_reservation');
    });
});

