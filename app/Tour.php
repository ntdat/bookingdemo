<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model {

    protected $table = 'tours';

    protected $fillable =['name','created_by','parent_id','create_at','update_at'];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }
    public function orderdetail(){
        return $this->hasMany('App\Orderdetail');
    }
}
