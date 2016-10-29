<?php namespace App\Http\Controllers;

use Requests;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\Room;
use App\Facilities;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use DateTime;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller {


	public function getAdd()
	{
		$listfac = Facilities::lists('name','id');
		$listhotel = Hotel::select('name','id')->get();
		return view('admin.room.add',compact('listhotel','listfac'));
	}

	public function postAdd(RoomRequest $request)
	{

		$time = new DateTime();
		$room = new Room;
		$listfac = "";
		if($request->listfac !=null){
			foreach($request->listfac as $val){
				$listfac.=','.$val;
			}
		}
		$room->facilities = $listfac;
		$room->name = $request->txtName;
		$room->hotel_id = $request->txtHotelid;
		$room->quality = $request->txtQuality;
		$room->status = $request->txtStatus;
		$room->price = $request->txtPrice;
		$room->created_by = 'admin';
		$nameimg = $time->getTimestamp().$request->file('imgroom')->getClientOriginalName();
		$validname = str_replace(array(' ','_','(',')','-'),'',$nameimg);
		if(!file_exists('resources/upload/imageroom')){
			mkdir('resources/upload/imageroom',0777,true);
		}
		$request->file('imgroom')->move('resources/upload/imageroom',$validname);
		if(!file_exists('resources/upload/imageroom/thumb')){
			mkdir('resources/upload/imageroom/thumb',0777,true);
		}
		$thumb = Image::make('resources/upload/imageroom/'.$validname)->resize(120,100)->save('resources/upload/imageroom/thumb/thumb'.$validname);
		$room->images = $validname;
		$room->save();
		return redirect()->route('admin.room.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtName Added Successful"]);

	}
	public function getList()
	{
		$listhotel = Hotel::select('id','name')->get();
		$listroom = Room::all();
		return View('admin.room.list',compact('listroom','listhotel'));
	}
	public function getEdit($id)
	{
		$listfac = Facilities::lists('name','id');
		$room = Room::findOrFail($id);
		$listhotel = Hotel::all();
		return View('admin.room.edit',compact('listhotel','room','listfac'));
	}
	public function postEdit(RoomRequest $request,$id)
	{
		$room = Room::findOrFail($id);
		$listfac = "";
		if($request->listfac !=null){
			foreach($request->listfac as $val){
				$listfac.=','.$val;
			}
		}
		$room->facilities = $listfac;
		$room->name = $request->txtName;
		$room->hotel_id = $request->txtHotelid;
		$room->quality = $request->txtQuality;
		$room->status = $request->txtStatus;
		$room->price = $request->txtPrice;
		if($request->file('imgroom') !=""){
			File::Delete('resources/upload/imageroom/'.$room->images);
			File::Delete('resources/upload/imageroom/thumb/thumb'.$room->images);
			$time = new DateTime();
			$nameimg = $time->getTimestamp().$request->file('imgroom')->getClientOriginalName();
			$nameimg = str_replace(array(' ','_','(',')','-'),'',$nameimg);
			$request->file('imgroom')->move('resources/upload/imageroom/',$nameimg);
			Image::make('resources/upload/imageroom/'.$nameimg)->resize(120,100)->save('resources/upload/imageroom/thumb/thumb'.$nameimg);
			$room->images = $nameimg;
		}
		$room->save();
		return redirect()->route('admin.room.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtName Edited Successful"]);
	}
	public function getDelete($id)
	{
		$room = Room::findOrFail($id);
		File::delete('resources/upload/imageroom/'.$room->images);
		File::delete('resources/upload/imageroom/thumb/thumb'.$room->images);
		$room->delete($id);
		return redirect()->route('admin.room.getlist')->with(['flash_level'=>'success','flash_msg'=>" Deleted Successful"]);

	}

	public function getcalendar()
	{
		if(Request::isMethod('post'))
		{
			$Input = 	Input::all();
			$calendars = Room::findOrFail($Input['dopbcp_calendar_id']);

			echo $calendars->calendar;
		}

	}
	public function savecalendar()
	{
		if(Request::isMethod('post'))
		{
			$Input = 	Input::all();
			$room = Room::findOrFail($Input['dopbcp_calendar_id']);
			$room->calendar =$Input['dopbcp_schedule'];
			$room->save();
		}

	}

}
