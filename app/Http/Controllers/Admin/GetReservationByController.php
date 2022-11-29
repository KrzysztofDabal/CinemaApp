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
}
