<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class GetReservationByController extends Controller
{
    public function get_reservations_by_user($user_id){
        $reservations = Reservation::where('user_id', $user_id)->get();
        if($reservations){
            return $reservations;
        }
        else{
            return null;
        }
    }

    public function get_reservation_with_seance($user_id){
        $reservations = Reservation::join('seances', 'seances.id', '=','reservations.seance_id')
            ->join('movies', 'movies.id', '=','seances.movie_id')
            ->join('halls', 'halls.id', '=','seances.hall_id')
            ->orderBy('movies.title')
            ->orderBy('seances.date')
            ->where('reservations.user_id', 'LIKE', $user_id)
            ->get(['seances.*','reservations.*', 'movies.title', 'movies.image', 'halls.name as hallName']);
        if($reservations){
            return $reservations;
        }
        else{
            return null;
        }
    }
    public function get_reservation_by_id($reservation_id){
        $reservation = Reservation::where('reservations.id', $reservation_id)
            ->join('seances', 'seances.id', '=','reservations.seance_id')
            ->join('movies', 'movies.id', '=','seances.movie_id')
            ->join('halls', 'halls.id', '=','seances.hall_id')
            ->first(['seances.*','reservations.*', 'movies.title', 'movies.image', 'halls.name as hallName']);

        if($reservation){
            return $reservation;
        }
        else{
            return null;
        }
    }
}
