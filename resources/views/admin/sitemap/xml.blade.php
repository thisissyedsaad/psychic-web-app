@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ $domain }}/sitemap.xml</loc>
        <changefreq>{{ strtolower($settings->home_frequency) }}</changefreq>
        <priority>{{ $settings->home_priority }}</priority>
    </url>
    <url>
        <loc>{{ $domain }}/static-page</loc>
        <changefreq>{{ strtolower($settings->static_frequency) }}</changefreq>
        <priority>{{ $settings->static_priority }}</priority>
    </url>
</urlset>