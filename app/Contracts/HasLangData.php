<?php


namespace App\Contracts;


interface HasLangData
{
    function lang($locale = null);

    /**
     * @deprecated
     * @param string $className
     * @return mixed
     */
    function setLangClass(string $className) ;
    function getLangClass():string ;
}
