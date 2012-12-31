<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Booking;
use App\Content;
use App\Speaker;
use App\Ticket;
use App\Topic;
use App\Setting;
use App\Sponsor;
use App\SponsorshipApplication;
use App\SponsorType;
use Carbon\Carbon;
use Image;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\File;

class AdminController extends Controller
{

    public function index(){

        $bookings = Booking::sum('price');
        $quantity = Booking::groupBy('quantity')->sum('quantity');
        $speakerCount = Speaker::all()->count();
        $speaker = Speaker::latest()->paginate(3);
        $topic = Topic::all()->count();
        $allBookings = Booking::with('ticket')->paginate(5);
        $setting = Setting::first();
        $sponsor = Sponsor::all();
        $ticket = Ticket::with('bookings')->get();
        return view('admin.home',compact('bookings','quantity','speaker','topic','allBookings','setting','sponsor','speakerCount','ticket'));
    }


    public function addContentForm(){
        return view('admin.addcontent');
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
            'image' =>'required|image|max:1024|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = $request->file('image');
        
        $speakerNameFormate = 'speaker-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();
        $img = Image::make($imageName);
        $path = 'asset/admin/images/speaker';
        $img->resize(150,150);
        $img->save($path.'/'.$speakerNameFormate);
        
        $speaker = new Speaker();

       

        $speaker->name = $request->name;
        $speaker->details = $request->details;
        $speaker->designation = $request->expertise;
        $speaker->image = $speakerNameFormate;

        $speaker->save();

        return redirect()->back()->with('success','Speaker Added Successfully');
    }



    public function viewSpeaker()
    {
        $allSpeaker = Speaker::latest()->paginate(10);

        return view('admin.viewallspeaker',compact('allSpeaker'));
    }

    public function updateSpeaker(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'details'=>'required',
            'expertise'=>'required',
            'image'=>'image'
        ]);

        $speaker = Speaker::find($request->id);
        $path = 'asset/admin/images/speaker';
        


        if($request->hasFile('image')){
                $imageName = $request->file('image');
                $speakerNameFormate = 'speaker-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();
            if(file_exists($path.'/'.$speaker->image)){
                unlink($path.'/'.$speaker->image);
            }
                $imageName->move($path,$speakerNameFormate);

                $speaker->name = $request->name;
                $speaker->details = $request->details;
                $speaker->image = $speakerNameFormate;
                $speaker->designation = $request->expertise;

                $speaker->save();

                return redirect()->back()->with('success','Update Successfully');
        }


                $speaker->name = $request->name;
                $speaker->details = $request->details;
                $speaker->designation = $request->expertise;

                $speaker->save();
                return redirect()->back()->with('success','Update Successfully');
       

        

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
            'benefits'=>'required',
            'image'=>'required|image'
        ]);

        $ticket = new Ticket();
        

        $imageName = $request->file('image');
        
        $speakerNameFormate = 'ticket-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();

        $path = 'asset/admin/images/ticket';


        $imageName->move($path,$speakerNameFormate); 



        $ticket->type = $request->type;
        $ticket->price = $request->price;
        $ticket->stock = $request->stock;
        $ticket->feature = $request->feature;
        $ticket->details = $request->details;
        $ticket->benefits = $request->benefits;
        $ticket->image = $speakerNameFormate;

        $ticket->save();

        return redirect()->back()->with('success','Ticket Info Add Successful');
    }

    public function viewTickets()
    {
        $tickets = Ticket::all();
        return view('admin.viewtickets',compact('tickets'));
    }

    public function ticketUpdate(Request $request)
    {
        
        $this->validate($request,[
            'type'=>'required',
            'price'=>'required|numeric|min:1',
            'stock'=>'required|numeric|min:1',
            'feature'=>'required',
            'details'=>'required',
            'benefits'=>'required',
            'image'=>'image'
        ]);

        $ticket = Ticket::find($request->id);

        $imageName = $request->file('image');
        $path = 'asset/admin/images/ticket';


        if($request->hasFile('image')){
            $imageName = $request->file('image');
            $speakerNameFormate = 'speaker-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();
        if(file_exists($path.'/'.$ticket->image)){
            unlink($path.'/'.$ticket->image);
        }
            $imageName->move($path,$speakerNameFormate);

            $ticket->type = $request->type;
            $ticket->price = $request->price;
            $ticket->stock = $request->stock;
            $ticket->feature = $request->feature;
            $ticket->details = $request->details;
            $ticket->image = $speakerNameFormate;
            $ticket->benefits = $request->benefits;

            $ticket->save();

            return redirect()->back()->with('success','Update Successfully');
    }
        
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
        
        $blogNameFormate = 'blog-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();

        $path = 'asset/admin/images/blog';

       

        $imageName->move($path,$blogNameFormate); 


        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->image = $blogNameFormate;

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

        $blog = Blog::find($request->id);
        $path = 'asset/admin/images/blog';

        if($request->hasFile('image')){
                $imageName = $request->file('image');
                $blogNameFormate = 'blog-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();
                if(file_exists($path.'/'.$blog->image)){
                    unlink($path.'/'.$blog->image);
                }
                $imageName->move($path,$blogNameFormate); 
                $blog->title = $request->title;
                $blog->details = $request->details;
                $blog->image = $blogNameFormate;

                $blog->save();

                return redirect()->back()->with('success','Updated Successfully');
        }

                $blog->title = $request->title;
                $blog->details = $request->details;
                $blog->save();

                return redirect()->back()->with('success','Updated Successfully');

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
        $setting = Setting::first();
        return view('admin.addconferencetopic',compact('speakers','setting'));
        
    }

    public function addconferenceTopicToDatabase(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:topics',
            'from'=> "required|date_format:H:i|before:to",
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

    public function addSponsor()
    {
       
        return view('admin.addsponsors');
    }

    public function sponsorAddToDatabase(Request $request)
    {
        $this->validate($request,[
            'details'=>'required',
            'benefit'=>'required',
            'about'=>'required',
        ]);
        $sponsor = new Sponsor();

        

        if($sponsor->first() == null ){
            $sponsor->details = $request->details;
            $sponsor->benefit = $request->benefit;
            $sponsor->about = $request->about;

            $sponsor->save();

            return redirect()->back()->with('success','Added Successfully');
        }


        if($sponsor->first()->count() > 0){
            $getSponsor = $sponsor->first();
            $getSponsor->details = $request->details;
            $getSponsor->benefit = $request->benefit;
            $getSponsor->about = $request->about;

            $getSponsor->save();

            return redirect()->back()->with('success','Update Successfully');
        }
    }


    public function sponsorTypeView()
    {
        return view('admin.addsponsortype');
    }

    public function sponsorTypeSave(Request $request)
    {

        // return request()->all();
        $this->validate($request,[
            "name"=>"required|unique:sponsor_types",
        ]);

        $sponsorType = new SponsorType();


        $sponsorType->name = $request->name;

        $sponsorType->save();

        return redirect()->back()->with('success','Add Successfull');
    }

    public function manageSponsor()
    {
        $applicaitons = SponsorshipApplication::with('types')->latest()->paginate(5);
        return view('admin.managesponsor',compact('applicaitons'));
    }


    public function updateSponsorApplication(Request $request)
    {
        $this->validate($request,[
            'image'=>'image',
        ]);

        $sponsor = new SponsorshipApplication();

        $dataField = $sponsor->find($request->id);

        $imageName = $request->file('image');
    
        $speakerNameFormate = 'sponsor-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();

        $path = 'asset/admin/images/sponsor';

        

        $imageName->move($path,$speakerNameFormate);
        
        SponsorshipApplication::where('id', $request->id)->update(['image' => $speakerNameFormate ]);
       


        return back()->with('succes','update succes');
    }

    public function manageAllData ()
    {
        $sponsorType = SponsorType::all();
        $requirements = Sponsor::latest()->get();
        return view('admin.managesponsordata',compact('requirements','sponsorType'));
    }

    public function updateSponsorDetails(Request $request)
    {
        $this->validate($request,[
            'details' => 'required',
            'benefit' => 'required',
            'about' => 'required',
        ]);

        $sponsor = Sponsor::find($request->id);

        $sponsor->details = $request->details;
        $sponsor->benefit = $request->benefit;
        $sponsor->about = $request->about;
        $sponsor->save();

        return redirect()->back()->with('success','Updated Success');
    }

    public function updateSponsorType(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $type = SponsorType::find($request->id);

        $type->name = $request->name;
        $type->save();

        return redirect()->back()->with('success','Updated Success');
    }

    public function deleteSponsorData(Request $request , Sponsor $id)
    {
        $id->delete();

        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function deleteSponsorTypeData(Request $request , SponsorType $id)
    {
        $id->delete();

        return redirect()->back()->with('success','Deleted Successfully');
       
    }

    public function settingView()
    {
        $setting = Setting::first();
        return view('admin.addSetting',compact('setting'));
    }

    public function settingStoreToDatabase(Request $request){
        $this->validate($request,[
            'from'=>'required|after:today',
            'to'=>'required|after:from',
            'location'=>'required'
        ]);

        $setting =  new Setting();

        if($setting->first() == null){
            $setting->start_date =  $request->from;
            $setting->end_date =  $request->to;
            $setting->location =  $request->location;

            $setting->save();
        }

        if($setting->all()->count() > 0){
            $getdata = $setting->first();
            $getdata->start_date =  $request->from;
            $getdata->end_date =  $request->to;
            $getdata->location =  $request->location;

            $getdata->save();

        return redirect()->back()->with('success','Save to database');

        }

        

    }
}
