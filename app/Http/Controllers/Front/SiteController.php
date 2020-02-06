<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\BaseController;
use App\Models\Service;
use App\Repository\Criterias\SortCriteria;
use App\Repository\ServicesRepository;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class SiteController extends BaseController
{
    protected $itemRepository;
    public function __construct()
    {
        $servicesRepository=new ServicesRepository(app());
        $servicesRepository->pushCriteria(new SortCriteria());
        $services = $servicesRepository->loadWithSubservices();

        $this->generateSeoMeta();
        $this->setBaseViewName('public.layouts.app');

        $data = [
            'firstPhone'=>getSettingData('phone_first.contacts'),
            'secondPhone'=>getSettingData('phone_second.contacts'),
            'email'=>getSettingData('email.emails'),
            'address'=>getSettingData('address.contacts'),
            'instagram'=>getSettingData('instagram.social'),
            'facebook'=>getSettingData('facebook.social'),
        ];
        $this->setDataOnBaseView(['services'=>$services]+$data);
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
