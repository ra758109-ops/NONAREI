<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('member.booking', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_type' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'total_price' => 'required|numeric',
        ]);

        $checkIn = new \DateTime($request->check_in);
        $checkOut = new \DateTime($request->check_out);
        $nights = $checkIn->diff($checkOut)->days;

        $bookingCode = 'NR-' . strtoupper(Str::random(8));

        Booking::create([
            'user_id' => Auth::id(),
            'booking_code' => $bookingCode,
            'room_type' => $request->room_type,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'nights' => $nights > 0 ? $nights : 1,
            'total_price' => $request->total_price,
            'payment_status' => 'pending',
        ]);

        return redirect()->route('member.booking')->with('success', 'Reservasi berhasil dibuat!');
    }
}
