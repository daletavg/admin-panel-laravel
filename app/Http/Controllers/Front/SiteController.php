<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\BaseController;
use App\Models\Service;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class SiteController extends BaseController
{
    protected $itemRepository;
    public function __construct()
    {
        $this->generateSeoMeta();
        $this->addDataToBaseView();
    }
    public function main(){
        $this->generateSeoMeta();


        return view('public.layouts.app',$this->data);
    }

    protected function generateSeoMeta()
    {
        $meta = getMeta();
        if($meta!==null) {
            SEOMeta::setTitle($meta->lang->title);
            SEOMeta::setKeywords($meta->lang->keywords);
            SEOMeta::setDescription($meta->lang->description);
        }
    }


}
