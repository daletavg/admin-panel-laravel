<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\BaseController;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class SiteController extends BaseController
{
    public function main($data){
        $data['phones']=[
            getSettingData('contacts.first_num_contact'),
            getSettingData('contacts.second_num_contact')
        ];

        $data['linkInstagram'] = getSettingData('contacts.instagram');
        $data['linkFacebook'] = getSettingData('contacts.instagram');
        $data['contourPlasticUrl'] =\App\Models\Service::getUrlById(2)??'';
        $data['butolinUrl'] = \App\Models\Service::getUrlById(1)??'';
        $data['vectolLiftingUrl'] = \App\Models\Service::getUrlById(7)??'';
        $data['biorevitalizationUrl'] = \App\Models\Service::getUrlById(3)??'';
        $data['lolitikiUrl'] =\App\Models\Service::getUrlById(6)??'';
        $data['pilingUrl'] =  \App\Models\Service::getUrlById(4)??'';
        $data['plazmaUrl'] = \App\Models\Service::getUrlById(8)??'';

        return view('public.layouts.app',$data);
    }
}
