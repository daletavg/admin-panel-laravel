<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasLangData
{
    function lang($locale = null);
    function langs():HasMany;
    function getLangClass():string ;
}
