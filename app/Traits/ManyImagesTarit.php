<?php


namespace App\Traits;


use App\Helpers\ImageSaver;
use App\Models\Image;
use App\Models\ManyImages;
use Illuminate\Http\Request;

trait ManyImagesTarit
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function manyImages()
    {
        return $this->morphOne(ManyImages::class, 'model');
    }

    /**
     * @param Request $request
     * @param string $nameKey
     * @deprecated
     */
    public function saveManyImages(Request $request, string $nameKey = 'images')
    {
        if($request->has($nameKey))
        {
            if(is_null( $this->manyImages()->first())) {
                $gallery = new ManyImages();
                $this->manyImages()->save($gallery);
                $this->manyImages()->first()->saveManyImages($request, $nameKey);
            }else {
                $this->manyImages()->first()->saveManyImages($request, $nameKey);
            }

        }
    }

    /**
     * @deprecated
     */
    public function deleteManyImages()
    {
        foreach ($this->manyImages()->get() as  $item)
        {
            $item->deleteImage();
            $item->delete();
        }
    }


}
