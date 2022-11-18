<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeanceRequest;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\Seance;
use Carbon\Carbon;

class SeanceController extends Controller
{
    private int $ad_time = 15;
    private int $preparation_time = 30;

    public function hall_res_time ($movie_id){
        $movie = Movie::find($movie_id);
        $hall_res_time = $movie['length'] + $this->ad_time + $this->preparation_time;
        return $hall_res_time;
    }

    public function index(){
        $seances = Seance::all();
        return view('admin.seance.index', compact('seances'));
    }

    public function create(){
        $movies = Movie::all();
        $halls = Hall::all();
        return view('admin.seance.create', compact('movies', 'halls'));
    }

    public function edit($seance_id){
        $seance = Seance::find($seance_id);
        if($seance){
            $movies = Movie::all();
            $halls = Hall::all();
            return view('admin.seance.edit', compact('seance', 'movies', 'halls'));
        }
        return redirect()->route('admin/seance')->with('message', "Seance doesn't exist");
    }

    public function store(SeanceRequest $request){
        $data = $request->validated();
        $hall_res_time = $this->hall_res_time($request['movie_id']);
        Seance::create($request->all() + ['hall_res_time' => $hall_res_time]);

        return redirect()->route('admin/seance')->with('message', 'New Seance created');
    }

    public function update(SeanceRequest $request, $seance_id){
        $data = $request->validated();
        $seance = Seance::find($seance_id);
        if($seance){
            $hall_res_time = $this->hall_res_time($request['movie_id']);
            $seance->update($request->all() + ['hall_res_time' => $hall_res_time]);

            return redirect()->route('admin/seance')->with('message', 'Seance edited');
        }
        return redirect()->route('admin/seance')->with('message', "Seance doesn't exist");
    }

    public function update_status($seance_id){
        $seance = Seance::find($seance_id);
        if($seance){
            $seance->status = !$seance->status;
            $seance->save();

            return redirect()->route('admin/seance')->with('message', 'Status changed');
        }
        return redirect()->route('admin/seance')->with('message', "Seance doesn't exist");
    }

    public function delete($seance_id){
        $seance = Seance::find($seance_id);
        if($seance){
            Seance::destroy($seance_id);

            return redirect()->route('admin/seance')->with('message', 'Seance deleted');
        }
        return redirect()->route('admin/seance')->with('message', "Seance doesn't exist");
    }

    public function seances_by_day($date)
    {
        $date = Carbon::createFromFormat('d.m', $date)->format('m-d');
        $seances = Seance::join('movies', 'movies.id', '=','seances.movie_id')
            ->join('halls', 'halls.id', '=','seances.hall_id')
            ->orderBy('movies.title')
            ->orderBy('seances.date')
            ->where('seances.date', 'LIKE', '%'.$date.'%')
            ->get(['seances.*', 'movies.title', 'movies.image', 'halls.name', 'halls.rows', 'halls.columns']);

        return $seances;
    }

    public function seance_by_id($id)
    {
        $seance = Seance::join('movies', 'movies.id', '=','seances.movie_id')
            ->join('halls', 'halls.id', '=','seances.hall_id')
            ->orderBy('movies.title')
            ->orderBy('seances.date')
            ->where('seances.id', 'LIKE', $id)
            ->first(['seances.*', 'movies.title', 'movies.image', 'halls.name', 'halls.rows', 'halls.columns']);

        return $seance;
    }
}
