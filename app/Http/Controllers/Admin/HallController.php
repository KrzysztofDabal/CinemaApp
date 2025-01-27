<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HallRequest;
use App\Models\Hall;
use Illuminate\Support\Str;

class HallController extends Controller
{

    public function index(){
        $halls = Hall::all();
        return view('admin.hall.index', compact('halls'));
    }

    public function create(){
        return view('admin.hall.create');
    }

    public function store(HallRequest $request){
        $request->validated();
        Hall::create($request->all());

        return redirect()->route('admin/hall')->with('message', 'New Seance created');
    }

    public function edit($hall_id){
        $hall = Hall::find($hall_id);
        if($hall){
            return view('admin.hall.edit', compact('hall'));
        }
        return redirect()->route('admin/hall')->with('message', 'Hall doesn\'t exist');
    }

    public function update(HallRequest $request, $hall_id){
        $request->validated();
        $hall = Hall::find($hall_id);
        $hall->update($request->all());

        return redirect()->route('admin/hall')->with('message', 'Seance edited');
    }

    public function delete($hall_id){
        $hall = Hall::find($hall_id);
        if($hall){
            Hall::destroy($hall_id);

            return redirect()->route('admin/hall')->with('message', 'Hall deleted');
        }

        return redirect()->route('admin/hall')->with('message', 'Hall doesn\'t exist');
    }
}
