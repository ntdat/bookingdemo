<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

    protected $table = 'categories';

    protected $fillable =['name','created_by','parent_id','created_at','updated_at'];

    public function tour(){
        return $this->hasMany('App\Tour');
    }
    public function hotel(){
        return $this->hasMany('App\Hotel');
    }
    public function car(){
        return $this->hasMany('App\Car');
    }

}
