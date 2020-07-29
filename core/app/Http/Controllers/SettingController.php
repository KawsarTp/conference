<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Overview;
use App\Setting;
use App\Tab;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{

    public function addBanner(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.addbanner',compact('content'));
    }


    public function addAbout(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.addabout',compact('content'));
    }

   public function addTab(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	$tabs = Tab::latest()->get();
    	return view('admin.content.addtab',compact('content','tabs'));
    }
    public function addButton(Request $request)
    {
        $this->validate($request,[

            'title' => 'required',
            'description'=>'required'


        ]);

        $tab = new Tab();

        $tab->title = $request->title;
        $tab->details = $request->description;
        $tab->save();

        return redirect()->back()->with('success','Button added Success');
    }

    public function tabUpdate(Request $request)
    {
         $this->validate($request,[

            'title' => 'required',
            'description'=>'required'
        ]);

        $tab = Tab::find($request->id);

        $tab->title = $request->title;
        $tab->details = $request->description;
        $tab->save();

        return redirect()->back()->with('success','Tab Updated Success');
           
    }

    public function tabDelete(Request $request,Tab $id)
    {   
        $id->delete();
        return redirect()->back()->with('success','deleted Success');
    }



    public function speakerSection(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.addspeakersection',compact('content'));
    }



    public function scheduleSection(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.schedulesection',compact('content'));
    }


    public function ticketSection(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.ticketsection',compact('content'));
    }
    
    public function buyTicketSection(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.buyticketsection',compact('content'));
    }

    public function eventSection(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.eventsection',compact('content'));
    	
    }

    public function blogSection(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.blogsection',compact('content'));
    	
    }


    public function sponsorSection(Request $request)
    {
    	$a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.content.sponsorsection',compact('content'));
    	
    }


    public function addSection(Request $request)
    {


    	if($request->hasFile('image')){
            
    		$this->validate($request,[
    		'title'=>$request->key == 'overview'? '' : 'required',
    		'subtitle'=> $request->key == 'tab' || $request->key == 'overview'? '':'required',
    		'image' => $request->key == 'overview' ? 'required|image':'image',

    	]);




    	$imageName = $request->file('image');
        
        $speakerNameFormate = "$request->key".'.'.$imageName->getClientOriginalExtension();

        $path = "asset/admin/images/$request->key";

        $imageName->move($path,$speakerNameFormate); 

    	$key = $request->key;

         $a =  file_get_contents(base_path('resources/json/content.json'));
         $fileContent = json_decode($a,true);
         
         $pushContent = [
            "$key"=>[
                "title"     =>$request->title,
                "subtitle"  =>$request->subtitle,
                'image' 	=> $speakerNameFormate,
                ]
        ];
         $margeContent = array_merge($fileContent,$pushContent);
        
        $encode = json_encode($margeContent);
        file_put_contents(base_path('resources/json/content.json'),$encode);

        return redirect()->back()->with('success','Added Successfull');

    	}



    	$this->validate($request,[

    		'title'=>'required',
    		'subtitle'=>'required',
    		

    	]);



    	$key = $request->key;

         $a =  file_get_contents(base_path('resources/json/content.json'));
         $fileContent = json_decode($a,true);
         
         $pushContent = [
            "$key"=>[
                "title"     =>$request->title,
                "subtitle"  =>$request->subtitle,
                
                ]
        ];
         $margeContent = array_merge($fileContent,$pushContent);
        
        $encode = json_encode($margeContent);
        file_put_contents(base_path('resources/json/content.json'),$encode);

        return redirect()->back()->with('success','Added Successfull');



    	 
    }


    public function sectionUpdate(Request $request)
    {
 
        if($request->key == 'overview' && empty($request->file('image'))){
            return redirect()->back()->with('error','Empty Value can not be Updated');
        }
        // .................Updated If image has on form request............

    	if($request->hasFile('image')){
    
    		$this->validate($request,[
                'title'=>$request->key == 'overview'? '' : 'required',
                'subtitle'=> $request->key == 'tab' || $request->key == 'overview'? '':'required',
                'image' => $request->key == 'overview' ? 'required|image':'image',
    
            ]);
            

            $imageName = $request->file('image');

            $nameFormate = "$request->key".'.'.$imageName->getClientOriginalExtension();

            $path = "asset/admin/images/$request->key";

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            if(file_exists($path.'/'.$nameFormate)){
                unlink($path.'/'.$nameFormate);
            }

            $img = Image::make($imageName);

            if($request->key == 'banner'){
                $img->resize(1920,932);
            }

            if($request->key == 'about' || $request->key == 'tab'){
                $img->resize(806,710);
            }

            if($request->key == 'overview'){
                $img->resize(982,627);
            }

            if($request->key == 'buyticket'){
                $img->resize(1920,470);
            }
            

            $img->save($path.'/'.$nameFormate);
            

        	 
       	
            $a =  file_get_contents(base_path('resources/json/content.json'));
            $data = json_decode($a,true);
            $input = $request->key;
            foreach ($data as $key=>$value) {
                if(array_key_exists( $input, $data)){
                    $data[ $input]['title'] = $request->title;
                    $data[ $input]['subtitle'] = $request->subtitle;
                    $data[$input]['image']= $nameFormate;
                 }
            }
        file_put_contents(base_path('resources/json/content.json'),json_encode($data));

        return redirect()->back()->with('success','Updated Successfull');
        }

        
        
        // .................Updated While No image with form Request.............
        $this->validate($request,[

    		'title' => $request->key == 'overview'? '' : 'required',
    		'subtitle' => $request->key == 'overview' || $request->key == 'tab' ? '' : 'required',

    	]);

    	$a =  file_get_contents(base_path('resources/json/content.json'));
        $data = json_decode($a,true);
        $input = $request->key;
            foreach ($data as $key=>$value) {
                if(array_key_exists( $input, $data)){
                    $data[ $input]['title'] = $request->title;
                    $data[ $input]['subtitle'] = $request->subtitle;
                 }
            }
        file_put_contents(base_path('resources/json/content.json'),json_encode($data));

        return redirect()->back()->with('success','Updated Successfull');



       
    }

    

    public function deleteSection($key){

        $delItem = $key;
        $a =  file_get_contents(base_path('resources/json/content.json'));
        $data = json_decode($a,true);
        if(array_key_exists($delItem, $data)){
            unset($data[$delItem]);
        }

        file_put_contents(base_path('resources/json/content.json'),json_encode($data));

        return redirect()->back()->with('success',"Deleted Successfully");


    }


	


	
	public function overview()
	{
        $a =  file_get_contents(base_path('resources/json/content.json'));

        $content = json_decode($a,true);
		$overview = Overview::latest()->paginate(10);
		return view('admin.overview',compact('overview','content'));
	}

	public function overviewSaveToDatabase(Request $request)
	{
		
		$this->validate($request,[
			'title' => 'required',
			'details' => 'required',
			'icon'  => 'required',
		 ]);
		 
		 $overview = new Overview();

		 $overview->title = $request->title;
		 $overview->details = $request->details;
		 $overview->icon = $request->icon;
		 $overview->save();

		 return redirect()->back()->with('success','Add Success');
	}


	public function updateOverview(Request $request)
	{
		$this->validate($request,[
			'title'=>'required',
			'details'=>'required',
		]);
		$overView = Overview::find($request->id);
		if($request->icon == null){
			$overView->title = $request->title;
			$overView->details = $request->details;
			$overView->save();

			return redirect()->back()->with('success','Update Success');
		}

			$overView->title = $request->title;
			$overView->icon = $request->icon;
			$overView->details = $request->details;
			$overView->save();
			return redirect()->back()->with('success','Update Success');

	}


	public function deleteOverview(Overview $id)
	{

		$id->delete();

		return redirect()->back()->with('success','Deleted Success');
	}


    public function logoIcon()
    {
        $setting = Setting::first();
        return view('admin.logoicon',compact('setting'));
    }

    public function logoIconSaveToDatabase(Request $request)
    {

        $this->validate($request,[
            'icon' => 'mimes:jpg,png',
            'logo' => 'mimes:jpg,png',
            'name' => 'required',
            'startdate' => 'required',
            'days' => 'required|numeric|min:1',
            'limit' => 'required|numeric|min:1',
            'location' => 'required',
        ]);
        $checkSetting = Setting::first();
        if($checkSetting == null){
            $setting = new Setting();
            $path = 'asset/admin/images';
            $imageName = $request->file('icon');
            $iconNameFormate = 'icon'.'.'.$imageName->getClientOriginalExtension();
            $imageName->move($path,$iconNameFormate);


            $logPath = 'asset/admin/images/logo';
            $logoImage = $request->file('logo');
            $logoNameFormate = 'logo'.'.'.$logoImage->getClientOriginalExtension();

            $logoImage->move($logPath,$logoNameFormate);

            $setting->name =  $request->name;
            $setting->event =  $request->startdate;
            $setting->days =  $request->days;
            $setting->location = $request->location;
            $setting->limit = $request->limit;
            $setting->icon = $iconNameFormate;
            $setting->logo = $logoNameFormate;

            $setting->save();

            return redirect()->back()->with('success','updated Success');
        }
            $setting = Setting::first();

            if($request->hasFile('icon')){
                $path = 'asset/admin/images';
                $imageName = $request->file('icon');
                $iconNameFormate = 'icon'.'.'.$imageName->getClientOriginalExtension();
                $imageName->move($path,$iconNameFormate);
                $setting->icon = $iconNameFormate;
            }

            if($request->hasFile('logo')){
                $logPath = 'asset/admin/images/logo';
                $logoImage = $request->file('logo');
                $logoNameFormate = 'logo'.'.'.$logoImage->getClientOriginalExtension();
    
                $logoImage->move($logPath,$logoNameFormate);
                $setting->logo = $logoNameFormate;
            }

            $setting->name =  $request->name;
            $setting->event =  $request->startdate;
            $setting->days =  $request->days;
            $setting->location = $request->location;
            $setting->limit = $request->limit;
            
            $setting->save();

            return redirect()->back()->with('success','updated Success');

    }



}
