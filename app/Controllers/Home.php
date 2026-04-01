<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $content = $this->contentRepository->getContent();

        return view(
            'pages/home',
            array_merge(
                $this->sharedPageData($content, $content['meta']['home'] ?? [], true),
                [
                    'bodyClass'       => 'page-home',
                    'hero'            => $content['hero'] ?? [],
                    'productOverview' => $content['productOverview'] ?? [],
                    'subHero'         => $content['subHero'] ?? [],
                ],
            ),
        );
    }
}
