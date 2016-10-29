<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Destination;
use DateTime;
use Intervention\Image\Facades\Image;
use App\Categorie;
use App\Http\Requests\DesRequest;
use Illuminate\Support\Facades\Input;
use Request;
use File;

class DestinationsController extends Controller {


	public function getAdd()
	{

		$cate = Categorie::select('name','id','parent_id')->get()->toArray();

		return view('admin.destination.add',compact('cate'));
	}
	public function postAdd(DesRequest $request){
		$des =  new Destination();
		$des->name = $request->txtName;
		$des->des = $request->txtDes;
		$des->status = $request->rdoStatus;
		$des->showatindex = $request->txtTop;
		$des->created_by = "admin";

		$des->cate_id = $request->txtParent;
		$array= array();
		if($request->file('desimgs')){
			if(!file_exists('resources/upload/imagedes')){
				mkdir('resources/upload/imagedes',0777,true);
			}
			if(!file_exists(('resources/upload/imagedes/thumb'))){
				mkdir('resources/upload/imagedes/thumb/',0777,true);
			}
			$time = new DateTime();
			foreach($request->file('desimgs') as $item){
				$nameimg = $time->getTimestamp().$item->getClientOriginalName();
				$nameimg = str_replace(array(' ','_','(',')','-'),'',$nameimg);
				$array[]=$nameimg;
				$item->move('resources/upload/imagedes/',$nameimg);
				Image::make('resources/upload/imagedes/'.$nameimg)->resize(102,76)->save('resources/upload/imagedes/thumb/'.$nameimg);
			}
		}
		$images = (object)$array;
		$images = json_encode($images);
		$des->images = $images;
		$des->save();
		return redirect()->route('admin.destination.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtName Added Successful !!! "]);
	}


	public function getList()
	{
		$listdes = Destination::all();
		return view('admin.destination.list',compact('listdes'));

	}
	public function getEdit($id)
	{
		$des = Destination::findOrFail($id);
		$cate = Categorie::select('id','parent_id','name')->get()->toArray();
		return view('admin.destination.edit',compact('des','cate'));
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
	public function postEdit(DesRequest $request,$id)
	{
		$des = Destination::findOrFail($id);
		$inforimg = $request->inforimg;
		if($inforimg !=""){
			$arr_tmp = $this->getDelimg($des->images,$inforimg);

		}else{
			$array = json_decode($des->images);
			$arr_tmp = (array)$array;
		}
		$des->name = $request->txtName;
		$des->des = $request->txtDes;
		$des->status = $request->rdoStatus;
		$des->showatindex = $request->txtTop;
		$des->cate_id = $request->txtParent;
		$arrkey = count($arr_tmp);
		foreach(Input::file('desimgs') as $file){
			if(isset($file)){
				$date = new DateTime();
				$timeupload = $date->getTimestamp();
				$name = $timeupload.$file->getClientOriginalName();
				$name = str_replace(array(' ','_','(',')','-'),'',$name);
				$arr_tmp[$arrkey++]=$name;
				$file->move('resources/upload/imagedes',$name);
				if(!file_exists('resources/upload/imagedes/thumb')){
					mkdir('resources/upload/imagedes/thumb',0777,true);
				}
				$thumb = Image::make('resources/upload/imagedes/'.$name)->resize(120,100)->save('resources/upload/imagedes/thumb/'.$name);
			}
		}
		$arr = json_encode($arr_tmp);
		$des->images = $arr;
		$des->save();
		return redirect()->route('admin.destination.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtName Edited Successful !!!"]);
	}
	public function postDelete()
	{
		if(Request::ajax())
		{
			$id = Input::get('id');

			$des = Destination::findOrFail($id);
			$arr = json_decode($des->images);
			$arr = (array)$arr;
			foreach($arr as $key => $val){
				File::Delete('resources/upload/imagecar/'.$val);
				File::Delete('resources/upload/imagecar/thumb/'.$val);
			}
			$des->delete();
			return "1";
		}
	}


}
