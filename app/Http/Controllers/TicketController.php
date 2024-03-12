<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class TicketController extends Controller
{
    public function store(Booking $booking){
        if(empty($booking->tickets()) && $booking->is_valid == true){
            for ($i=0; $i < $booking->number_of_tickets; $i++) { 
                $data = [
                    'event' => $booking->event(),
                    'client' => $booking->user()
                ];
                $data += ['alhpacode' => Str::random(6)];
                $ticketData = json_encode($data);
                Ticket::create([
                    'qr_code' => QrCode::format('png')->generate($ticketData),
                    'booking' => $booking->id
                ]);
            }
        }elseif(!empty($booking->tickets())) {
            return redirect()->route('homepage')->with('booking', 'Tickets already generated');
        }else{
            return redirect()->route('homepage')->with('booking', 'Tickets can not be generated, The booking is not valid yet.');
        }
    }
}
