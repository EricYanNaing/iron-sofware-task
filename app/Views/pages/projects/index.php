<?= $this->extend('layouts/site') ?>

<?= $this->section('content') ?>
<section class="content-section page-hero">
    <div class="container">
        <div class="section-panel page-hero__panel">
            <nav aria-label="Breadcrumb" class="breadcrumb-nav">
                <a href="<?= url_to('home') ?>">Home</a>
                <span>/</span>
                <span aria-current="page">Projects</span>
            </nav>

            <p class="eyebrow mb-3"><?= esc($sections['projectsIndex']['eyebrow'] ?? '') ?></p>
            <h1 class="page-title mb-3"><?= esc($sections['projectsIndex']['title'] ?? '') ?></h1>
            <p class="section-text page-hero__text mb-0"><?= esc($sections['projectsIndex']['text'] ?? '') ?></p>
        </div>
    </div>
</section>

<section class="content-section pt-0">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($projects as $project): ?>
                <div class="col-lg-4">
                    <?= view('partials/project_card', ['project' => $project]) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
