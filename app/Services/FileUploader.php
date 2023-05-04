<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploader
{
    public const BLOG = 'blog';
    public const USER = 'user';
    const BANNER = 'banner';
    const POST = 'post';

    public function upload(?UploadedFile $file, string $path): string
    {
        $file = explode('/', $file->store($path));
        
        return $file[1];
    }

    public function remove(string $path): void
    {
        Storage::delete($path);
    }
}
