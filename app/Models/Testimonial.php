<?php

namespace App\Models;


use App\Contracts\HasImageContract;
use App\Traits\ImageTrait;

/**
 * App\Models\Testimonial
 *
 * @property-read \App\Models\Image $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
class Testimonial extends Model implements HasImageContract
{
    use ImageTrait;

    protected $table= 'testimonials';
    protected $fillable = ['bio','testimonial','type','status','date'];

    protected $casts=[
        'date'=>'datetime'
    ];

    public function getDate($format = null)
    {
        if($format !== null){
            return $this->getAttribute('date')->format($format);
        }else{
            return $this->getAttribute('date')->format('d.m.Y');
        }
    }

    public const TYPE_TEXT='text';
    public const TYPE_DOCUMENT='document';
    public const  STATUS_MODERATION='moderation';
    public const STATUS_ON ='on';
    public const STATUS_OFF='off';
}
