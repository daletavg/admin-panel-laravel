<?php
use Illuminate\Support\Arr;
use App\Repositories\MetaRepository;
if (!function_exists('getMeta')) {
    function getMeta()
    {
        $metRepository = new MetaRepository(app());
        return $metRepository->getMetaData();
    }
}

if (!function_exists('showMeta')) {
    function showMeta($value, $field = 'h1')
    {
        $metaArr = getMeta();
        $meta = null;
        if($metaArr!==null) {
            $meta = $metaArr->langs->where('language_id',\App\Repository\LanguageRepository::getCurrentLocaleId());
            if($meta !== null){
                $meta  = Arr::first($meta);
                $meta = Arr::get($meta,$field);
            }
        }

        return $meta ?: $value;
    }
}
