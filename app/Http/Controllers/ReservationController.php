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

    public function store(Request $request, Store $store)
    {
        $request->validate([
            'reservation_date' => 'required|after_or_equal:today',
            'people' => 'required|numeric|min:1',
        ]);

        $reservation = new Reservation();
        $reservation->reservation_datetime = $request->input('reservation_date');
        $reservation->people = $request->input('people');
        $reservation->store_id = $store->id;
        $reservation->user_id = Auth::id();
        $reservation->save();

        return redirect('stores.show', $store);
    }
}
