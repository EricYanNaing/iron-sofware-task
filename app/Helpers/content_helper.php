<?php

if (! function_exists('content_href')) {
    function content_href(string $href): string
    {
        if ($href === '' || $href === '#') {
            return '#';
        }

        if (
            str_starts_with($href, '#')
            || str_starts_with($href, 'mailto:')
            || str_starts_with($href, 'http://')
            || str_starts_with($href, 'https://')
        ) {
            return $href;
        }

        if ($href === '/projects') {
            return url_to('projects.index');
        }

        return site_url(ltrim($href, '/'));
    }
}
