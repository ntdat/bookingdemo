<?php namespace App\Http\Controllers;


use App\Facilities;
use App\Http\Requests;
use App\Tour;
use App\Hotel;
use App\Room;
use Illuminate\Routing\Route;
use Input;
use App\Categorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use Request;
use DateTime;
use File;

class HotelController extends Controller {

	public function getAdd(){
        $listfac = Facilities::lists('name','id');
        $cate = Categorie::select('name','id','parent_id')->get()->toArray();
        $data = Tour::Select('name','id')->get()->toArray();
        return view('admin.hotel.add',compact('data','cate','listfac'));

    }

    public function postAdd(HotelRequest $request){
        $hotel = new Hotel;
        $arr =array();
        $date = new DateTime();
        $timeupload = $date->getTimestamp();
        $mainimg = $timeupload.$request->file('imghotel')->getClientOriginalName();
        $validname = str_replace(array(' ','_','(',')','-'),'',$mainimg);
        $arr[]=$validname;
        $request->file('imghotel')->move('resources/upload/imagehotel',$validname);
        $hotel->name = $request->txtName;
        $hotel->des  =$request->txtDes;
        $hotel->location =$request->txtLocation;
        $hotel->star= $request->txtStar;
        $hotel->map = $request->txtMap;
        $hotel->status=$request->txtStatus;
        $hotel->tour_id = $request->txtTourid;
        $hotel->cate_id = $request->txtCateid;
        $hotel->extrarule = $request->txtRule;
        $hotel->pet = $request->txtPet;
        $hotel->showatindex = $request->txtTop;
        $hotel->checkin = $request->txtCheckin;
        $hotel->checkout = $request->txtCheckout;
        $payment = "";
        if($request->txtPayment !=null){

            foreach($request->txtPayment as $val){
                $payment.=','.$val;
            }
        }
        $hotel->payment = $payment;
        $listfac = "";
        if($request->listfac !=null){
            foreach($request->listfac as $val){
                $listfac.=','.$val;
            }
        }
        $hotel->facilities = $listfac;
        foreach(Input::File('detailimg') as $file){
            $imgdetail = $timeupload.$file->getClientOriginalName();
            $validname = str_replace(array('-','_',' '),'',$imgdetail);
            $arr[] =$validname;
            $file->move('resources/upload/imagehotel',$validname);
        }
        $object = (object)$arr;
        $img = json_encode($object);
        $hotel->images=$img;
        $hotel->save();
        return redirect()->route('admin.hotel.getlist')->with(['flash_level'=>'success','flash_msg'=>" Tour $request->txtName Added Success !!!"]);
    }

    public function getList(){
        $data = Hotel::select('id','name','images','status','star','tour_id','showatindex','created_at')->get()->toArray();
        return view('admin.hotel.list',compact('data'));
    }
    public function getDelete($id){
        $hotel = Hotel::find($id);
        $img = $hotel->images;
        $name = $hotel->name;
        $img = json_encode($img);
        $img= (array)$img;
        foreach ($img as $key => $val ) {
            File::Delete('resources/upload/imagehotel/'.$val);
        }
        $hotel->delete($id);
        return redirect()->route('admin.hotel.getlist')->with(['flash_level'=>'success','flash_msg'=>"$name Deleted Successfuly !!!"]);
    }
    public function getEdit($id){
        $data = Hotel::find($id)->toArray();
        $cate = Categorie::select('id','parent_id','name')->get()->toArray();
        $listfac = Facilities::lists('name','id');
        $tour = Tour::Select('name','id')->get()->toArray();
        return view('admin.hotel.edit',compact('data','cate','tour','listfac'));
    }
    public function getDelimg($img,$data){
        $imgdel = explode(',',$data);
        $images = json_decode($img);
        $arr =array();
        foreach ($images as $key => $image) {
            $arr[$key] = $image;
            foreach($imgdel as $keyimg){
                if($key == $keyimg){
                    File::Delete('resources/upload/imagehotel/'.$arr[$key]);
                    unset($arr[$key]);
                }
            }
        }
        return $arr;
    }
    public function postEdit(HotelRequest $request,$id){
        $hotel =  Hotel::find($id);
        $inforimg = $request->inforimg;
        if($inforimg !=""){
            $arr_tmp = $this->getDelimg($hotel->images,$inforimg);

        }else{
            $array = json_decode($hotel->images);
            $arr_tmp = (array)$array;
        }
        $hotel->extrarule = $request->txtRule;
        $hotel->pet = $request->txtPet;
        $payment = "";
        if($request->txtPayment !=null){

            foreach($request->txtPayment as $val){
                $payment.=','.$val;
            }
        }
        $listfac = "";
        if($request->listfac !=null){
            foreach($request->listfac as $val){
                $listfac.=','.$val;
            }
        }
        $hotel->facilities = $listfac;
        $hotel->payment = $payment;
        $date = new DateTime();
        $timeupload = $date->getTimestamp();
        $hotel->name = $request->txtName;
        $hotel->des = $request->txtDes;
        $hotel->location = $request->txtLocation;
        $hotel->star = $request->txtStar;
        $hotel->map = $request->txtMap;
        $hotel->status = $request->txtStatus;
        $hotel->tour_id = $request->txtTourid;
        $hotel->cate_id = $request->txtCateid;
        $hotel->extrarule = $request->txtRule;
        $hotel->pet = $request->txtPet;
        $hotel->showatindex = $request->txtTop;
        $hotel->checkin = $request->txtCheckin;
        $hotel->checkout = $request->txtCheckout;
        $hotel->created_by = 'admin';
        if(Input::file('imghotel') !=""){
            $name = $timeupload.$request->file('imghotel')->getClientOriginalName();
            $name = str_replace(array(' ','_','(',')','-'),'',$name);
            $request->file('imghotel')->move('resources/upload/imagehotel',$name);
            array_unshift($arr_tmp,$validdetail);
        }
        $arrkey = count($arr_tmp);

        foreach(Input::file('detailimg') as $file){
            if(isset($file)){
                $name = $timeupload.$file->getClientOriginalName();
                $validdetail = str_replace(array('-','_'),'',$name);
                $arr_tmp[$arrkey++]=$validdetail;
                $file->move('resources/upload/imagehotel',$validdetail);
            }
        }
        $arr = json_encode($arr_tmp);
        $hotel->images = $arr;
        $hotel->save();
        return redirect()->route('admin.hotel.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtName Edited Successful !!!"]);

    }
    public function getRoombyId($id){
        $listroom = Room::where('hotel_id',$id)->get();
        return view('admin.hotel.items',compact('listroom'));
    }
}
