<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings = Booking::all();
        return view("dashboard", compact('bookings'));
    }
    public function book(Event $event, User $user, Request $request){
        $request->validate([
            'tickets' => 'required',
            'total_price' => 'required'
        ]);
        $data = [
            'client' => $user->id,
            'the_event' => $event->id,
            'number_of_tickets' => $request->tickets,
            'total_price' => $request->total_price
        ];
        $booking = Booking::create($data);
        // decrease the available tickets
        $event->decrement('available_tickets', $booking->number_of_tickets);
        // booking auto accept
        if($event->auto_accept == true){
            $booking->update([
                'is_valid' => true
            ]);
        }
        return redirect()->route('dashboard')->with('success', 'You booked the event successfully');
    }
    public function cancel(Booking $booking){
        $booking->delete();
        $booking->event()->increment('available_tickets', $booking->number_of_tickets);
        return redirect()->route('dashboard')->with('success', 'The booking is canceled');
    }
}
