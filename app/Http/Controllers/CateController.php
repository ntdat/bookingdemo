<?php namespace App\Http\Controllers;

use App\Http\Requests\CateRequest;
use App\Http\Controllers\Controller;
use App\Categorie;
use Illuminate\Http\Request;

class CateController extends Controller {


    public function getAdd(){
        $data  = Categorie::select('id','name','parent_id')->get()->toArray();

        return view('admin.cate.add',compact('data') );

    }

    public function postAdd(CateRequest $Request){

        $cate = new Categorie;
        $cate->name =   $Request->txtCateName;
        $cate->parent_id =  $Request->txtParent;
        $cate->status =  $Request->rdoStatus;
        $cate->created_by = 'admin';
        $cate->save();
        return redirect()->route('admin.cate.getlist')->with(['flash_level'=>'success','flash_msg'=>" Category $cate->name Added Success !!!"]);

    }
    public function getList(){
        $list = Categorie::select('id','name','status','parent_id')->get()->toArray();
        return view('admin.cate.list',compact('list'));
    }
    public function getdelete($id){
        $c_delete = Categorie::where('parent_id',$id)->count();
        if($c_delete == 0){
            $find = Categorie::find($id);
            $cateName = $find->name;
            $find->delete();
            return redirect()->route('admin.cate.getlist')->with(['flash_level' => 'success','flash_msg' => "$cateName Deleted Successfuly"]);
        }else{
            return redirect()->route('admin.cate.getlist')->with(['flash_level' => 'danger','flash_msg' => "Sorry ! You Can't Delete This Category"]);
        }

    }
    public function getEdit($id){
        $data=Categorie::findOrFail($id)->toArray();
        $parent = Categorie::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.edit',compact('data','parent','id'));
    }
    public function postEdit($id,Request $Request ){
        $this->validate($Request,
            [
                'txtCateName'  =>  'required',
            ],
            [
                'txtCateName.required'  =>  'Please Enter Name Category',                            ]
            );
        $cate = Categorie::find($id);
        $cate->name     = $Request->txtCateName;
        $cate->status   = $Request->rdoStatus;
        $cate->parent_id   = $Request->txtParent;
        $cate->save();
       return redirect()->route('admin.cate.getlist')->with(['flash_level'=>'success','flash_msg'=>" Update Category Success !!!"]);
    }
}
