<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function json()
    {
        $a =  file_get_contents(resource_path('json\section.json'));

        $data = json_decode($a,true);

        dd($data['banner']['title']);

        return view('welcome',compact('data'));
        
    }


    public function update()
    {
        $new = [];
        $a =  file_get_contents(resource_path('json\section.json'));
        $data = json_decode($a,true);

        $input = 'lorem ipsum sdjsksjd k sdjdjskj   kjdsj jj kjsk jjj skdjs uiwew ndjkh ';

        $new['banner'] = $input;

        $dk = array_merge($data,$new);

        file_put_contents(resource_path('json\section.js'),$dk);




    }


    
}
