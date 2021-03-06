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
      Route::get('about-section','SettingController@addAbout')->name('admin.about');
      Route::get('tab-section','SettingController@addTab')->name('admin.tab');
      Route::get('speaker-section','SettingController@speakerSection')->name('admin.speaker-section');
      Route::get('schedule-section','SettingController@scheduleSection')->name('admin.schedule-section');
      Route::get('ticket-section','SettingController@ticketSection')->name('admin.ticket-section');
      Route::get('buy-ticket-section','SettingController@buyTicketSection')->name('admin.buy-ticket');
      Route::get('event-section','SettingController@eventSection')->name('admin.event-section');
      Route::get('blog-section','SettingController@blogSection')->name('admin.blog-section');
      Route::get('sponsor-section','SettingController@sponsorSection')->name('admin.sponsor-section');


      Route::post('button-section','SettingController@addButton')->name('admin.addtabbutton');
      Route::post('tab-update','SettingController@tabUpdate')->name('admin.updatetabbutton');
      Route::get('tab-update/{id}','SettingController@tabDelete')->name('admin.deletetabbutton');
      Route::put('update-section','SettingController@sectionUpdate')->name('admin.updatesection');
      Route::get('overview-section','SettingController@overview')->name('admin.overview');
      Route::post('overview-section','SettingController@overviewSaveToDatabase');
      Route::post('update-overview-section','SettingController@updateOverview')->name('admin.update-overview');
      Route::get('delete-over-view-section/{id}','SettingController@deleteOverview')->name('admin.delete-overview');

      Route::post('add-content','AdminController@addContentFormToDatabse');
      Route::get('view-content','AdminController@viewAllContent')->name('admin.viewallcontent');


      Route::get('add-speaker','AdminController@addSpeaker')->name('admin.speaker');
      Route::post('add-speaker','AdminController@speakerSaveToDatabase');

      Route::get('speaker-list','AdminController@viewSpeaker')->name('admin.speakerlist');
      Route::post('speaker-list','AdminController@updateSpeaker');
      Route::get('delete-speaker/{id}',"AdminController@deleteSpeaker")->name('admin.speakerdelete');

      Route::get('add-ticket','AdminController@addTickets')->name('admin.tickets');
      Route::post('add-ticket','AdminController@addTicketsToDatabase');
      Route::get('view-ticket','AdminController@viewTickets')->name('admin.viewtickets');
      Route::get('view-ticket/{ticket}','AdminController@editTicket')->name('admin.edittickets');
      Route::post('view-ticket/{ticket}',"AdminController@ticketUpdate");
      Route::get('delete-ticket/{ticket}',"AdminController@deleteTicket")->name('admin.deleteticket');

      Route::get('view-all-bookings','AdminController@viewAllBookings')->name('admin.viewallbookings');

      Route::get('add-blog','AdminController@addBlogDetails')->name('admin.blog');
      Route::post('add-blog','AdminController@addBlogDetailsToDatabase');
      Route::get('view-all','AdminController@viewAllBlog')->name('admin.viewallblog');
      Route::get('view-all/{id}','AdminController@deleteBlog')->name('admin.deleteblog');
      Route::post('view-all','AdminController@editBlog');


      Route::get('add-conference','AdminController@addconferenceTopic')->name('admin.conference');
      Route::post('add-conference','AdminController@addconferenceTopicToDatabase');
      Route::get('show-all-conference','AdminController@viewAllTopic')->name('admin.showallconference');
      Route::post('show-all-conference','AdminController@updateTopic');
      Route::get('add-topics-speaker','AdminController@addTopicsToSpeaker')->name('admin.topicsaddtospeaker');
      Route::get('topic-delete/{id}',"AdminController@deleteTopic")->name('admin.topic-delete');
      Route::get('add-sponsor','AdminController@addSponsor')->name('admin.sponsor');
      Route::post('add-sponsor','AdminController@sponsorAddToDatabase');

      Route::get('sponsor-type','AdminController@sponsorTypeView')->name('admin.sponsortype');
      Route::post('sponsor-type','AdminController@sponsorTypeSave');

      Route::get('add-managesponsor','AdminController@manageSponsor')->name('admin.managersponsor');
      Route::get('change-sponsor/{id}',"AdminController@updateSponsorApplication")->name('admin.sponsorstatus');
     
      Route::get('manage-sponsor-data','AdminController@manageAllData')->name('admin.managersponsordata');

      

  

      Route::get('delete-manage-sponsor-data/{id}','AdminController@deleteSponsorData')->name('admin.sponsor-details-delete');
      Route::get('delete-sponsor-type-data/{id}','AdminController@deleteSponsorTypeData')->name('admin.sponsor-type-delete');

      Route::get('setting','AdminController@settingView')->name('admin.setting');
      Route::post('setting','AdminController@settingStoreToDatabase');


      Route::get('logo-icon','SettingController@logoIcon')->name('admin.logo-icon');
      Route::post('logo-icon','SettingController@logoIconSaveToDatabase');
      Route::post('app-name','SettingController@logoIcon')->name('admin.appname');
      Route::post('event','SettingController@logoIcon')->name('admin.event');
});



// for user Route

Route::get('/','UserController@index')->name('home');
Route::get('show/{id}','UserController@show')->name('show');
Route::post('show/{id}','UserController@buyTickets');
Route::get('sponsor','UserController@sponsor')->name('sponsor');
Route::post('sponsor','UserController@sponsorApplication');
Route::get('pricing-plan','UserController@pricingPlan')->name('plan');
Route::get('blogdetails/{id}','UserController@blogDetails')->name('blogdetails');
Route::get('invoice','UserController@invoice')->name('invoice');

Route::get('checkout',"UserController@checkout")->name('checkout');


