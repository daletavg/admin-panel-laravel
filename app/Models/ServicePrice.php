<?php

namespace App\Models;



class ServicePrice extends Model
{
    protected $table = 'service_price';
    protected $fillable = ['title','price','stock'];

    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
