<?php


namespace App\Traits\Repository;


use App\Models\ManyImages;
use Illuminate\Http\Request;

trait SaveManyImagesTrait
{
    public function saveManyImages(int $id,Request $request, string $nameKey = 'images')
    {
        if($request->has($nameKey))
        {
            if(is_null($item =  $this->find($id)->manyImages()->first())) {
                $gallery = new ManyImages();
                $item = $this->find($id);
                $item->manyImages()->save($gallery);
                $item->manyImages()->first()->saveManyImages($request, $nameKey);
            }else {
                $this->find($id)->manyImages()->first()->saveManyImages($request, $nameKey);
            }

        }
    }
    public function deleteManyImages($id)
    {
        foreach ($this->find($id)->manyImages()->get() as  $item)
        {
            $item->deleteImage();
            $item->delete();
        }
    }



}
