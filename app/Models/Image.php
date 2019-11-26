<?php

namespace App\Models;



class Image extends Model
{
    protected $table='images';
    protected $fillable =['path'];
    protected $guarded=['id'];



}
