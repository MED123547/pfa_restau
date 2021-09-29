<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;

class ClientController extends Controller
{
    public function menuList() {
//        dd('hello');
        return view('espaceClient.index');
    }

    public function menuShow(Menu $menu) {

    }
    public function createR() {
        return view('reservation');
    }

    public function storeR(Request $request) {

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'nbr_place' => $request->nbr_place,
            'jour' => $request->date,
            'date_debut' => $request->heureD,
            'date_fin' => $request->heureF
        ];
        $reservation = new Reservation();
        $reservation->full_name = $request->name;
        $reservation->email = $request->email;
        $reservation->nbr_place = $request->nbr_place;
        $reservation->jour = $request->date;
        $reservation->date_debut = $request->heureD;
        $reservation->date_fin = $request->heureF;
        $reservation->state = 'non';

        $reservation->save();


        \Mail::send('chefs.reservationMail',
            $details
            , function($msg) use ($request)
            {
                $msg->subject('Reservation');
                $msg->from($request['email']);
                $msg->to('mohamedissanajar@gmail.com');
            });
        return redirect()->route('menu.menuList')->with('success', "Reservation added successfully");
    }

    public function index() {
        return view('reservation.index', [
            'reservation' => Reservation::all()
        ]);
    }

    public function acceptReservation(Reservation $reservation) {
        $details = [
            'name' => $reservation->name,
            'email' => $reservation->email,
            'nbr_place' => $reservation->nbr_place,
            'jour' => $reservation->date,
            'date_debut' => $reservation->heureD,
            'date_fin' => $reservation->heureF
        ];

        $reservation->state = 'oui';
        $reservation->save();

        \Mail::send('chefs.reservationMail',
            $details
            , function($msg) use ($reservation)
            {
                $msg->subject('Reservation accepted');
                $msg->from('mohamedissanajar@gmail.com');
                $msg->to('mohamedissanajar@gmail.com');
            });
        return redirect()->route('reservation.index');
    }
}
