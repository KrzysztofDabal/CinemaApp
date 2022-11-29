<?php

namespace App\Http\Controllers\Admin\Seance;

use App\Http\Controllers\Controller;
use App\Models\Seance;
use Illuminate\Http\Request;

class GetSeanceByIdController extends Controller
{
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
