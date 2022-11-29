<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\GetReservationByController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileReservationsController extends Controller
{
    public function tickets_list(){
        $user = Auth::user();
//        $tickets = (new GetReservationByController())->get_reservations_by_user($user->id);
        $tickets = (new GetReservationByController())->get_reservation_with_seance($user->id);
        return view('frontend.profile.tickets_list', compact('tickets'));
    }
}
