<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model {

    protected $table = 'orderdetails';

    protected $fillable =['quality_room','quality_car','car_id','tour_id','room_id','created_at','updated_at'];

    public function tour(){
        return $this->belongsTo('App\Tour');
    }

    public function room(){
        return $this->belongsTo('App\Room');
    }

    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function order()
    {
        return $this->hasOne('App\Order');
    }

}
