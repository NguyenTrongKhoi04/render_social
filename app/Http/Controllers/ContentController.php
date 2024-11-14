<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContentController extends Controller
{
    public function getContent()
    {
        $filePath = public_path('test1.html');

        $nameNewFile = "new_social.html";
        $fileContent = file_get_contents($filePath);
        $linkSocial = 'https://example.com/';

        $result = str_replace("social_link_offer", $linkSocial, $fileContent);

        // dd($result);

        $newFilePath = public_path('html_social' . '/' . $nameNewFile);
        File::put($newFilePath, $result);
        return "File mới đã được tạo thành công tại: " . $newFilePath;
    }
}
