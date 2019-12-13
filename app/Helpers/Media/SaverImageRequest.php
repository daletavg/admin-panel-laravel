<?php
//
//
//namespace App\Helpers\Media;
//
//
//use App\Models\Request;
//
//class SaverImageRequest extends SaverImageBase
//{
//    private $request;
//    private $nameKey;
//
//    public function __construct(string $folderName = "images", string $storage = 'public')
//    {
//        parent::__construct($folderName, $storage);
//    }
//
//    /**
//     * @param Request $request
//     */
//    public function setRequest(Request $request)
//    {
//        $this->request = $request;
//    }
//    /**
//     * @return mixed
//     */
//    public function getRequest()
//    {
//        return $this->request;
//    }
//    /**
//     * @param string $nameKey
//     */
//    public function setNameKey(string $nameKey){
//        $this->nameKey = $nameKey;
//    }
//    /**
//     * @return mixed
//     */
//    public function getNameKey(){
//        return $this->nameKey;
//    }
//
//    /**
//     * @return bool
//     */
//    protected function checkImage() :bool
//    {
//        $nameKey = $this->getNameKey();
//        /**@var Request $this->request  */
//        return $this->request->hasFile($nameKey);
//    }
//
//
//}
