<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    /**
     * 画像保存
     */
    public function storeFile(UploadedFile|null $file, string $storagePath): bool|string|null
    {
        if (empty($file)) {
            return null;

        }
        $filePath = Storage::disk('public')->putFile($storagePath, $file);

        return $filePath;
    }

    /**
     * 画像削除
     */
    public function deleteFile(string $storagePath): void
    {
        Storage::disk('public')->delete($storagePath);
    }

}
