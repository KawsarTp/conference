<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Content;
use App\Speaker;
use App\Ticket;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $speakerList = Speaker::get();
        $b = Content::pluck('id')->first();
       
        $a = Content::find($b);

        $header = $a->content['header'];
        
        $date = strtotime($header['date']);
        $remaining = $date - time();

        $days_remaining = floor($remaining / 86400);
        $hours_remaining = floor(($remaining % 86400) / 3600);
        $min = floor(($remaining % 3600) / 60);
        $sec = ($remaining % 60);

        $time=[
            'day'=>$days_remaining,
            'hour'=> $hours_remaining,
            'min'=>$min,
            'sec'=>$sec
        ];


        $tickets = Ticket::all();

        return view('frontend.home',compact('speakerList','header','time','tickets'));
    }


    public function show(Ticket $id)
    {
        return view('frontend.buyticket',compact('id'));
    }


    public function buyTickets(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:bookings',
            'phone'=>'required|unique:bookings',
            'quantity'=>'required',
            'check' => 'required'
        ]);

        $ticket = Ticket::find($request->id);
        if($ticket->stock >= $request->quantity){
            $TotalPrice = $request->quantity * $request->price;
            $ticketNumber = 'conf-'.time();
            $booking = new Booking();
            $booking->name = $request->name ;
            $booking->ticket_id = $request->id;
            $booking->email = $request->email;
            $booking->phone = $request->phone;
            $booking->quantity =  $request->quantity;
            $booking->price = $TotalPrice;
            $booking->ticket_number = $ticketNumber;

            $booking->save();

            $remainTicket = $ticket->stock - $request->quantity;

            $ticket->stock = $remainTicket;
            $ticket->save();

            return redirect()->back()->with('success','Booking Confirmed');

            dd($ticketNumber);

        }
        
        return redirect()->back()->with('error','No Available Tickets');
        
    }


}
