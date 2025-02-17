<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Price;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $movies = Movie::all();
        $movies_rating = DB::table('movies')->orderByDesc('rating')->take(5)->get();
        $movies_title = DB::table('movies')->orderByDesc('title')->take(5)->get();
        return view('frontend.index', compact('movies', 'movies_rating', 'movies_title'));
    }

    public function about(){
        return view('frontend.info.about');
    }

    public function regulamin(){
        return view('frontend.info.regulamin');
    }

    public function price(){
        $price = Price::all()->first();
        return view('frontend.info.price', compact('price'));
    }

    public function contact(){
        return view('frontend.info.contact');
    }
}
