<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
    public function getTableName(){
        return $this->table;
    }

    public function scopeActive($query,bool $active)
    {
        return $query->where('power', '=', $active);
    }
    public function scopeWithLang($query)
    {
        return $query->with('lang');
    }
}
