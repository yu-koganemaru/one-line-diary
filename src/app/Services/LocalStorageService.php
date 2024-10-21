<?php

namespace App\Services;

use Illuminate\Http\Request;
use Carbon\Carbon;

class LocalStorageService
{
    /**
     * 画像保存
     *
     * @param $image
     * @param $storagePath
     * @return void
     */
    public function storeFile($file, $storagePath, $name=null)
    {
        if (empty($file)) {
            return null;
        }
        
        if($name){
            // 名前をつけて保存
            $filePath = $file->storeAs($storagePath, $name);
        }else{
            $filePath = $file->store($storagePath);
        }
        
        return $filePath;
    }
}
