<?php

namespace App\Repositories;

use App\Models\Meta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class MetaRepository.
 */
class MetaRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Meta::class;
    }

    public function findByUrl($url)
    {
        return Meta::whereUrl($url)->first();
    }

    public function getForAdminDisplay(Request $request)
    {
        /** @var  $query Builder */
        $query = Meta::query()->with('lang');
        if ($search = $request->get('search')) {
            $query->where(function (Builder $builder) use ($search) {
                $builder->where('url', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('keywords', 'like', '%' . $search . '%');
            });
            $query->orderBy('url');
        }
        $query->latest();
        $result = $query->paginate();
        return $result;
    }
}
