<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    /**
     * 画像保存
     *
     * @param $file
     * @param $storagePath
     * @return void
     */
    public function storeFile(UploadedFile|null $file, string $storagePath)
    {
        if (empty($file)) {
            return null;

        }
        $filePath = Storage::disk('public')->putFile($storagePath, $file);
        
        return $filePath;
    }
}
