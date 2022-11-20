<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Reservation;
use App\Models\Seance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    public  $row_name = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T'];


    public function seat_name($seat){
        $json = json_decode($seat, true);

        $seat_name = $this->row_name[$json['row']].$json['column'];
        return $seat_name;
    }

    public function check_reservation($seance_id, $row, $column){
        if(Reservation::where('seance_id', '=', $seance_id)->where('seat_row', '=', $row)->where('seat_column', '=', $column)->exists()){
            return true;
        }
        return false;
    }

    public function index(){
        $row_name = $this->row_name;
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations', 'row_name'));
    }

    public function user_data($user){
        if(is_object($user)){
            $user_data = [
                'user_id' => $user->id,
                'name' => $user->name,
                'surname' => $user->surname,
                'email' => $user->email,
                'phone_number' => $user->phone_number
            ];
        }
        else{
            $user_data = $user;
        }

        return $user_data;
    }

    public function reservation_array(ReservationRequest $request, $user, $decode_seat){
        $array = [
            'user_id'=>$user['user_id'],
            'seance_id'=>$request['seance_id'],
            'seat_row' => $decode_seat['row'],
            'seat_column' => $decode_seat['column'],
            'name' => $user['name'],
            'surname' => $user['surname'],
            'email' => $user['email'],
            'phone_number' => $user['phone_number']

        ];
        return $array;
    }

    public function create(){
        $users = User::all();
        $seances = Seance::all();
        return view('admin.reservation.create', compact('users', 'seances'));
    }

    public function select_seat(ReservationRequest $request){
        $row_name = $this->row_name;
        $seance = Seance::find($request['seance_id']);
        $hall_id = $seance['hall_id'];
        $hall = Hall::find($hall_id);

        return view('admin.reservation.select_seat', compact('hall', 'row_name', 'request'));
    }

    public function edit($reservation_id){
        $users = User::all();
        $seances = Seance::all();
        $reservation = Reservation::find($reservation_id);
        return view('admin.reservation.edit', compact('reservation', 'users', 'seances'));
    }

    public function select_seat_edit(ReservationRequest $request, $reservation_id){
        $row_name = $this->row_name;
        $seance = Seance::find($request['seance_id']);
        $hall_id = $seance['hall_id'];
        $hall = Hall::find($hall_id);
        $reservation = Reservation::find($reservation_id);

        return view('admin.reservation.select_seat_edit', compact('hall', 'row_name', 'request', 'reservation'));
    }

    public function array_from_decode_json($json){
        $seat = json_decode($json, true);
        return $seat;
    }

    public function create_reservation (ReservationRequest $request){
        $seats = $request->input('seat');
        $user = $this->user_data(User::find($request->user_id));
        foreach ($seats as $seat){
            $decode_seat = $this->array_from_decode_json($seat);
            $array = $this->reservation_array($request, $user, $decode_seat);

            $this->store($array);
        }
    }

    public function create_admin_reservation (ReservationRequest $request){
        $this->create_reservation($request);

        return redirect()->route('admin/reservation')->with('message', 'New Reservation created');
    }

    public function store($reservation){
            return Reservation::create($reservation);
    }

    public function update_reservation (ReservationRequest $request, $reservation_id){
        $seat = $request->input('seat');
        $decode_seat = $this->array_from_decode_json($seat);
        $user = $this->user_data(User::find($request->user_id));
        $array = $this->reservation_array($request, $user, $decode_seat);

        $this->update($array, $reservation_id);
    }

    public function update_reservation_admin (ReservationRequest $request, $reservation_id){
        $this->update_reservation($request, $reservation_id);

        return redirect()->route('admin/reservation')->with('message', 'Reservation created');
    }

    public function update($array, $reservation_id){
        $reservation = Reservation::find($reservation_id);

        $reservation->update($array);

        return redirect()->route('admin/reservation')->with('message', 'Reservation edited');
    }

    public function delete($reservation_id){
        Reservation::destroy($reservation_id);

        return redirect()->route('admin/reservation')->with('message', 'Reservation deleted');
    }
}
