<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/profile', [App\Http\Controllers\Frontend\FrontendController::class, 'dashboard'])->name('profile');
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('about');
Route::get('/regulamin', [App\Http\Controllers\Frontend\FrontendController::class, 'regulamin'])->name('regulamin');

Route::prefix('/movie')->group(function (){
    Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'movies'])->name('movies');
    Route::get('/{movie_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'show_movie'])->name('show_movie');
});

Route::prefix('/seances')->group(function (){
    Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'seances'])->name('seances');
    Route::post('/', [App\Http\Controllers\Frontend\FrontendController::class, 'seances'])->name('seances');
});

Route::prefix('/reservation')->group(function (){
    Route::get('/{seance_id}', [App\Http\Controllers\Frontend\UserReservationController::class, 'reservation'])->name('reservation');
    Route::post('/', [App\Http\Controllers\Frontend\UserReservationController::class, 'create_user_reservation'])->name('add_reservation');
});

//ADMIN
Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin/profile');
    //USER
    Route::prefix('/user')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin/user');
        Route::get('/add_user', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin/add_user');
        Route::post('/add_user', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin/add_user');
        Route::get('/edit_user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin/edit_user');
        Route::put('/edit_user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin/edit_user');
        Route::put('/change_role/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'change_role'])->name('admin/change_role');
        Route::get('/delete_user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin/delete_user');
    });
    //MOVIE
    Route::prefix('/movie')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\MovieController::class, 'index'])->name('admin/movie');
        Route::get('/add_movie', [App\Http\Controllers\Admin\MovieController::class, 'create'])->name('admin/add_movie');
        Route::post('/add_movie', [App\Http\Controllers\Admin\MovieController::class, 'store'])->name('admin/add_movie');
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

