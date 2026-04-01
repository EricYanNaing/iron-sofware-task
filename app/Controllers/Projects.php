<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Projects extends BaseController
{
    public function index(): string
    {
        $content = $this->contentRepository->getContent();

        return view(
            'pages/projects/index',
            array_merge(
                $this->sharedPageData($content, $content['meta']['projects'] ?? []),
                [
                    'bodyClass' => 'page-projects',
                    'projects'  => $this->contentRepository->allProjects(),
                ],
            ),
        );
    }

    public function show(string $slug): string
    {
        $content = $this->contentRepository->getContent();
        $project = $this->contentRepository->findProjectBySlug($slug);

        if ($project === null) {
            throw PageNotFoundException::forPageNotFound("Project '{$slug}' was not found.");
        }

        return view(
            'pages/projects/show',
            array_merge(
                $this->sharedPageData(
                    $content,
                    [
                        'title'       => $project['title'] . ' | ' . ($content['site']['brand'] ?? 'Project'),
                        'description' => $project['summary'] ?? '',
                    ],
                ),
                [
                    'bodyClass' => 'page-project-detail',
                    'project'   => $project,
                ],
            ),
        );
    }
}
