<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\SeanceController;
use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReservationController extends Controller
{

    private $reservation_controller = 'App\Http\Controllers\admin\ReservationController';

    public function reservation($seance_id){
        $seance = (new SeanceController())->seance_by_id($seance_id);
        $row_name = (new \App\Http\Controllers\admin\ReservationController())->row_name;
        return view('frontend.reservation.seat_select', compact('seance', 'row_name'));
    }

    public function create_reservation (ReservationRequest $request, $user){
        $seats = $request->input('seat');
        foreach ($seats as $seat){
            $decode_seat = app($this->reservation_controller)->array_from_decode_json($seat);
            $array = app($this->reservation_controller)->reservation_array($request, $user, $decode_seat);

            app($this->reservation_controller)->store($array);
        }
    }

    public function create_user_reservation (ReservationRequest $request){
//        $user = $this->user();
        if(Auth::check()){
            $user = Auth::user();
        }
        else {
            $user = [
                'user_id' => null,
                'name' => 'Mariusz',
                'surname' => 'Pudzianowski',
                'email' => 'pudziankoks@gmail.com',
                'phone_number' => 345345345
            ];
        }
        $user = app($this->reservation_controller)->user_data($user);
        $this->create_reservation($request, $user);

        return redirect()->route('home');
    }

    public function create_reservation_payment (ReservationRequest $request){
        app($this->reservation_controller)->create_reservation_seat($request);

        return redirect()->route('home');
    }
}
