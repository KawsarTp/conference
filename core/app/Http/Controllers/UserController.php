<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Booking;
use App\Content;
use App\Overview;
use App\Speaker;
use App\Ticket;
use App\Setting;
use App\Sponsor;
use App\SponsorshipApplication;
use App\SponsorType;
use App\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        // date pick for dynamic tabs
        $groupDate = Topic::groupBy('date')->selectRaw('count(*) as date, date')->get();

        $topic = Topic::with('speaker')->get();

       
        // all table data 
        $speakerList = Speaker::get();
        $setting =  Setting::first();
        $tickets = Ticket::all();
        $blogDetails = Blog::all();
        
        

        // time Calculation Method 
        $time  = $this->dateDiffInDays($setting->start_date);


        // site data 
        $banner = Content::where('section_name','banner')->first();
        $about = Content::where('section_name','about')->first();
        $tab = Content::where('section_name','tab')->first();
        $overview = Content::where('section_name','overview')->first();
        $speaker = Content::where('section_name','speaker')->first();
        $schedule = Content::where('section_name','schedule')->first();
        $ticket = Content::where('section_name','ticket')->first();
        $buyticket = Content::where('section_name','buyticket')->first();
        $map = Content::where('section_name','map')->first();
        $blog = Content::where('section_name','blog')->first();
        $sponsor = Content::where('section_name','sponsor')->first();

        $overView = Overview::all();

        $allSponsor = SponsorshipApplication::with('types')->get();

        $itterator = SponsorshipApplication::groupBy('sponsor_type_id')->selectRaw('sponsor_type_id')->get();

        // dd($itterator);

        

        return view('frontend.home',compact('speakerList','time','tickets','setting','groupDate','topic','banner','about','tab','speaker','schedule','ticket','map','blog','blogDetails','sponsor','overView','allSponsor','itterator'));
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

            // dd($ticketNumber);

        }
        
        return redirect()->back()->with('error','No Available Tickets');
        
    }

    public function sponsor()
    {
        $sponsor = Sponsor::first();
        $types = SponsorType::latest()->get();
        return view('frontend.sponsorsection',compact('sponsor','types'));
    }


    public function sponsorApplication(Request $request)
    {
        

        $this->validate($request,[
            'name' => 'required',
            'company'=>'required|unique:sponsorship_applications',
            'email' => 'required|unique:sponsorship_applications',
            'website'=>'required|unique:sponsorship_applications',
            'type'=>'required',
        ]);

       $application =  new SponsorshipApplication();

       $application->name = $request->name;
       $application->company = $request->company;
       $application->email = $request->email;
       $application->website = $request->website;
       $application->sponsor_type_id = $request->type;

       $application->save();

       return redirect()->back()->with('success','Request Sent Success');

    }


    public function dateDiffInDays($date1)  
    { 
     
        $date = strtotime($date1);
        $remaining = $date - time();

        $days_remaining = floor($remaining / 86400);
        $hours_remaining = floor(($remaining % 86400) / 3600);
        $min = floor(($remaining % 3600) / 60);
        $sec = ($remaining % 60);

        return [
            'day'=>$days_remaining,
            'hour'=> $hours_remaining,
            'min'=>$min,
            'sec'=>$sec
        ];
    } 





}
