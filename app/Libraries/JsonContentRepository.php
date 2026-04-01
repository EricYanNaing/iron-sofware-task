<?php

namespace App\Libraries;

use JsonException;
use RuntimeException;

class JsonContentRepository
{
    private array $content = [];

    public function getContent(): array
    {
        if ($this->content !== []) {
            return $this->content;
        }

        $path = APPPATH . 'Data/site-content.json';

        if (! is_file($path)) {
            throw new RuntimeException('Content JSON file is missing.');
        }

        $json = file_get_contents($path);

        if ($json === false) {
            throw new RuntimeException('Unable to read the content JSON file.');
        }

        try {
            $decoded = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new RuntimeException('Content JSON is invalid.', 0, $exception);
        }

        if (! is_array($decoded)) {
            throw new RuntimeException('Content JSON must decode to an array.');
        }

        $this->content = $decoded;

        return $this->content;
    }

    public function allProjects(): array
    {
        return $this->getContent()['projects'] ?? [];
    }

    public function findProjectBySlug(string $slug): ?array
    {
        foreach ($this->allProjects() as $project) {
            if (($project['slug'] ?? '') === $slug) {
                return $project;
            }
        }

        return null;
    }
}
