<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Booking;
use App\Tab;
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
use Illuminate\Support\Str;

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
        
        $tabs =  Tab::all();

        $time  = $this->dateDiffInDays($setting->start_date);

        $overView = Overview::all();

        $allSponsor = SponsorshipApplication::with('types')->where('status',1)->get();

        $itterator = SponsorshipApplication::groupBy('sponsor_type_id')->selectRaw('sponsor_type_id')->get();
      
        $a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);

        

        return view('frontend.home',compact('speakerList','time','tickets','setting','groupDate','topic','blogDetails','overView','allSponsor','itterator','content','tabs'));
    }


    public function show(Ticket $id)
    {
        return view('frontend.buyticket',compact('id'));
    }


    public function buyTickets(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|unique:bookings|email',
            'phone'=>'required|unique:bookings|max:11',
            'quantity'=>'required|integer|min:1|max:3',
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
            'name' => 'required|max:50',
            'company'=>'required|unique:sponsorship_applications|max:40',
            'email' => 'required|unique:sponsorship_applications|email',
            'website'=>'required|unique:sponsorship_applications|regex:/^\w+(\.\w+)*(:[0-9]+)?\/?$/',
            'type'=>'required',
            'image' => 'required'
        ]);

        $application =  new SponsorshipApplication();
        $imageName = $request->file('image');
        $path = 'asset/admin/images/sponsor';

        $nameFormate = 'sponsor-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();
        $imageName->move($path,$nameFormate);
        

       $application->name = $request->name;
       $application->company = $request->company;
       $application->email = $request->email;
       $application->website = $request->website;
       $application->sponsor_type_id = $request->type;
       $application->image = $nameFormate;
       $application->status = false;

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


public function blogDetails(Blog $id)
{
    return view('frontend.blogdetails',compact('id'));
}

public function pricingPlan()
{
    $a =  file_get_contents(base_path('resources/json/content.json'));

    $content = json_decode($a,true);

    $ticket = Ticket::latest()->get();

    return view('frontend.pricingplan',compact('ticket','content'));
}


}
