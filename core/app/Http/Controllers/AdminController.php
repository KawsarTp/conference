<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Booking;
use App\Content;
use App\Speaker;
use App\Ticket;
use App\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $a = Topic::all();
        
        return view('admin.home');
    }

    public function addContentForm()
    {
        return view('admin.addcontent');
    }

    public function addContentFormToDatabse(Request $request)
    {
        $data = $request->except(['_token']);
        //     $this->validate($request,[
        //         'section'=>'required',
        //         'title'=>'required',
        //         'details'=>'required',
        //         'date'=>'required'
        //    ]);
    
           Content::create([
            "content->$request->section"=>$data,
           ]);

        // if($request->section == 'about'){
            
        //     $this->validate($request,[
        //         'section'=>'required',
        //         'title'=>'required',
        //         'sub'=>'required',
        //         'details'=>'required',
        //         'image'=>'required'
        //    ]);

        //    $imageName = $request->file('image');
        
        //    $imageFormate = "$request->section-".Str::random(8).'.'.$imageName->getClientOriginalExtension();
   
        //    $path = 'asset/admin/images/content';
   
        //    $saveToDatabase = $path.'/'.$imageFormate;
   
        //    $imageName->move($path,$imageFormate); 

    
        //    Content::updateOrCreate([
        //     "content->$request->section"=>data,
        //    ]);
        // }
       
    }

    public function viewAllContent()
    {
        return view('admin.viewallcontent');
    }


    public function addSpeaker()
    {
        return view('admin.speaker');
    }


    public function speakerSaveToDatabase(Request $request)
    {
        // validate input field
        $this->validate($request,[
            'name' => 'required|unique:speakers',
            'details' =>'required',
            'expertise' =>'required',
            'image' =>'required|image|max:1024',
        ]);

        $speaker = new Speaker();

        $imageName = $request->file('image');
        
        $speakerNameFormate = 'speaker-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();

        $path = 'asset/admin/images/speaker';

        $saveToDatabase = $path.'/'.$speakerNameFormate;

        $imageName->move($path,$speakerNameFormate); 

        $speaker->name = $request->name;
        $speaker->details = $request->details;
        $speaker->designation = $request->expertise;
        $speaker->image = $saveToDatabase;

        $speaker->save();

        return redirect()->back()->with('success','Speaker Added Successfully');
    }



    public function viewSpeaker()
    {
        $allSpeaker = Speaker::all();

        return view('admin.viewallspeaker',compact('allSpeaker'));
    }

    public function addTickets()
    {
        return view('admin.addtickets');
    }

    public function addTicketsToDatabase(Request $request)
    {
        $this->validate($request,[
            'type'=>'required|unique:tickets',
            'price'=>'required|numeric|min:1',
            'stock'=>'required|numeric|min:1',
            'feature'=>'required',
            'details'=>'required',
            'benefits'=>'required'
        ]);

        $ticket = new Ticket();

        $ticket->type = $request->type;
        $ticket->price = $request->price;
        $ticket->stock = $request->stock;
        $ticket->feature = $request->feature;
        $ticket->details = $request->details;
        $ticket->benefits = $request->benefits;

        $ticket->save();

        return redirect()->back()->with('success','Ticke Info Add Successful');
    }

    public function viewTickets()
    {
        $tickets = Ticket::all();
        return view('admin.viewtickets',compact('tickets'));
    }

    public function ticketUpdate(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'type'=>'required',
            'price'=>'required|numeric|min:1',
            'stock'=>'required|numeric|min:1',
            'feature'=>'required',
            'details'=>'required',
            'benefits'=>'required'
        ]);

        $ticket = Ticket::find($request->id);

        $ticket->type = $request->type;
        $ticket->price = $request->price;
        $ticket->stock = $request->stock;
        $ticket->feature = $request->feature;
        $ticket->details = $request->details;
        $ticket->benefits = $request->benefits;

        $ticket->save();
        
        return redirect()->back()->with('success','Update Succeess');
    }

    public function viewAllBookings()
    {
        $bookings = Booking::with('ticket')->get();
        
        return view('admin.viewallbooking',compact('bookings'));
    }

    public function addBlogDetails()
    {
        return view('admin.addblogdetails');
    }

    public function addBlogDetailsToDatabase(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'image'=>'required|image'
        ]);

        $blog = new Blog();
        
        $imageName = $request->file('image');
        
        $speakerNameFormate = 'blog-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();

        $path = 'asset/admin/images/blog';

        $saveToDatabase = $path.'/'.$speakerNameFormate;

        $imageName->move($path,$speakerNameFormate); 


        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->image = $saveToDatabase;

        $blog->save();

        return redirect()->back()->with('success','Blog Added Successfully');
    }

    public function viewAllBlog()
    {
        $blogs = Blog::latest()->paginate(10); 
        
        return view('admin.viewallblog',compact('blogs'));
    }

    public function editBlog(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'details' => 'required',
            'image' => 'image'
        ]);

        $blog = Blog::findOrFail($request->id);
        
        unlink($blog->image);

    }

    public function addTopic()
    {
        return view('admin.addtopic');
    }

    public function viewTopic()
    {
        return view('admin.viewalltopic');
    }

    public function addconferenceTopic()
    {
        $speakers = Speaker::all();
        return view('admin.addconferencetopic',compact('speakers'));
        
    }

    public function addconferenceTopicToDatabase(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:topics',
            'from'=> "required|date_format:H:i|before:to|min:",
            'to'=> 'required|date_format:H:i|after:from',
            'date'=>'required|after:today',
        ]);

        $topic = new Topic();
        $timeSlot = $request->from.' to '.$request->to;
        $validateDate = Topic::where('date',$request->date)->get();


        if($topic->all()->count() == 0){

            $topic->name = $request->name;
            $topic->time_slot = $timeSlot;
            $topic->date = $request->date;
            $topic->speaker_id = $request->speaker;

            $topic->save();

            return redirect()->back()->with('success','Topic add succefull');
        }

        if($validateDate->count() == 0){

            $topic->name = $request->name;
            $topic->time_slot = $timeSlot;
            $topic->date = $request->date;
            $topic->speaker_id = $request->speaker;

            $topic->save();

            return redirect()->back()->with('success','Topic add succefull');
        }

        if($validateDate->count() >= 3){
            return redirect()->back()->with('error','All Slot Already filled Up In this Date');
        }

        if($validateDate->count() < 3){
            $timeSlotString = $topic->latest()->pluck('time_slot')->toArray();
            $makeString = implode('',$timeSlotString);
           
            $timeSlotArray = explode(' to ',$makeString);
           
            if($timeSlotArray[1] < $request->from){

                    $topic->name = $request->name;
                    $topic->time_slot = $timeSlot;
                    $topic->date = $request->date;
                    $topic->speaker_id = $request->speaker;

                    $topic->save();

                    return redirect()->back()->with('success','Topic add succefull');
            }
            if($timeSlotArray[1] > $request->from){
                return redirect()->back()->with('error','Already booked A slot This Time');
            }
        }
            
        }

    public function viewAllTopic()
    {
        $topics = Topic::all();
        return view('admin.viewallconferencetopic',compact('topics'));
    }

    public function addTopicsToSpeaker()
    {
        $topics =  Topic::all();

        return view('admin.addspeakerwithtopics',compact('topics'));
    }
}
