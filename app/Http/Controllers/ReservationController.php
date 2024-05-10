<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ReservationController extends Controller
{
    public function create($store_id)
    {
        $store = Store::find($store_id);
     
        return view('reservation.create', compact('store'));
    }

    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->reservation_date = $request->input('reservation_date');
        $reservation->people = $request->input('people');
        $reservation->user_id = $request->input('user_id');
        $reservation->store_id = $request->input('store_id');
        $reservation->save();

        return view('store.show');
    }
}
