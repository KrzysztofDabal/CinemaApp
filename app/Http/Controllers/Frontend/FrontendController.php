<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\Admin\SeanceController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MovieController;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $movies = Movie::all();
        $movies_rating = DB::table('movies')->orderByDesc('rating')->take(5)->get();
        $movies_title = DB::table('movies')->orderByDesc('title')->take(5)->get();
        return view('frontend.index', compact('movies', 'movies_rating', 'movies_title'));
    }

    public function dashboard(){
        return view('frontend.profile.dashboard');
    }

    public function seances(Request $request){
        if($request->input('seance_date') == null){
            $seance_date = Carbon::now()->format('d.m');
        }
        else{
            $seance_date = $request->input('seance_date');
        }
        $seances = (new SeanceController())->seances_by_day($seance_date);
        $image_route = (new MovieController())->image_route;
        return view('frontend.seances', compact('seances', 'seance_date', 'image_route'));
    }

    public function movies(){
        $movies = Movie::all();
        return view('frontend.movie.movies', compact('movies'));
    }

    public function show_movie($movie_id){
        $movie = Movie::find($movie_id);
        return view('frontend.movie.show_movie', compact('movie'));
    }

    public function about(){
        return view('frontend.info.about');
    }

    public function regulamin(){
        return view('frontend.info.regulamin');
    }
}
