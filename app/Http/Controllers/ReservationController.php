<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Store $store)
    {
        return view('reservation.create', compact('store'));
    }
}
