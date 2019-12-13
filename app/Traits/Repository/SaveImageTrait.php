<?php


namespace App\Traits\Repository;


use App\Helpers\ImageSaver;
use App\Models\Image;
use Illuminate\Http\Request;

trait SaveImageTrait
{
    /**
     * @param int $id
     * @param Request $request
     * @param string $nameKey
     */
    /*
     * if($request->has($nameKey) && is_array($request->all()[$nameKey]))
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
     */
    public function saveImage(int $id, Request $request, string $nameKey = "image")
    {
        if ($request->has($nameKey) && is_array($request->all()[$nameKey])) {
            $data = $this->find($id);

            $manyIamges = (new ImageSaver($request, strtolower(class_basename($this->model())), $nameKey))->saveManyImages();


            foreach ($manyIamges as $key => $image) {
                if ($item = $data->images()->where('index', $key)->first()) {
                    ImageSaver::deleteImage($item->getAttribute('path'));
                    $item->update([
                        'path' => $image
                    ]);

                } else {
                    $data->images()->save(
                        new Image([
                            'index' => $key,
                            'path' => $image
                        ])
                    );
                }
            }
        } else if ($request->has($nameKey)) {

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

    public function addImages(int $id, Request $request, string $nameKey = "image")
    {
        if ($request->has($nameKey)) {
            $images = $this->find($id)->images()->where('index', '!=', 1)->get();
            if ($images !== null) {
                foreach ($request->get($nameKey) as $key => $value) {
                    $image = $images->where('index', $key);
                    ImageSaver::deleteImage($image->getAttribute('path'));
                    $image->delete();
                }
            }
            foreach ($request->get($nameKey) as $key => $value) {

                $this->find($id)->images()->save(new Image([
                    'path' => (new ImageSaver($request, strtolower(class_basename($this->model()))))->saveImage()
                ]));
            }
        }
    }


    public function deleteImage($id)
    {
        $images = $this->find($id)->images()->get();
        foreach ($images as $image) {
            ImageSaver::deleteImage($image->getAttribute('path'));
            $image->delete();

        }
    }
}
