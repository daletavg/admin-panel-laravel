<?php


namespace App\Contracts;


interface HasLangData
{
    function lang($locale = null);
    function setLangClass(string $className) ;
    function getLangClass():string ;
}
