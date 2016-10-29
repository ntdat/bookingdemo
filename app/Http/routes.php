<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('auth/login',['as'=>'auth.getlogin', 'middleware'=>'Logined','uses'=>'Auth\AuthController@getlogin']);
Route::post('auth/login',['as'=>'auth.postlogin','uses'=>'Auth\AuthController@postlogin']);
Route::get('auth/logout',['as'=>'auth.getlogout','uses'=>'Auth\AuthController@getlogout']);

Route::group(['prefix'=>'admin','middleware'=>'CheckLogin'],function(){
	Route::group(['prefix'=>'cate'],function(){
		route::get('add',['as'=>'admin.cate.getadd','uses'=>'CateController@getAdd']);
		route::post('add',['as'=>'admin.cate.postadd','uses'=>'CateController@postAdd']);
		route::get('list',['as'=>'admin.cate.getlist','uses'=>'CateController@getList']);
		route::get('delete/{id}',['as'=>'admin.cate.delete','uses'=>'CateController@getDelete']);
		route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);

	});
	Route::group(['prefix'=>'tour'],function(){
		route::get('add',['as'=>'admin.tour.getadd','uses'=>'TourController@getAdd']);
		route::post('add',['as'=>'admin.tour.postadd','uses'=>'TourController@postAdd']);
		route::get('list',['as'=>'admin.tour.getlist','uses'=>'TourController@getList']);
		route::get('delete/{id}',['as'=>'admin.tour.getdelete','uses'=>'TourController@getDelete']);
		route::get('edit/{id}',['as'=>'admin.tour.getedit','uses'=>'TourController@getEdit']);
		route::patch('edit/{id}',['as'=>'admin.tour.postedit','uses'=>'TourController@postEdit']);
		route::get('getDelimg',['as'=>'admin.tour.getdelimg','uses'=>'TourController@getDelimg']);
		route::get('getCarById/{id}',['as'=>'admin.tour.getcarbyid','uses'=>'TourController@listCarById']);
	});
	Route::group(['prefix'=>'hotel','middleware'=>'CheckAccess'],function(){
		route::get('add',['as'=>'admin.hotel.getadd','uses'=>'HotelController@getAdd']);
		route::post('add',['as'=>'admin.hotel.postadd','uses'=>'HotelController@postAdd']);
		route::get('list',['as'=>'admin.hotel.getlist','uses'=>'HotelController@getList']);
		route::get('delete/{id}',['as'=>'admin.hotel.getdelete','uses'=>'HotelController@getDelete']);
		route::get('edit/{id}',['as'=>'admin.hotel.getedit','uses'=>'HotelController@getEdit']);
		route::get('getRoomById/{id}',['as'=>'admin.hotel.getroom','uses'=>'HotelController@getRoombyId']);
		route::patch('edit/{id}',['as'=>'admin.hotel.postedit','uses'=>'HotelController@postEdit']);
		route::get('getDelimg',['as'=>'admin.hotel.getdelimg','uses'=>'HotelController@getDelimg']);

	});
	Route::group(['prefix'=>'fac'],function(){
		route::get('add',['as'=>'admin.fac.getadd','uses'=>'FacilitiesController@getAdd']);
		route::post('add',['as'=>'admin.fac.postadd','uses'=>'FacilitiesController@postAdd']);
		route::post('getdata',['as'=>'admin.fac.getdata','uses'=>'FacilitiesController@getData']);
		route::get('list',['as'=>'admin.fac.getlist','uses'=>'FacilitiesController@getList']);
		route::get('delete/{id}',['as'=>'admin.fac.getdelete','uses'=>'FacilitiesController@getDelete']);
		route::get('edit/{id}',['as'=>'admin.fac.getedit','uses'=>'FacilitiesController@getEdit']);
		route::patch('edit/{id}',['as'=>'admin.fac.postedit','uses'=>'FacilitiesController@postEdit']);
	});
	Route::group(['prefix'=>'destination'],function(){
		route::get('add',['as'=>'admin.destination.getadd','uses'=>'DestinationsController@getAdd']);
		route::get('list',['as'=>'admin.destination.getlist','uses'=>'DestinationsController@getList']);
		route::post('add',['as'=>'admin.destination.postadd','uses'=>'DestinationsController@postAdd']);
		route::post('delete',['as'=>'admin.destination.postDelete','uses'=>'DestinationsController@postDelete']);
		route::get('edit/{id}',['as'=>'admin.destination.getedit','uses'=>'DestinationsController@getEdit']);
		route::patch('edit/{id}',['as'=>'admin.destination.postedit','uses'=>'DestinationsController@postEdit']);
		/*route::post('add',['as'=>'admin.destination.postadd','uses'=>'DestinationsController@postAdd']);
		route::post('getdata',['as'=>'admin.destination.getdata','uses'=>'DestinationsController@getData']);
		route::get('list',['as'=>'admin.destination.getlist','uses'=>'DestinationsController@getList']);
		route::patch('edit/{id}',['as'=>'admin.destination.postedit','uses'=>'DestinationsController@postEdit']);*/
	});
	Route::group(['prefix'=>'room'],function(){
		route::get('add',['as'=>'admin.room.getadd','uses'=>'RoomController@getAdd']);
		route::post('add',['as'=>'admin.room.postadd','uses'=>'RoomController@postAdd']);
		route::get('list',['as'=>'admin.room.getlist','uses'=>'RoomController@getList']);
		route::get('edit/{id}',['as'=>'admin.room.getedit','uses'=>'RoomController@getEdit']);
		route::patch('edit/{id}',['as'=>'admin.room.postedit','uses'=>'RoomController@postEdit']);
		route::get('delete/{id}',['as'=>'admin.room.getdelete','uses'=>'RoomController@getDelete']);

	});
	Route::group(['prefix'=>'car'],function(){
		route::get('add',['as'=>'admin.car.getadd','uses'=>'CarController@getAdd']);
		route::post('add',['as'=>'admin.car.postadd','uses'=>'CarController@postAdd']);
		route::get('list',['as'=>'admin.car.getlist','uses'=>'CarController@getList']);
		route::get('edit/{id}',['as'=>'admin.car.getedit','uses'=>'CarController@getEdit']);
		route::patch('edit/{id}',['as'=>'admin.car.postedit','uses'=>'CarController@postEdit']);
		route::get('delete/{id}',['as'=>'admin.car.getdelete','uses'=>'CarController@getDelete']);
	});
	Route::group(['prefix'=>'user','middleware'=>'CheckAccess'],function(){
		route::post('add',['as'=>'admin.user.postadd','uses'=>'UserController@postAdd']);
		route::get('list',['as'=>'admin.user.getlist','uses'=>'UserController@getList']);
		route::post('getedit',['as'=>'admin.user.getedit','uses'=>'UserController@getedit']);
		route::post('postedit',['as'=>'admin.user.postedit','uses'=>'UserController@postedit']);
		route::post('delete',['as'=>'admin.user.postdelete','uses'=>'UserController@postDelete']);
	});

});

	Route::group(['prefix'=>'template'],function(){
		route::get('index',['as'=>'template.index','uses'=>'HomeController@index']);
		route::get('hotel/{id}',['as'=>'template.detailHotel','uses'=>'HomeController@detailHotel']);
		route::post('addCart/{id}',['as'=>'template.hotelcart','uses'=>'HomeController@addCart']);
		route::get('CheckOutStep1',['as'=>'template.checkoutstep1','uses'=>'HomeController@checkoutstep1']);
		route::get('Cart',['as'=>'template.cart','uses'=>'HomeController@getCart']);
		route::post('editcart',['as'=>'template.editcart','uses'=>'HomeController@editcart']);
		route::get('Car/{id}',['as'=>"template.detailCar","uses"=>"HomeController@detailCar"]);
		route::post('deletecart',['as'=>'template.deletecart','uses'=>'HomeController@postdelete']);
		route::get('tour/{id}',['as'=>'template.tour','uses'=>'HomeController@getTour']);
		route::post('mainsearch',['as'=>'template.mainsearch','uses'=>'HomeController@getresult']);
		route::post('getcalendar',['as'=>'admin.room.getcalendar','uses'=>'RoomController@getcalendar']);
		route::post('savecalendar',['as'=>'admin.room.savecalendar','uses'=>'RoomController@savecalendar']);
	});