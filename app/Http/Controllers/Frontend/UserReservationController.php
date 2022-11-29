<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\SeanceController;
use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserReservationController extends Controller
{

    private $reservation_controller = 'App\Http\Controllers\admin\ReservationController';

    public function seat_select($seance_id){
        $seance = (new SeanceController())->seance_by_id($seance_id);
        $row_name = (new \App\Http\Controllers\admin\ReservationController())->row_name;
        return view('frontend.reservation.seat_select', compact('seance', 'row_name'));
    }

    public function set_reservation_cookie(ReservationRequest $request){
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
        $user = app($this->reservation_controller)->user_data($request);
        foreach ($seats as $seat){
            $decode_seat = app($this->reservation_controller)->array_from_decode_json($seat);
            $array = app($this->reservation_controller)->reservation_array($request, $user, $decode_seat);

            app($this->reservation_controller)->store($array);
        }
        return redirect()->route('home');

    }

    public function check_user (ReservationRequest $request){
        if(Auth::check()){
            $user = app($this->reservation_controller)->user_data($request);
            $this->create_reservation($request, $user);

            return redirect()->route('home');
        }
        else {
            $this->set_reservation_cookie($request);

            return view('frontend.reservation.user_form');
        }
    }

    public function create_reservation (ReservationRequest $request, $user){
        $seats = $request->input('seat');
        foreach ($seats as $seat){
            $decode_seat = app($this->reservation_controller)->array_from_decode_json($seat);
            $array = app($this->reservation_controller)->reservation_array($request, $user, $decode_seat);

            app($this->reservation_controller)->store($array);
        }
    }
}
