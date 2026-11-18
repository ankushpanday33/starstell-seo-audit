<?php

// Add to routes/web.php. Serves /sitemap-astrologers.xml with one URL per live profile.
// Then list it in sitemap.xml as a sitemap index entry and add this line to robots.txt:
//   Sitemap: https://starstell.com/sitemap-astrologers.xml

use Illuminate\Support\Facades\Route;

Route::get('/sitemap-astrologers.xml', function () {
    // Replace Astrologer::query() with your real model and "active" scope.
    $rows = \App\Models\Astrologer::query()
        ->where('is_active', 1)
        ->get(['slug', 'updated_at']);

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($rows as $r) {
        $xml .= '  <url><loc>https://starstell.com/best-astrologer/' . e($r->slug) . '</loc>'
              . '<lastmod>' . $r->updated_at->toAtomString() . '</lastmod></url>' . "\n";
    }
    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'application/xml');
});
