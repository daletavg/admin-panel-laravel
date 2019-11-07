<?php


namespace App\Contracts;


use App\Models\Language;

interface LangDataContract
{
    public function setLanguage(Language $language);
    public function setData(array $data);

}
