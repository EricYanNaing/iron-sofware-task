<?= $this->extend('layouts/site') ?>

<?= $this->section('content') ?>
<section class="content-section page-hero">
    <div class="container">
        <div class="section-panel page-hero__panel">
            <nav aria-label="Breadcrumb" class="breadcrumb-nav">
                <a href="<?= url_to('home') ?>">Home</a>
                <span>/</span>
                <a href="<?= url_to('projects.index') ?>">Projects</a>
                <span>/</span>
                <span aria-current="page"><?= esc($project['title'] ?? '') ?></span>
            </nav>

            <div class="row g-4 align-items-start">
                <div class="col-lg-8">
                    <p class="eyebrow mb-3"><?= esc(($project['type'] ?? '') . ' / ' . ($project['year'] ?? '')) ?></p>
                    <h1 class="page-title mb-3"><?= esc($project['title'] ?? '') ?></h1>
                    <p class="section-text page-hero__text mb-4"><?= esc($project['description'] ?? '') ?></p>

                    <?php if (! empty($project['stack'])): ?>
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ($project['stack'] as $item): ?>
                                <span class="skill-chip"><?= esc($item) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-4">
                    <aside class="metric-card h-100">
                        <span class="metric-card__label">Project note</span>
                        <p class="metric-card__value mb-0"><?= esc($project['note'] ?? '') ?></p>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section pt-0">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <article class="section-panel h-100">
                    <p class="eyebrow mb-3">Deliverables</p>
                    <ul class="detail-list mb-0">
                        <?php foreach (($project['deliverables'] ?? []) as $item): ?>
                            <li><?= esc($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </div>

            <div class="col-lg-6">
                <article class="section-panel h-100">
                    <p class="eyebrow mb-3">Highlights</p>
                    <ul class="detail-list mb-0">
                        <?php foreach (($project['highlights'] ?? []) as $item): ?>
                            <li><?= esc($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </div>
        </div>

        <div class="section-panel cta-panel mt-4">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                <div>
                    <p class="eyebrow mb-2">Next step</p>
                    <h2 class="section-title mb-2">Want this level of structure inside a real product build?</h2>
                    <p class="section-text mb-0">This sample keeps the content model simple, but the routing and view structure are ready to extend.</p>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a class="btn btn-brand rounded-pill px-4" href="<?= esc(content_href($contact['primaryCta']['href'] ?? '#')) ?>">
                        <?= esc($contact['primaryCta']['label'] ?? 'Email') ?>
                    </a>
                    <a class="btn btn-outline-brand rounded-pill px-4" href="<?= url_to('projects.index') ?>">
                        Back to projects
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
