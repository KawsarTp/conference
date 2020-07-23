<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Overview;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function addBanner()
    {
    	$content =  Content::where('section_name','banner')->first();
    	// dd($content);
    	return view('admin.addbanner',compact('content'));
    }

    public function bannerUpdate(Request $request)
    {	
    	$this->validate($request,[

    		'title'=>'required',
    		'subtitle' =>'required'

    	]);

    	$data =['content'=>['title'=>$request->title,'subtitle'=>$request->subtitle]];

    	$content = json_encode($data);

    	Content::where('section_name','banner')->update($data);

    	return redirect()->back()->with('success','Updated Successfull');

    }



    // About Section

    public function addAbout()
    {
    	$content =  Content::where('section_name','about')->first();

    	return view('admin.addabout',compact('content'));
    }

    public function aboutSectionUpdate(Request $request)
    {
    	$this->validate($request,[

    		'title'=>'required',
    		'subtitle' =>'required',
    		'image'=>'required|image'

    	]);

    	$imageName = $request->file('image');
    	$imageConv = 'about-'.Str::random(8).'.'.$imageName->getClientOriginalExtension();

    	$path = 'asset/frontend/images/about';

    	$imageName->move($path,$imageConv);

    	$data =['content'=>['title'=>$request->title,'subtitle'=>$request->subtitle,'image'=>$imageConv]];

    	$content = json_encode($data);

    	Content::where('section_name','about')->update($data);

    	return redirect()->back()->with('success','Updated Successfull');
    }



    public function addTab()
    {
    	$content =  Content::where('section_name','tab')->first();

    	return view('admin.addtab',compact('content'));
    	
	}
	


	public function tabUpdate(Request $request)
	{
		$a = file_get_contents(base_path('resources\json\section.json'));
		$decode = json_decode($a);
		dd($decode->header->title);
		return 'ok';
		$this->validate($request,[
			'title'=>'required',
		]);
		
		$content =  Content::where('section_name','tab')->first();

		foreach($content->content['tabs'] as $tab){
			if($request->title == $tab['title']){

				// $data = [
				// 	'title'=>$request->title,
				// 	'details'=>$request->details,
				// 	'subtitle'=>$request->subtitle
				// ];
				// dd(json_encode($data));

			}
		}

		// return $request->all();


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
