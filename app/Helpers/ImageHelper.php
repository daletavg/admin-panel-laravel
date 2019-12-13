<?php

function GetPathToPhoto(string $pathToImage,string $defaultPath = null,$storage='public')
{

    if ($defaultPath != null) {
        return \Illuminate\Support\Facades\Storage::disk($storage)->exists($pathToImage) ? Storage::disk($storage)->url($pathToImage) : $defaultPath;
    }

    return \Illuminate\Support\Facades\Storage::disk($storage)->exists($pathToImage) ? Storage::disk($storage)->url($pathToImage) : asset('default.png');
}


function FileExists(string $pathToImage,string $storage = 'public')
{
    return \Storage::disk($storage)->exists($pathToImage);
}
function imgOrig(string $pathToImage)
{
    return str_replace('_s', '', $pathToImage);
}

function GetImageAdmin(string $pathToImage,string $defaultPath=null,$storage='public')
{
    if($defaultPath!= null) {
        return "<img width=150 src='" . GetPathToPhoto($pathToImage, $defaultPath, $storage) . "' alt=''>";
    }
    return "<img width=150 src='" . GetPathToPhoto($pathToImage, asset('default.svg'), $storage) . "' alt=''>";
}
