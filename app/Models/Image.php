<?php

namespace App\Models;



class Image extends Model
{
    protected $table='images';
    protected $fillable =['path','index'];
    protected $guarded=['id'];



}
