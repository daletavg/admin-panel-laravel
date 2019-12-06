<?php


namespace App\Contracts\Repository;


use phpDocumentor\Reflection\Types\Mixed_;

interface CacheContract
{
    function addCache( $data);

    function removeCache( $data);

    function updateCache(string $oldKey, $data);

    function getCacheByKey(string $key);
}
