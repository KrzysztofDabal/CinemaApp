<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\GetReservationByController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileReservationsController extends Controller
{
    public function tickets_list(){
        $user = Auth::user();
        $reservations = (new GetReservationByController())->get_reservation_with_seance($user->id);
        return view('frontend.profile.tickets_list', compact('reservations'));
    }
    public function ticket_show($reservation_id){
        $reservation = (new GetReservationByController())->get_reservation_by_id($reservation_id);
        return view('frontend.profile.ticket_show', compact('reservation'));
    }
}
