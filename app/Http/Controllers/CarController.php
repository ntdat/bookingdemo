<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Car;
use App\Facilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Tour;
use DateTime;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CarRequest;
class CarController extends Controller {

	public function getAdd()
	{
		$listfac = Facilities::lists('name','id');
		$tour = Tour::lists('name','id');
		return view('admin.car.add',compact('tour','listfac'));
	}
	public function postAdd(CarRequest $request){
		$car =  new Car;
		$listfac = "";
		if($request->listfac !=null){
			foreach($request->listfac as $val){
				$listfac.=','.$val;
			}
		}
		$car->facilities = $listfac;
		$car->name = $request->txtName;
		$car->quality = $request->txtQuality;
		$car->des = $request->txtDes;
		$car->price = $request->txtPrice;
		$car->status = $request->txtStatus;
		$car->showatindex = $request->txtTop;
 
		$car->tour_id = $request->txtTour;
		$array= array();
		if($request->file('imgcar')){
			if(!file_exists('resources/upload/imagecar')){
				mkdir('resources/upload/imagecar',0777,true);
			}
			if(!file_exists(('resources/upload/imagecar/thumb'))){
				mkdir('resources/upload/imagecar/thumb/',0777,true);
			}
			$time = new DateTime();
			foreach($request->file('imgcar') as $item){
				$nameimg = $time->getTimestamp().$item->getClientOriginalName();
				$nameimg = str_replace(array(' ','_','(',')','-'),'',$nameimg);
				$array[]=$nameimg;
				$item->move('resources/upload/imagecar/',$nameimg);
				Image::make('resources/upload/imagecar/'.$nameimg)->resize(102,76)->save('resources/upload/imagecar/thumb/'.$nameimg);
			}
		}
 		$images = (object)$array;
		$images = json_encode($images);
		$car->images = $images;
		$car->save();
		return redirect()->route('admin.car.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtName Added Successful !!! "]);
	}

	public function getList()
	{

		$listcar = Car::all();
		return view('admin.car.list',compact('listcar'));
	}

	public function getEdit($id)
	{
		$car = Car::findOrFail($id);
		$listfac = Facilities::lists('name','id');
		$tour = Tour::lists('name','id');
		return view('admin.car.edit',compact('car','tour','listfac'));
	}

	public function getDelimg($img,$data){
		$imgdel = explode(',',$data);
		$images = json_decode($img);
		$arr =array();
		foreach ($images as $key => $image) {
			$arr[$key] = $image;
			foreach($imgdel as $keyimg){
				if($key == $keyimg){
					File::Delete('resources/upload/imagecar/'.$arr[$key]);
					File::Delete('resources/upload/imagecar/thumb/'.$arr[$key]);
					unset($arr[$key]);
				}
			}
		}
		return $arr;
	}
	public function postEdit(CarRequest $request,$id)
	{
		$car = Car::findOrFail($id);
		$inforimg = $request->inforimg;
		if($inforimg !=""){
			$arr_tmp = $this->getDelimg($car->images,$inforimg);

		}else{
			$array = json_decode($car->images);
			$arr_tmp = (array)$array;
		}
		$listfac = "";
		if($request->listfac !=null){
			foreach($request->listfac as $val){
				$listfac.=','.$val;
			}
		}
		$car->facilities = $listfac;
		$car->name = $request->txtName;
		$car->quality = $request->txtQuality;
		$car->price = $request->txtPrice;
		$car->des = $request->txtDes;
		$car->status = $request->txtStatus;
		$car->showatindex = $request->txtTop;
 
		$car->tour_id = $request->txtTour;
		$arrkey = count($arr_tmp);
		foreach(Input::file('imgcar') as $file){
			if(isset($file)){
				$date = new DateTime();
				$timeupload = $date->getTimestamp();
				$name = $timeupload.$file->getClientOriginalName();
				$name = str_replace(array(' ','_','(',')','-'),'',$name);
				$arr_tmp[$arrkey++]=$name;
				$file->move('resources/upload/imagecar',$name);
				if(!file_exists('resources/upload/imagecar/thumb')){
					mkdir('resources/upload/imagecar/thumb',0777,true);
				}
				$thumb = Image::make('resources/upload/imagecar/'.$name)->resize(120,100)->save('resources/upload/imagecar/thumb/'.$name);
			}
		}
		$arr = json_encode($arr_tmp);
		$car->images = $arr;
		$car->save();
		return redirect()->route('admin.car.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtName Edited Successful !!!"]);
	}
	public function getDelete($id)
	{
		$car = Car::findOrFail($id);
		$arr = json_decode($car->images);
		$arr = (array)$arr;
		foreach($arr as $key => $val){
			File::Delete('resources/upload/imagecar/'.$val);
			File::Delete('resources/upload/imagecar/thumb/'.$val);
		}
		$car->delete($id);
		return redirect()->route('admin.car.getlist')->with(['flash_level'=>'success','flash_msg'=>" Deleted Successfuly !!!"]);
	}

}
