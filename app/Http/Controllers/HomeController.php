<?php namespace App\Http\Controllers;

use App\Destination;
use App\Hotel,App\Car,App\Tour,App\Room,App\Facilities;
use Cart;
use Request;
use Sentinel;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller {

	public function index()
	{

		$hotel 	= Hotel::where('showatindex','=',1)->take(4)->orderBy('updated_at','desc')->get();
		$car 	= Car::where('showatindex','=',1)->take(4)->orderBy('updated_at','desc')->get();
		$tour 	= Tour::where('showatindex','=',1)->take(4)->orderBy('updated_at','desc')->get();
		$offer 	= Destination::where('showatindex','=',1)->take(4)->orderBy('updated_at','desc')->get();
		return view('template.page.index',compact('hotel','car','tour','offer'));
	}
	public function detailHotel($id)
	{
		$hotel = Hotel::findOrFail($id);
		$listrooms = Room::where('hotel_id',$id)->get();
		// get room facilities
		$roomfacids=array();
		foreach($listrooms as $listroom){
			$roomfacids[$listroom->id]= explode(',',$listroom->facilities);
		}

		$roomfac = array();
		$roomsfac = array();
		foreach($roomfacids as $key =>$roomfacid)
		{
			foreach($roomfacid as $id)
			{
				$roomfac[] = Facilities::select('name','images','icon')->where('id',$id)->get();
			}

			$roomsfac[$key] =$roomfac ;
			$roomfac = [];

		}
		//get hotel facilities
		$hotelfac = array();
		$hotelfacids= explode(',',$hotel->facilities);
		foreach($hotelfacids as $hotelfacid)
		{
			$hotelfac[] = Facilities::select('name','images','icon')->where('id',$hotelfacid)->get();
		}

		return view('template.page.detailHotel',compact('hotel','listrooms','roomsfac','hotelfac'));

	}

	// add cart
	public function addCart($id)
	{
		$url = $_POST['page_url'];
		$data = $_POST['reservation_data'];
		foreach ($data as $book);
		if(strpos($url,"template/Cart") !==false){

			$rowid = $_GET['rowid'];
			$cart = Cart::get($rowid);
			if($cart->options['type'] == "bookhotel")
			{
				Cart::update(($rowid),array(
					'qty'		=>1,
					'options'=>array(
						'price'		=>$book['price_total'],
						'checkin'	=>$book['check_in'],
						'checkout'	=>$book['check_out'	],
					)
				));
			}else
			{
				Cart::update(($rowid),array(
					'qty'		=>1,
					'price'		=>$book['price_total'],
					'options'=>array(
						'checkin'	=>$book['check_in'],
						'checkout'	=>$book['check_out'	],
					)
				));
			}

		}elseif(strpos($url,"template/Car/") !==false){
			$car = Car::find($id);
			Cart::add(array(
				'id'		=>$id,
				'name'		=>$car->name,
				'qty'		=>1,
				'price'		=>$book['price_total'],
				'options'=>array(
					'type' 		=>"bookcar",
					'detail'	=>$book['days_history'],
					'checkin'	=>$book['check_in'],
					'checkout'	=>$book['check_out'	],
				)
			));

		}
		else
		{
			$idhotel = $_POST['hotel_id'];
			$hotel_name = $_POST['hotel_name'];
			$hotel_star = $_POST['hotel_star'];
			$hotel_location = $_POST['hotel_location'];
			$room = Room::find($id);
			Cart::add(array(
				'id'		=>$idhotel,
				'name'		=>$hotel_name.",".$hotel_location,
				'qty'		=>1,
				'price'		=>$hotel_star,
				'options'=>array(
					'type' 		=>"bookhotel",
					'roomid'		=>$id,
					'roomname'		=>$room->name,
					'price'		=>$book['price_total'],
					'detail'	=>$book['days_history'],
					'checkin'	=>$book['check_in'],
					'checkout'	=>$book['check_out'	],
					'person'	=>$room->maxperson,
				)
			));
		}

	}
	public function editcart(){
		if(Request::ajax())
		{
			$input = Input::all();
			$cart = Cart::get($input['rowid']);

			if($input['booktype'] == "bookhotel")
			{
				$newprice = round(($cart->options['price']/$cart->qty)*$input['newvl'],2);
				Cart::update(($input['rowid']),array(
					'qty'		=>$input['newvl'],
					'options'=>array(
						'price'		=>$newprice,
					)
				));
			}else
			{
				$newprice = round(($cart->price/$cart->qty)*$input['newvl'],2);
				Cart::update(($input['rowid']),array(
					'qty'		=>$input['newvl'],
					'price'		=>$newprice,

				));
			}



			echo json_encode("done!");
		}
	}
	public function checkoutstep1()
	{
		$carts = Cart::content();

		return 	view('template.page.checkoutstep1',compact('carts'));
	}
	public function getCart()
	{
		$carts = Cart::content();
		return view('template.page.Cart',compact('carts'));
	}
	public function detailCar($id)
	{
		$car = Car::FindorFail($id);
		return view('template.page.Car',compact('car'));
	}
	public function postdelete()
	{
		if(Request::ajax())
		{
			$input = Input::all();
			Cart::remove($input['rowid']);
		}
	}
	public function getTour($id)
	{
		$tour = Tour::FindorFail($id);
		$cars = Car::where('tour_id',$id)->get();
		$hotels = Hotel::where('tour_id',$id)->get();
		return view('template.page.detailTour',compact('tour','cars','hotels'));
	}
	public function getresult()
	{

			$form =   Request::input('radio');
			switch($form)
			{
				case null:
					$tourid=Request::input('where1');
					$link="imagehotel";
					$result = Hotel::where('tour_id','=',$tourid)->get();
					return view('template.page.Mainsearch',compact('result','link'));
					break;
				case'form2':
					$tourid=Request::input('where2');
					$link="imagetour";
					$result = Tour::where('id','=',$tourid)->get();
					return view('template.page.Mainsearch',compact('result','link'));
					break;
				case'form3':
					$tourid=Request::input('where2');
					$link="imagecar";
					$result = Car::where('id','=',$tourid)->get();
					return view('template.page.Mainsearch',compact('result','link'));
					break;
				case'form6':
					break;
			}

	}
}
