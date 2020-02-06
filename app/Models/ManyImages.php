<?php

namespace App\Models;

use App\Contracts\HasImageContract;
use App\Helpers\ImageSaver;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;


/**
 * App\Models\ManyImages
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string|null $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Image $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ManyImages whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
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
