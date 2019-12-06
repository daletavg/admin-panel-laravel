<?php


namespace App\Traits\Repository;


use App\Models\ManyImages;
use Illuminate\Http\Request;

trait SaveManyImagesTrait
{
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
    public function deleteManyImages()
    {
        foreach ($this->manyImages()->get() as  $item)
        {
            $item->delete();
        }
    }



}
