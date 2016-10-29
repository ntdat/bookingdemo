<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = 'cars';

    protected $fillable =['name','price','images','status','created_by','cate_id','created_at','updated_at'];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function orderdetail(){
        return $this->hasMany('App\Orderdetail');
    }
}
