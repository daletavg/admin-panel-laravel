<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = "requests";
    protected $fillable = ['name','phone','message'];
    protected $guarded = ['id','created_at'];
    public $timestamps =false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
