<?php

namespace App\Models;

use App\Contracts\HasImageContract;
use App\Helpers\ImageSaver;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;


class ManyImages extends Model implements HasImageContract
{
    use ImageTrait;

    protected $table = 'many_images';

    public function saveManyImages(Request $request,string $nameKey='image'){
        if($request->has($nameKey) && is_array($request->all()[$nameKey]))
        {
            $manyIamges = (new ImageSaver($request, $this->getTableName(),$nameKey))->saveManyImages();
            foreach ($manyIamges as $image){
                $this->images()->save(
                    new Image([
                        'path' => $image
                    ])
                );
            }
        }
    }
}
