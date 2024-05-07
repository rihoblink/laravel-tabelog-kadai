<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create($store_id)
    {
        $store = Store::find($store_id);

        return view('reservation.create', compact('store'));
    }
}
