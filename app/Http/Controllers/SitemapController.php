<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $chapters = Chapter::where('status', 'published')
            ->latest()
            ->get();

        return response()->view('pages.sitemap', [
            'chapters' => $chapters,
        ])->header('Content-Type', 'text/xml');
    }
}
