<?= $this->extend('layouts/site') ?>

<?= $this->section('content') ?>
<section class="content-section hero-section pt-0" id="top">
    <div class="hero-stage">

        <!-- First Hero Section -->
        <div class="container">
            <div class="hero-shell">
                <div class="row g-4 g-xl-5 align-items-center">
                    <div class="col-lg-6 hero-copy-column">
                        <div class="section-panel hero-panel">
                            <img src="<?= base_url('assets/images/iron-pdf-logo.png') ?>" alt="hero-logo" />
                            <h1 class="display-title"><?= esc($hero['headline'] ?? '') ?></h1>

                            <p class="hero-title"><?= esc($hero['title'] ?? '') ?></p>
                            <p class="hero-subtitle"><?= esc($hero['secondaryTitle'] ?? '') ?></p>
                            <p class="hero-text"><?= esc($hero['heroText'] ?? '') ?></p>
                        </div>
                    </div>

                    <div class="col-lg-6 hero-art-column">
                        <div class="hero-art-shell" aria-hidden="true">
                            <img class="hero-art-image" src="<?= base_url('assets/images/landing-bg.png') ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Hero Section -->
        <div class="sub-hero-panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 hero-copy-column">
                        <div class="sub-hero-copy">
                            <p class="sub-hero-title"><?= esc($subHero['title'] ?? '') ?></p>
                            <p class="sub-hero-subtitle"><?= esc($subHero['subTitle'] ?? '') ?></p>
                            <form class="sub-hero-form">
                                <label class="visually-hidden"
                                    for="email"><?= esc($subHero['signUpInputPlaceHolder'] ?? 'Enter email address') ?></label>
                                <input id="email" class="sub-hero-input" type="email" autocomplete="email"
                                    placeholder="<?= esc($subHero['signUpInputPlaceHolder'] ?? '') ?>">
                                <button id="signUpBtn" class="sub-hero-button" type="button">
                                    <?= esc($subHero['signUpBtnText'] ?? '') ?>
                                </button>
                            </form>
                            <div class="sub-hero-meta">
                                <span class="badge"><?= esc($subHero['badge'] ?? '') ?></span>
                                <span class="sub-hero-subtitle1"><?= esc($subHero['adText1'] ?? '') ?></span>
                                <span class="sub-hero-subtitle2"><?= esc($subHero['adText2'] ?? '') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section cpp-overview-section" id="products">
    <div class="cpp-overview-shell">
        <div class="container">
            <div class="cpp-overview-copy">
                <div class="cpp-overview-heading">
                    <h2 class="cpp-overview-title"><?= esc($productOverview['title'] ?? '') ?></h2>
                    <span class="cpp-overview-badge"><?= esc($productOverview['badge'] ?? '') ?></span>
                </div>

                <?php if (!empty($productOverview['features'])): ?>
                    <div class="cpp-overview-features" aria-label="Product highlights">
                        <?php foreach ($productOverview['features'] as $feature): ?>
                            <p class="cpp-overview-feature">
                                <span class="cpp-overview-feature__mark" aria-hidden="true">#</span>
                                <span><?= esc($feature) ?></span>
                            </p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="cpp-overview-body">
            <div class="container">
                <div class="cpp-overview-body-inner">
                    <?php foreach (($productOverview['paragraphs'] ?? []) as $paragraph): ?>
                        <p><?= esc($paragraph) ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section library-stack-section">
    <div class="library-stack-shell">
        <section class="library-stack-panel library-why-panel" id="about">
            <div class="container">
                <div class="row g-4 g-xl-5 align-items-center library-inner">
                    <div class="col-lg-4">
                        <div class="library-logo-wrap">
                            <img class="library-logo-image" src="<?= base_url('assets/images/library-logo.png') ?>"
                                alt="HTML to PDF in C++ library logo">
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="library-copy">
                            <h2 class="library-panel-title"><?= esc($librarySections['whyLibrary']['title'] ?? '') ?>
                            </h2>
                            <?php foreach (($librarySections['whyLibrary']['paragraphs'] ?? []) as $paragraph): ?>
                                <p class="library-panel-text"><?= esc($paragraph) ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="library-stack-panel library-access-panel" id="career">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="library-copy library-copy--wide">
                            <h2 class="library-panel-title"><?= esc($librarySections['earlyAccess']['title'] ?? '') ?>
                            </h2>
                            <?php foreach (($librarySections['earlyAccess']['paragraphs'] ?? []) as $paragraph): ?>
                                <p class="library-panel-text"><?= esc($paragraph) ?></p>
                            <?php endforeach; ?>

                            <?php if (!empty($librarySections['earlyAccess']['items'])): ?>
                                <div class="library-access-grid" aria-label="Library release timeline">
                                    <?php foreach ($librarySections['earlyAccess']['items'] as $item): ?>
                                        <article class="library-access-card">
                                            <span
                                                class="library-access-status library-access-status--<?= esc($item['statusType'] ?? 'coming') ?>">
                                                <?= esc($item['status'] ?? '') ?>
                                            </span>
                                            <div class="library-access-product">
                                                <span class="library-access-brand"><?= esc($item['product'] ?? '') ?></span>
                                                <span class="library-access-platform"><?= esc($item['platform'] ?? '') ?></span>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</section>

<?= $this->endSection() ?>
