<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\SeanceController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserReservationController extends Controller
{

    public function seat_select($seance_id){
        $seance = (new SeanceController())->seance_by_id($seance_id);
        $row_name = (new ReservationController())->row_name;
        return view('frontend.reservation.seat_select', compact('seance', 'row_name'));
    }

    public function set_reservation_cookie(Request $request){
        $minutes = 20;
        $array = [
            'seance_id'=> $request['seance_id'],
            'seat'=>$request->input('seat')
        ];
        $array_json = json_encode($array);
        Cookie::queue('reservation_cookie', $array_json, $minutes);
    }

    public function get_reservation_cookie(Request $request){
        $cookie = $request->cookie('reservation_cookie');
        $json_array = json_decode($cookie, true);
        return $json_array;
    }

    public function guest_user(Request $request){
        $cookie = $this->get_reservation_cookie($request);
        $request->merge(["seance_id"=>$cookie['seance_id']]);
        $seats = $cookie['seat'];
        $user = (new ReservationController())->user_data($request);
        foreach ($seats as $seat){
            $decode_seat = (new ReservationController())->array_from_decode_json($seat);
            $array = (new ReservationController())->reservation_array($request, $user, $decode_seat);

            (new ReservationController())->store($array);
        }
        return redirect()->route('home');

    }

    public function create_reservation (Request $request, $user){
        $seats = $request['seat'];
        if((new ReservationController())->check_reservation($request['seance_id'], $seats) == true){
            return redirect()->route('reservation.seat_select', $request['seance_id'])->with('message', 'The seat is already taken');
        }
        foreach ($seats as $seat){
            $decode_seat = (new ReservationController())->array_from_decode_json($seat);
            $array = (new ReservationController())->reservation_array($request, $user, $decode_seat);

            (new ReservationController())->store($array);
        }
    }

    public function check_user (Request $request){
        if(auth()->check()){
            $user = (new ReservationController())->user_data($request);
            $this->create_reservation($request, $user);

            return redirect()->route('home');
        }
        else {
            $this->set_reservation_cookie($request);

            return view('frontend.reservation.user_form');
        }
    }
}
