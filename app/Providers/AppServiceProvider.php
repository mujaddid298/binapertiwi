<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\OpenBlock;
use App\Models\Meeting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;

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
        View::composer('layouts.admin.partials.header', function ($view) {
            // Ambil notifikasi OpenBlock
            $openBlocks = OpenBlock::where('status_pkps', 'pending')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
                ->map(function($item) {
                    return [
                        'type' => 'openblock',
                        'title' => 'Pengajuan Open Block',
                        'message' => "Pengajuan Open Block oleh <b>" . ($item->customer->nama ?? 'Customer') . "</b> menunggu persetujuan.",
                        'time' => $item->created_at,
                        'link' => route('openblock.show', $item->id), // sesuaikan dengan route detail
                    ];
                });

            // Ambil notifikasi Meeting
            $meetings = Meeting::where('tanggal', '>=', now())
                ->orderBy('tanggal', 'asc')
                ->take(5)
                ->get()
                ->map(function($item) {
                    return [
                        'type' => 'meeting',
                        'title' => 'Meeting',
                        'message' => "<b>{$item->judul}</b> akan segera dimulai.",
                        'time' => $item->tanggal,
                        'link' => $item->link,
                    ];
                });

            // Gabungkan dan urutkan berdasarkan waktu terbaru
            $notifications = $openBlocks->concat($meetings)
                ->sortByDesc('time')
                ->take(5); // ambil 5 notifikasi terbaru dari gabungan

            $view->with('notifications', $notifications);
        });
        View::composer('layouts.bc.partials.header', function ($view) {
            // Ambil notifikasi OpenBlock
            $openBlocks = OpenBlock::where('status_pkps', 'pending')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
                ->map(function($item) {
                    return [
                        'type' => 'openblock',
                        'title' => 'Pengajuan Open Block',
                        'message' => "Pengajuan Open Block oleh <b>" . ($item->customer->nama ?? 'Customer') . "</b> menunggu persetujuan.",
                        'time' => $item->created_at,
                        'link' => route('openblock.show', $item->id), // sesuaikan dengan route detail
                    ];
                });

            // Ambil notifikasi Meeting
            $meetings = Meeting::where('tanggal', '>=', now())
                ->orderBy('tanggal', 'asc')
                ->take(5)
                ->get()
                ->map(function($item) {
                    return [
                        'type' => 'meeting',
                        'title' => 'Meeting',
                        'message' => "<b>{$item->judul}</b> akan segera dimulai.",
                        'time' => $item->tanggal,
                        'link' => $item->link,
                    ];
                });

            // Gabungkan dan urutkan berdasarkan waktu terbaru
            $notifications = $openBlocks->concat($meetings)
                ->sortByDesc('time')
                ->take(5); // ambil 5 notifikasi terbaru dari gabungan

            $view->with('notifications', $notifications);
        });
        View::composer('layouts.komite.partials.header', function ($view) {
            // Ambil notifikasi OpenBlock
            $openBlocks = OpenBlock::where('status_pkps', 'pending')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
                ->map(function($item) {
                    return [
                        'type' => 'openblock',
                        'title' => 'Pengajuan Open Block',
                        'message' => "Pengajuan Open Block oleh <b>" . ($item->customer->nama ?? 'Customer') . "</b> menunggu persetujuan.",
                        'time' => $item->created_at,
                        'link' => route('openblock.show', $item->id), // sesuaikan dengan route detail
                    ];
                });

            // Ambil notifikasi Meeting
            $meetings = Meeting::where('tanggal', '>=', now())
                ->orderBy('tanggal', 'asc')
                ->take(5)
                ->get()
                ->map(function($item) {
                    return [
                        'type' => 'meeting',
                        'title' => 'Meeting',
                        'message' => "<b>{$item->judul}</b> akan segera dimulai.",
                        'time' => $item->tanggal,
                        'link' => $item->link,
                    ];
                });

            // Gabungkan dan urutkan berdasarkan waktu terbaru
            $notifications = $openBlocks->concat($meetings)
                ->sortByDesc('time')
                ->take(5); // ambil 5 notifikasi terbaru dari gabungan

            $view->with('notifications', $notifications);
        });
    }
}
