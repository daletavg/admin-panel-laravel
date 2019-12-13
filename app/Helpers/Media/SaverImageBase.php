<?php
//
//
//namespace App\Helpers\Media;
//
//
//use Illuminate\Http\Request;
//use Exception;
//use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;
//
//class SaverImageBase
//{
//    /**@var string $storage  */
//    private $storage;
//    /**@var string $folderName  */
//    private $folderName;
//    /**@var Image $image  */
//    private $image;
//
//    public function __construct(string $folderName = "images", string $storage = 'public')
//    {
//        $this->setStorage($storage);
//        $this->setFolderName($folderName);
//    }
//    /**
//     * @param string $storage
//     */
//    public function setStorage(string $storage = 'public')
//    {
//        $this->storage = $storage;
//    }
//
//    /**
//     * @return string
//     */
//    public function getStorage()
//    {
//        return $this->storage;
//    }
//
//    /**
//     * @param string $folderName
//     */
//    public function setFolderName(string $folderName = "images")
//    {
//        $this->folderName = $folderName;
//    }
//
//    /**
//     * @return string
//     */
//    public function getFolderName()
//    {
//        return $this->folderName;
//    }
//
//    /**
//     * @param Image $image
//     */
//    public function setImage(Image $image){
//        $this->image= $image;
//    }
//
//    /**
//     * @return Image
//     */
//    public function getImage(){
//        return $this->image;
//    }
//
//
//    public function saveRequestImage(Request $request,string $nameKey)
//    {
//
//        if($request->hasFile($nameKey)){
//            /**
//             * @var Image $image
//             */
//            $image = Image::make($request->file($nameKey));
//
//            $this->image =$image;
//            $this->saveWithImage();
//        }
//    }
//    public function saveUrlImage(string $url)
//    {
//
//    }
//
//
//    private function saveWithImage(){
//        $basename = $this->image->filename;
//        $fileName = null;
//        if($basename !== null){
//            $fileName = $basename.''.time();
//        }else{
//            $fileName = time();
//        }
//        $type = (explode('/',$this->image->mime))[1];
//        $folder = $this->getFolderName().'/'.$fileName;
//        dd(public_path($folder.'.'.$type));
//        $this->image->save(public_path($folder.'.'.$type));
////        $file_name = $this->folderName . "/" . md5($name) . "." . pathinfo($this->image->basename, PATHINFO_EXTENSION);
////        $file_name_s = $this->folderName . "/" . md5($name) . "_s." . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
//        \Illuminate\Support\Facades\Storage::disk($this->storage)->put($file_name, file_get_contents($file->getRealPath()));
//        \Illuminate\Support\Facades\Storage::disk($this->storage)->put($file_name_s, self::thumbnailImage($file->getRealPath()));
////        return $file_name_s;
//    }
//
//    private function saveWithoutImage()
//    {
//
//    }
//
//    public function deleteImage(string $photoPath, string $storage = 'public')
//    {
//        if (is_null($photoPath) || strlen($photoPath) == 0) {
//            return;
//        }
//        try {
//            Storage::disk($storage)->delete($photoPath);
//            Storage::disk($storage)->delete(imgOrig($photoPath));
//        } catch (Exception $exception) {
//            return;
//        }
//    }
//}
