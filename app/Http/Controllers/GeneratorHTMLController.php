<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GeneratorHTMLController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $link_offer = [
            // 'https://www.facebook.com/',
            // 'https://www.instagram.com/',
            'https://example.com/',
        ];

        $file_HTML = [
            'html_public\adultdates.html',
        ];

        $string_replace_url = "{{string_replace_url}}";

        $link_offer_file_HTML = [];

        foreach ($link_offer as $link) {
            foreach ($file_HTML as $file) {
                $link_offer_file_HTML[] = [$link, $file];
            }
        }

        foreach ($link_offer_file_HTML as $item_link_file) {
            $item_link = $item_link_file[0];
            $item_file = $item_link_file[1];

            $filePath = public_path($item_file);

            $nameNewFile = Str::random(5) . '-' .  str_replace("html_public\\", '', $item_file);

            $fileContent = file_get_contents($item_file);
            $result = str_replace("{{string_replace_url}}", $item_link, $fileContent);
            $result = str_replace("../landing_page/", 'landing_page/', $result);

            $newFilePath = public_path($nameNewFile);
            File::put($newFilePath, $result);
        }

        return "File mới đã được tạo thành công.";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}