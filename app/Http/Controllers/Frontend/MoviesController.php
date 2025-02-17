<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MoviesController extends Controller
{
    public function movies(){
        $movies = Movie::all();
        return view('frontend.movie.movies', compact('movies'));
    }

    public function show_movie($movie_id){
        $movie = Movie::find($movie_id);
        if($movie){
            $movie['category'] = json_decode($movie['category'],true);
            return view('frontend.movie.show_movie', compact('movie'));
        }
        else{
            return redirect('/');
        }
    }
}
