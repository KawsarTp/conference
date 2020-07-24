<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Overview;
use App\Tab;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function addBanner(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.addbanner',compact('content'));
    }

    public function addAbout(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.addabout',compact('content'));
    }

   public function addTab(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	$tabs = Tab::latest()->get();
    	return view('admin.addtab',compact('content','tabs'));
    }
    public function addButton(Request $request)
    {
        // return 'ok';
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
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.addspeakersection',compact('content'));
    }



    public function scheduleSection(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.schedulesection',compact('content'));
    }


    public function ticketSection(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.ticketsection',compact('content'));
    }
    
    public function buyTicketSection(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.buyticketsection',compact('content'));
    }

    public function eventSection(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.eventsection',compact('content'));
    	
    }

    public function blogSection(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.blogsection',compact('content'));
    	
    }


    public function sponsorSection(Request $request)
    {
    	$a =  file_get_contents(resource_path('json\content.json'));

        $content = json_decode($a,true);
    	
    	return view('admin.sponsorsection',compact('content'));
    	
    }


    public function addSection(Request $request)
    {


    	if($request->hasFile('image')){

    		$this->validate($request,[

    		'title'=>'required',
    		'subtitle'=> $request->key == 'tab' ? '':'required',
    		'image' => 'image',

    	]);




    	$imageName = $request->file('image');
        
        $speakerNameFormate = "$request->key".'.'.$imageName->getClientOriginalExtension();

        $path = "asset/admin/images/$request->key";

        $imageName->move($path,$speakerNameFormate); 

    	$key = $request->key;

         $a =  file_get_contents(resource_path('json\content.json'));
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
        file_put_contents(resource_path('json\content.json'),$encode);

        return redirect()->back()->with('success','Added Successfull');

    	}



    	$this->validate($request,[

    		'title'=>'required',
    		'subtitle'=>'required',
    		

    	]);



    	$key = $request->key;

         $a =  file_get_contents(resource_path('json\content.json'));
         $fileContent = json_decode($a,true);
         
         $pushContent = [
            "$key"=>[
                "title"     =>$request->title,
                "subtitle"  =>$request->subtitle,
                
                ]
        ];
         $margeContent = array_merge($fileContent,$pushContent);
        
        $encode = json_encode($margeContent);
        file_put_contents(resource_path('json\content.json'),$encode);

        return redirect()->back()->with('success','Added Successfull');



    	 
    }



    



   





    public function sectionUpdate(Request $request)
    {

    	if($request->hasFile('image')){
    		$this->validate($request,[

    		'title' => 'required',
    		'subtitle' => 'required',
    		'image' => 'image'

    	]);

    		$imageName = $request->file('image');
        
        	$nameFormate = "$request->key".'.'.$imageName->getClientOriginalExtension();

        	$path = "asset/admin/images/$request->key";
        	 if(file_exists($path.'/'.$nameFormate)){
                unlink($path.'/'.$nameFormate);
            }

        	$imageName->move($path,$nameFormate); 


       	
        $a =  file_get_contents(resource_path('json\content.json'));
        $data = json_decode($a,true);
        $input = $request->key;
            foreach ($data as $key=>$value) {
                if(array_key_exists( $input, $data)){
                    $data[ $input]['title'] = $request->title;
                    $data[ $input]['subtitle'] = $request->subtitle;
                    $data[$input]['image']= $nameFormate;
                 }
            }
        file_put_contents(resource_path('json\content.json'),json_encode($data));

        return redirect()->back()->with('success','Updated Successfull');
    	}

    	$a =  file_get_contents(resource_path('json\content.json'));
        $data = json_decode($a,true);
        $input = $request->key;
            foreach ($data as $key=>$value) {
                if(array_key_exists( $input, $data)){
                    $data[ $input]['title'] = $request->title;
                    $data[ $input]['subtitle'] = $request->subtitle;
                 }
            }
        file_put_contents(resource_path('json\content.json'),json_encode($data));

        return redirect()->back()->with('success','Updated Successfull');



       
    }

    

    public function deleteSection($key){

        $delItem = $key;
        $arr_index = [];
        $a =  file_get_contents(resource_path('json\content.json'));
        $data = json_decode($a,true);
        if(array_key_exists($delItem, $data)){
            unset($data[$delItem]);
        }

        file_put_contents(resource_path('json\content.json'),json_encode($data));

        return redirect()->back()->with('success',"Deleted Successfully");


    }


	


	
	public function overview()
	{
		$overview = Overview::latest()->paginate(10);
		return view('admin.overview',compact('overview'));
	}

	public function overviewSaveToDatabase(Request $request)
	{
		// return request()->all();
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




}
