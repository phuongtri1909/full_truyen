<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Social;
use App\Models\Status;
use App\Models\Chapter;
use App\Models\Socials;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Calculate stats
        $stats = [
            'total_chapters' => Chapter::where('status', 'published')->count(),
            'total_views' => Chapter::sum('views'),
            'ratings' => [
                'count' => User::whereNotNull('rating')->count(),
                'average' => number_format(User::whereNotNull('rating')->avg('rating') ?? 0, 1)
            ]
        ];

        // Get story status
        $status = Status::first();

        // Share with all views
        View::share('stats', $stats);
        View::share('status', $status);
    }
}
