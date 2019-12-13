<?php


namespace App\Traits;


use App\Helpers\ImageSaver;
use App\Models\Image;
use Illuminate\Http\Request;


trait ImageTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'model');
    }
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'model')->where('index',0);
    }

    public function deleteImage()
    {
        if(count($images = $this->images()->get())){
            foreach ($images as $image){
                ImageSaver::deleteImage($image->path);
                $image->delete();
            }
        }
    }
}
