<?php namespace App\Http\Controllers;
use Request;
use App\Categorie,App\Car;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Tour;
use App\Http\Requests\TourRequest;
use Input;
use DateTime;

class TourController extends Controller
{

    public function getAdd()
    {
        $cate = Categorie::Select('name', 'parent_id', 'id')->get()->toArray();
        return view('admin.tour.add', compact('cate'));

    }
    public function postAdd(TourRequest $request)
    {
        $arr = array();
        $date = new DateTime();
        $timeupload = $date->getTimestamp();
        $name = $timeupload.$request->file('imgtour')->getClientOriginalName();
        $validname = str_replace(array('-','_',' '),'',$name);
        $arr[]=$validname;
        $request->file('imgtour')->move('resources/upload/imagetour',$validname);
        $tour  = new Tour;
        $tour->name = $request->txtName;
        $tour->intro = $request->txtIntro;
        $tour->nature = $request->txtNature;
        $tour->nightlife = $request->txtNightlife;
        $tour->history = $request->txtHistory;
        $tour->location = $request->txtLocation;
        $tour->area = $request->txtArea;
        $tour->showatindex = $request->txtTop;
        $tour->showatoffer = $request->txtOffer;
        $tour->cate_id = $request->txtParent;
        $tour->currency = $request->txtCurrency;
        $tour->language = $request->txtLanguge;
        $tour->map = $request->txtMap;
        $tour->status = $request->rdoStatus;
        $tour->visa = $request->rdoVisa;
        $tour->created_by = 'admin';

            foreach(Input::file('detailimg') as $file){
                if(isset($file)){
                    $namedetail =$timeupload.$file->getClientOriginalName();
                    $validdetail = str_replace(array('-','_',' '),'',$namedetail);
                    $arr[] =  $validdetail;
                    $file->move('resources/upload/imagetour',$validdetail);
                }
            }
        $object = (object)$arr;
        $img = json_encode($object);
        $tour->images=$img;
        $tour->save();
        return redirect()->route('admin.tour.getlist')->with(['flash_level'=>'success','flash_msg'=>" Tour $request->txtName Added Success !!!"]);
    }
    public function getList(){
        $data = Tour::select('name','images','status','cate_id','created_at','showatindex','showatoffer','id')->get();

        return view('admin.tour.list',compact('data'));
    }
    public function getDelete($id){
        $tour = Tour::find($id);
        $name = $tour->name;
        $tourimg = $tour->toArray();
        $images = json_decode($tourimg['images']);
        foreach($images as $image){
            File::delete('resources/upload/imagetour/'.$image);
        }
        $tour->delete($id);
        return redirect()->route('admin.tour.getlist')->with(['flash_level' => 'success','flash_msg' => "$name Deleted Successfuly !!!"]);
    }
    public function getEdit($id){
        $tour = Tour::findOrFail($id);
        $cate = Categorie::Select('name', 'parent_id', 'id')->get();
        return view('admin.tour.edit',compact('tour','cate'));
    }
    public function postEdit($id ,TourRequest $request){
        $tour = Tour::find($id);
        $imgdel = $request->inforimg;

        if($imgdel !=""){
            $arr_tmp = $this->getDelimg($tour->images,$imgdel);
        }else{
            $listImg = json_decode($tour->images);
            $arr_tmp = (array)$listImg;
        }

        $tour->name = $request->txtName;
        $tour->intro = $request->txtIntro;
        $tour->nature = $request->txtNature;
        $tour->nightlife = $request->txtNightlife;
        $tour->history = $request->txtHistory;
        $tour->location = $request->txtLocation;
        $tour->area = $request->txtArea;
        $tour->cate_id = $request->txtParent;
        $tour->currency = $request->txtCurrency;
        $tour->language = $request->txtLanguge;
        $tour->map = $request->txtMap;
        $tour->status = $request->rdoStatus;
        $tour->showatindex = $request->txtTop;
        $tour->showatoffer = $request->txtOffer;
        $tour->visa = $request->rdoVisa;
        $tour->created_by = 'admin';
        $date = new DateTime();
        $timeupload = $date->getTimestamp();
        if(Input::file('imgtour') !=""){

            $namemainimg = $timeupload.$request->file('imgtour')->getClientOriginalName();
            $validdetail = str_replace(array('-','_',' '),'',$namemainimg);
            $request->file('imgtour')->move('resources/upload/imagetour',$validdetail);
            array_unshift($arr_tmp,$validdetail);
        }
        $arrkey = count($arr_tmp);

        foreach(Input::file('detailimg') as $file){
            if(isset($file)){
                $name = $timeupload.$file->getClientOriginalName();
                $validdetail = str_replace(array('-','_',' '),'',$name);
                $arr_tmp[$arrkey++]=$validdetail;
                $file->move('resources/upload/imagetour',$validdetail);
            }
        }
        $arr = json_encode($arr_tmp);
        $tour->images = $arr;
        $tour->save();
        return redirect()->route('admin.tour.getlist')->with(['flash_level'=>'success','flash_msg'=>"$request->txtName Edited Successful !!!"]);
    }
    public function getDelimg($img,$data){
        $imgdel = explode(',',$data);
        $images = json_decode($img);
        $arr =array();
        foreach ($images as $key => $image) {
            $arr[$key] = $image;
            foreach($imgdel as $keyimg){
                if($key == $keyimg){
                    File::Delete('resources/upload/iamgetour/'.$arr[$key]);
                    unset($arr[$key]);
                }
            }
        }
        return $arr;
    }
    public function listCarById($id)
    {
        $listCar = Car::where('tour_id',$id)->get();
        return view('admin.tour.items',compact('listCar'));
    }
}
