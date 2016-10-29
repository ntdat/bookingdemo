<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'orders';

    protected $fillable =['user_id','created_by','update_by','created_at','updated_at'];

    public function orderdetail()
    {
        return $this->belongsTo('App\Orderdetail');
    }

}
