<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Admin\SeanceController;
use App\Http\Controllers\Admin\MovieController;

class SeancesController extends Controller
{
    public function seances(Request $request){
        if($request->input('seance_date') == null){
            $seance_date = Carbon::now()->format('d.m');
        }
        else{
            $seance_date = $request->input('seance_date');
        }
        $seances = (new SeanceController())->seances_by_day($seance_date)->sortBy('time')->sortBy('title');
        $image_route = (new MovieController())->image_route;
        return view('frontend.seances', compact('seances', 'seance_date', 'image_route'));
    }
}
