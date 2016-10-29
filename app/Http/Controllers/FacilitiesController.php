<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacilitiesRequest;
use App\Room;
use App\Facilities;
use Request;
use Input;
use DateTime;
use File;
use Intervention\Image\Facades\Image;
use App\Hotel;
class FacilitiesController extends Controller {

	//get index of facilities
	public function getAdd()
	{
		$listhotel = Hotel::Select('name','id')->get()->toArray();
		return view('admin.facilities.add',compact('listhotel'));
	}
	// add new facilities
	public function postAdd(FacilitiesRequest $request)
	{
		$fac = New Facilities;
		$time = new DateTime();
		$fac->name = $request->txtTitle;
		$fac->icon = $request->txtIcon;
		$fac->position = $request->txtPosition;
		$fac->status = $request->txtStatus;
		if($request->file('imgfac') !=null ){
			$nameimg = $time->getTimestamp().$request->file('imgfac')->getClientOriginalName();
			$validname = str_replace(array(' ','_','(',')','-'),'',$nameimg);

			if(!file_exists('resources/upload/thumbfac')){// check dir and create if not exists
				mkdir('resources/upload/thumbfac',0777,true);
			}
			//make thumb
			$request->file('imgfac')->move('resources/upload/thumbfac/',$validname);
			Image::make('resources/upload/thumbfac/'.$validname)->resize(50,50)->save();
			//File::Delete('resources/upload/thumbfac/',$validname);// delete file source because not use
		}else{
			$validname="";
		}
		$fac->images = $validname;
		$fac->save();
		return redirect()->route('admin.fac.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtTitle Added Successful !!!!"]);
	}
	//	get data sent via ajax to get list hotel or room or rent ... Show at mutiple selectbox
	public function getData()
	{
		$data = Input::all();
		if (Request::ajax())
		{
			if($data['val'] ==2){
				$data = Room::select('name','id')->get()->toArray();
				return $data;
			}
			if($data['val'] ==1){
				$data = Hotel::select('name','id')->get()->toArray();
				return $data;
			}
		}
	}
	//show list facilities
	public function getList()
	{
		$listfac = Facilities::all();
		return view('admin.facilities.list',compact('listfac'));

	}

	public function getDelete($id)
	{
		$fac = Facilities::findOrFail($id);
		if($fac->images !=""){
			File::delete("resources/upload/thumbfac/$fac->images");
		}
		$fac->delete($id);
		return redirect()->route('admin.fac.getlist')->with(['flash_level'=>'success','flash_msg'=>"Deleted Successfuly !!!"]);
	}

	public function getEdit($id)
	{
		$fac = Facilities::findOrFail($id);
		if(substr($fac->usefor,0,1) == 1){
			$listdata = Hotel::all();
		}elseif(substr($fac->usefor,0,1) == 2){
			$listdata = Room::all();
		}

		return view('admin.facilities.edit',compact('fac','listdata'));
	}
	public function postEdit(FacilitiesRequest $request,$id)
	{
		$fac = Facilities::findOrFail($id);
		$fac->name = $request->txtTitle;
		$fac->icon = $request->txtIcon;
		$fac->position = $request->txtPosition;
		$fac->status = $request->txtStatus;
		if($request->file('imgfac')){
			File::Delete("resources/upload/thumbfac/$fac->images");
			$time = new DateTime();
			$imgname = $time->getTimestamp().$request->file('imgfac')->getClientOriginalName();
			$imgname = str_replace(array(' ','_','(',')','-'),'',$imgname);
			$request->File('imgfac')->move("resources/upload/thumbfac/",$imgname);
			Image::make("resources/upload/thumbfac/".$imgname)->resize(50,50)->save();
			$fac->images = $imgname;
		}
		$fac->save();
		return redirect()->route('admin.fac.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtTitle Edited Successful"]);
	}
}
