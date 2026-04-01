<article class="project-card section-panel h-100 position-relative">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-3">
        <span class="pill-tag"><?= esc($project['type'] ?? '') ?></span>
        <span class="project-card__year"><?= esc($project['year'] ?? '') ?></span>
    </div>

    <h3 class="project-card__title"><?= esc($project['title'] ?? '') ?></h3>
    <p class="project-card__summary"><?= esc($project['summary'] ?? '') ?></p>

    <?php if (! empty($project['stack'])): ?>
        <div class="d-flex flex-wrap gap-2 mb-4" aria-label="<?= esc(($project['title'] ?? 'Project') . ' technology stack') ?>">
            <?php foreach ($project['stack'] as $item): ?>
                <span class="skill-chip"><?= esc($item) ?></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (! empty($project['note'])): ?>
        <p class="project-card__note"><?= esc($project['note']) ?></p>
    <?php endif; ?>

    <a class="stretched-link project-card__link" href="<?= url_to('projects.show', $project['slug'] ?? '') ?>">
        View case summary
    </a>
</article>
