<?php


namespace App\Contracts\Models;


use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface UserOrderContract
{
    public function date():MorphOne;
    public function dates():MorphMany;
}
