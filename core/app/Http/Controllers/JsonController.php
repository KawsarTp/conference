<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function json()
    {
        $a =  file_get_contents(resource_path('json\section.json'));

        $data = json_decode($a,true);

        dd($data);

        return view('welcome',compact('data'));
        
    }

    public function create(){
        $key = 'banner';
         $a =  file_get_contents(resource_path('json\section.js'));
         $data = json_decode($a,true);
         
         $data2 = [
            "$key"=>[
                "title"     =>"ami",
                "subtitle"  =>"tmi",
                'image' => "",
                ]
        ];
         $p = array_merge($data,$data2);
        
        $encode = json_encode($p);
        file_put_contents(resource_path('json\section.js'),$encode);
         
    } 


    public function update()
    {
        $new = [];
        $a =  file_get_contents(resource_path('json\section.js'));
        $data = json_decode($a,true);
        $input = 'about';
            foreach ($data as $key=>$value) {
                if(array_key_exists( $input, $data)){
                    $data[ $input]['title'] = $input;
                    $data[ $input]['subtitle'] = "updated";
                 }
            }
        file_put_contents(resource_path('json\section.js'),json_encode($data));
    }

    public function delete(){

        $delItem = "about";
        $arr_index = [];
        $a =  file_get_contents(resource_path('json\section.js'));
        $data = json_decode($a,true);
        if(array_key_exists($delItem, $data)){
            unset($data[$delItem]);
        }

        file_put_contents(resource_path('json\section.js'),json_encode($data));



    }

    
        
        
        
    }

    
}
