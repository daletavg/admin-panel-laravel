<?php


namespace App\Repository;


use App\Contracts\Repository\SaveImageContract;
use App\Models\Testimonial;
use App\Traits\Repository\SaveImageTrait;
use Prettus\Repository\Eloquent\BaseRepository;


class TestimonialsRepository extends BaseRepository implements SaveImageContract
{
    use SaveImageTrait;

    /**
     * @return string|void
     */
    public function model(): string
    {
        return Testimonial::class;
    }

    public function getTestimonialsText()
    {
        return $this->findWhere([['type', '=', Testimonial::TYPE_TEXT]]);
    }

    public function getTestimonialsDocument()
    {
        return $this->findWhere([['type', '=', Testimonial::TYPE_DOCUMENT]]);
    }

    public function getStatus()
    {
        return dataWithId([
            Testimonial::STATUS_MODERATION => 'На модерации',
            Testimonial::STATUS_ON => 'Включен',
            Testimonial::STATUS_OFF => 'Выключен'
        ]);
    }

}
