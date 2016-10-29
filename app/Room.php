<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

    protected $table = 'rooms';

    protected $fillable =['name','facilities','bed','quality','price','status','hotel_id','cate_id','created_by','created_at','update_at'];

    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }
    public function orderdetail(){
        return $this->hasMany('App\Orderdetail');
    }
}
