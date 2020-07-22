<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:admin','prefix'=>'admin'], function () {
      Route::get('login','LoginRegisterController@loginPage')->name('admin.login');  
      Route::post('login','LoginRegisterController@login');  
});


Route::group(['prefix' => 'admin','middleware'=>'auth:admin'], function () {
      Route::get('logout',"LoginRegisterController@logout")->name('admin.logout');
      Route::get('home','AdminController@index')->name('admin.home');



      // Site Content Route
      Route::get('add-banner','SettingController@addBanner')->name('admin.banner');
      Route::post('add-banner','SettingController@bannerUpdate');

      Route::get('about-section','SettingController@addAbout')->name('admin.about');
      Route::post('about-section','SettingController@aboutSectionUpdate');


      Route::get('tab-section','SettingController@addTab')->name('admin.tab');
      Route::post('tab-section','SettingController@aboutSectionUpdate');
      Route::post('tab-update','SettingController@tabUpdate')->name('admin.tab-edit');

      Route::post('add-content','AdminController@addContentFormToDatabse');
      Route::get('view-content','AdminController@viewAllContent')->name('admin.viewallcontent');



      Route::get('add-speaker','AdminController@addSpeaker')->name('admin.speaker');
      Route::post('add-speaker','AdminController@speakerSaveToDatabase');

      Route::get('speaker-list','AdminController@viewSpeaker')->name('admin.speakerlist');
      Route::post('speaker-list','AdminController@updateSpeaker');

      Route::get('add-ticket','AdminController@addTickets')->name('admin.tickets');
      Route::post('add-ticket','AdminController@addTicketsToDatabase');
      Route::get('view-ticket','AdminController@viewTickets')->name('admin.viewtickets');
      Route::post('view-ticket',"AdminController@ticketUpdate");

      Route::get('view-all-bookings','AdminController@viewAllBookings')->name('admin.viewallbookings');

      Route::get('add-blog','AdminController@addBlogDetails')->name('admin.blog');
      Route::post('add-blog','AdminController@addBlogDetailsToDatabase');
      Route::get('view-all','AdminController@viewAllBlog')->name('admin.viewallblog');
      Route::post('view-all','AdminController@editBlog');


      Route::get('add-conference','AdminController@addconferenceTopic')->name('admin.conference');
      Route::post('add-conference','AdminController@addconferenceTopicToDatabase');
      Route::get('show-all-conference','AdminController@viewAllTopic')->name('admin.showallconference');
      Route::get('add-topics-speaker','AdminController@addTopicsToSpeaker')->name('admin.topicsaddtospeaker');

      Route::get('add-sponsor','AdminController@addSponsor')->name('admin.sponsor');
      Route::post('add-sponsor','AdminController@sponsorAddToDatabase');

      Route::get('sponsor-type','AdminController@sponsorTypeView')->name('admin.sponsortype');
      Route::post('sponsor-type','AdminController@sponsorTypeSave');

      Route::get('add-managesponsor','AdminController@manageSponsor')->name('admin.managersponsor');
      Route::post('add-managesponsor','AdminController@updateSponsorApplication');

      Route::get('setting','AdminController@settingView')->name('admin.setting');
      Route::post('setting','AdminController@settingStoreToDatabase');
});



// for user Route

Route::get('/','UserController@index')->name('home');
Route::get('show/{id}','UserController@show')->name('show');
Route::post('show/{id}','UserController@buyTickets');
Route::get('sponsor','UserController@sponsor')->name('sponsor');
Route::post('sponsor','UserController@sponsorApplication');

Route::get('/json','JsonController@json');
Route::get('/update','JsonController@update');