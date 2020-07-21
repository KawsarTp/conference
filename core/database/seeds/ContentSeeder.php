<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Content::create([
            "section_name"=>"banner",
            "content" => [
                        "title"=>'lorem ipsum lorem amet',
                        'subtitle'=>'lorem ipsum lorem amet'
                        ]
        ]);



        Content::create([
                "section_name" => "about",
                'content'=>[
                        "title"=>'Join With Us For Next Conferance 2019',
                        'subtitle'=>'Hymenaeos nulla dui ultrices sodales. Sed dolorturpis turpiitlandit donec curabitur amet nascetur.',
                        'paraone'=>'Consequat, quis ac turpis, mi a ligula scelerisque eleifend arcuttis feugiat pede vivamus id ac, vitae volutpat viverra, pttitor velppede est auctor velit. Nullam nonummy Fusce neque pharetra elemtum ante praesent et, non non nulla enim, velit amet sit convallis si',
                        'paraptwo'=>'Portgilla. Maecenas auctor convallis dolor, eros consectetuer nulla eget vitae, nec porttitor viverra eu quis quisque',
                ]
            
        ]);


        Content::create([
            "section_name" => "tab",
            "content" => [
                        "title"=>'Well Come To Conference 2019',
                        'tabs'=>[
                            [
                                'title'=>"Our Vission",
                                "details"=>"Consequat, quis ac turpis, mi a ligula scelerisque eleifend arcu. Arctugiat pede vivamus id ac, vitae volutpat viverra, porttitor velit parturient, pede est auctor velit. Nullam nonummy Quam lorem magna, lectus pede sit felis ab nulla wisi, fusce eget lorem. Porro etiam sed lacus eu, donec mus ipsum eu ligula eget, nullacipit duis, accumsan ut lorem semvtulum suspendisse tempor est nulla, ac tincidunt ligula magna enim et, eros",
                            ],


                            [
                                'title'=>"Our Mission",
                                'subtitle'=>"Consequat, quis ac turpis, mi a ligula scelerque eleifend arcu. Arctugiat pede vivamus",
                                "details"=>"Lorem ipsum dolor sit amet, varius class massa velit amet cras, felis a donec at. Justo nonummy hymenaeos sed ipsum, urna ornare odio amet sit et. Penatibus ante eu bibendum quisque. Ut sit aenean elementum tincidunt cras, dictum nunc aliquet lacus lorem. Lorem ridiculus nunc ligula perleifend et quam, dictumst pellentesque rhoncus et, hendrerit non accumsan fringilla mauris, metus reiciendis amet vitae sed consectetuer vitae.",
                            ],


                            [
                                'title'=>"Testimonial",
                                "quotes"=>[
                                    [
                                        'title'=>"lorem ipsum",
                                        'name'=>"martin hook",
                                        'designation'=>'businessman'
                                    ],

                                    [
                                        'title'=>"lorem ipsum",
                                        'name'=>"martin hook",
                                        'designation'=>'businessman'
                                    ],

                                    [
                                        'title'=>"lorem ipsum",
                                        'name'=>"martin hook",
                                        'designation'=>'businessman'
                                    ],
                                    
                                ]
                            ],

                        ],

            ]
        ]);



        Content::create([
            "section_name" => "overview",
            "content" => [
                        "title"=>'Join With Us For Next Conferance 2019',
                        'subtitle'=>'Hymenaeos nulla dui ultrices sodales. Sed dolorturpis turpiitlandit donec curabitur amet nascetur.',
                        'paraone'=>'Consequat, quis ac turpis, mi a ligula scelerisque eleifend arcuttis feugiat pede vivamus id ac, vitae volutpat viverra, pttitor velppede est auctor velit. Nullam nonummy Fusce neque pharetra elemtum ante praesent et, non non nulla enim, velit amet sit convallis si',
                        'paraptwo'=>'Portgilla. Maecenas auctor convallis dolor, eros consectetuer nulla eget vitae, nec porttitor viverra eu quis quisque',
                
            ]
        ]);



        Content::create([
            "section_name" => "speaker",
            "content" => [
                
                        "title"=>'Event Speakers',
                        'subtitle'=>'A porttitor metus cupidatat nunc, luctus erat at. Amet class phasellus in eget sociosqu mi amet morbi taciti eu urna, mi nunc volutpat quis',

            ]
        ]);


        Content::create([
            "section_name" => "schedule",
            "content" => [

                        "title"=>'what is going on',
                        'subtitle'=>'a porttitor metus cupidatat nunc, luctus erat at. Amet class phasellus in eget sociosqu mi amet morbi
                        taciti eu urna, mi nunc volutpat quis',

            ]
        ]);



        Content::create([
            "section_name" => "ticket",
            "content" => [
               
                        "titleone"=>'Hurry Up',
                        "titletwo"=>'contact with us for your ticket',
                
            ]
        ]);



        Content::create([
            "section_name" => "buyticket",
            "content" => [
                
                        "title"=>'Get Your Ticket',
                        "para"=>'A porttitor metus cupidatat nunc, luctus erat at. Amet class phasellus in eget sociosqu mi amet morbi taciti eu urna, mi nunc volutpat quis',
                
            ]
        ]);



        Content::create([
            "section_name" => "map",
            "content" => [
              
                        "title"=>'join our event',
                        "para"=>'Magna eget et velit sed, cras neque amet aeante quis mauris mollis elit, fringilla et suscipitet.',
                
            ]
        ]);


        Content::create([
            "section_name" => "blog",
            "content" => [
                
                        "title"=>'Our News Update',
                        "para"=>'A porttitor metus cupidatat nunc, luctus erat at. Amet class phasellus in eget sociosqu mi amet morbi taciti eu urna, mi nunc volutpat quis',
                
            ]
        ]);


        Content::create([
            "section_name" => "sponsor",
            "content" => [
                
                        "title"=>'Official Sponsor',
                        "para"=>'A porttitor metus cupidatat nunc, luctus erat at. Amet class phasellus in eget sociosqu mi amet morbi taciti eu urna, mi nunc volutpat quis',
                
            ]
        ]);





    }
}
