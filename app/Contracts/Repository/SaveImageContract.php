<?php


namespace App\Contracts\Repository;


use Illuminate\Http\Request;

interface SaveImageContract
{
    public function saveImage(int $id, Request $request, string $nameKey = "image");
    public function deleteImage(int $id);
}
