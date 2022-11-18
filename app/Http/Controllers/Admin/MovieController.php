<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieFormRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public $image_route = 'image/movie/';

    public function index(){
        $movies = Movie::all();
        $image_route = $this->image_route;
        return view('admin.movie.index', compact('movies', 'image_route'));
    }

    public function create(){
        return view('admin.movie.create');
    }

    public function edit($movie_id){
        $movie = Movie::find($movie_id);
        if($movie){
            return view('admin.movie.edit', compact('movie'));
        }
        return redirect()->route('admin/movie')->with('message', "Movie doesn't exist");
    }

    public function save_image(MovieFormRequest $request){
        if($request->hasfile('image_file')){
            $destination = 'image/movie/'.$request['image_file'];
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image_file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('image/movie/', $filename);
            $request->request->add(['image' => $filename]);
        }

        return $request;
    }

    public function store(MovieFormRequest $request){
//        $data = $request->validate();
        $this->save_image($request);
        $slug = Str::slug($request['title']);
        $request->request->add(['slug' => $slug]);
        Movie::create($request->all());

        return redirect()->route('admin/movie')->with('message', 'New Movie created');
    }

    public function update(MovieFormRequest $request, $movie_id){
//        $data = $request->validate;
        $movie = Movie::find($movie_id);
        if($movie){
            $this->save_image($request);
            $slug = Str::slug($request['title']);
            $request->request->add(['slug' => $slug]);
            $movie->update($request->all());

            return redirect()->route('admin/movie')->with('message', 'Movie edited');
        }

        return redirect()->route('admin/movie')->with('message', "Movie doesn't exist");
    }

    public function delete($movie_id){
        $movie = Movie::find($movie_id);
        if($movie){
            $destination = 'image/movie/'.$movie->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            Movie::destroy($movie_id);

            return redirect()->route('admin/movie')->with('message', 'Movie deleted');
        }

        return redirect()->route('admin/movie')->with('message', "Movie doesn't exist");
    }
}
