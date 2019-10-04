<?php
function activeLink($routeName,$data)
{
    if(Request::fullUrl() == $routeName){
        return $data;
    }
    return null;
}
