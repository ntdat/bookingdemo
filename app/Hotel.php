<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {

    protected $table = 'hotels';

    protected $fillable =['name','des','location','star','images','map','status','cate_id','created_by','created_at','updated_at'];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }
    public function room(){
        return $this->hasMany('App\Room');
    }

}
