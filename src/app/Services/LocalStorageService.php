<?php

namespace App\Services;

use Illuminate\Http\Request;

class LocalStorageService
{
    /**
     * 画像保存
     *
     * @param $file
     * @param $storagePath
     * @return void
     */
    public function storeFile(File|null $file, string $storagePath)
    {
        if (empty($file)) {
            return null;
        }
        
        $filePath = $file->store($storagePath);
        
        return $filePath;
    }
}
