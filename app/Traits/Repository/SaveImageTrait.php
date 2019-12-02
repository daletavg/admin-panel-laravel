<?php


namespace App\Traits\Repository;


use App\Helpers\ImageSaver;
use App\Models\Image;
use Illuminate\Http\Request;

trait SaveImageTrait
{

    public function saveImage(int $id, Request $request, string $nameKey = "image")
    {
        if ($request->has($nameKey) ) {
            $image = $this->find($id)->image()->first();
            if ($image !== null) {
                ImageSaver::deleteImage($image->getAttribute('path'));
                $image->delete();
            }
            $this->find($id)->image()->save(
                new Image([
                    'path' => (new ImageSaver($request, strtolower(class_basename($this->model()))))->saveImage()
                ])
            );
        }
    }


    public function deleteImage(int $id)
    {
        $image = $this->find($id)->image()->first();
        if ($image !== null) {
            ImageSaver::deleteImage($image->getAttribute('path'));
            $image->delete();
        }
    }
}
