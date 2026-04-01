<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($meta['title'] ?? ($site['brand'] ?? 'Portfolio')) ?></title>
    <meta name="description" content="<?= esc($meta['description'] ?? '') ?>">
    <meta name="theme-color" content="#103b36">
    <link rel="canonical" href="<?= esc(current_url()) ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= esc($meta['title'] ?? ($site['brand'] ?? 'Portfolio')) ?>">
    <meta property="og:description" content="<?= esc($meta['description'] ?? '') ?>">
    <meta property="og:url" content="<?= esc(current_url()) ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/5.3.8/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/site.css') ?>">
    <?= $this->renderSection('head') ?>
</head>

<body class="<?= esc($bodyClass ?? '') ?>">
    <a class="skip-link" href="#main-content">Skip to content</a>

    <header class="site-header" data-site-header>
        <div class="site-header__inner">
            <nav class="navbar navbar-expand-lg site-navbar" aria-label="Primary">
                <a class="navbar-brand brand-mark" href="<?= url_to('home') ?>">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="logo" />
                </a>

                <button class="navbar-toggler site-navbar__toggle" type="button" data-bs-toggle="collapse"
                    data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-start" id="primaryNav">
                    <ul class="navbar-nav align-items-lg-center gap-lg-2 me-lg-3">
                        <?php $isProjectsPath = $currentPath === '/projects' || str_starts_with($currentPath, '/projects/'); ?>
                        <?php foreach ($navigation as $item): ?>
                            <?php
                            $children = $item['children'] ?? [];
                            $href = $item['href'] ?? '#';

                            $buildNavLink = static function (string $href, bool $isHomePage): string {
                                if ($href === '' || $href === '#') {
                                    return '#';
                                }

                                if (str_starts_with($href, '#')) {
                                    return $isHomePage ? $href : url_to('home') . $href;
                                }

                                if ($href === '/projects') {
                                    return url_to('projects.index');
                                }

                                return site_url(ltrim($href, '/'));
                            };

                            $hasChildren = $children !== [];
                            $link = $buildNavLink($href, $isHomePage);
                            $childProjectLinks = array_filter(
                                $children,
                                static fn(array $child): bool => ($child['href'] ?? '') === '/projects',
                            );
                            $isActive = (! $hasChildren && $href === '/projects' && $isProjectsPath)
                                || ($hasChildren && $isProjectsPath && $childProjectLinks !== []);

                            if ($hasChildren) {
                                $menuId = 'navDropdown' . md5((string) ($item['label'] ?? 'menu'));
                            }
                            ?>
                            <?php if ($hasChildren): ?>
                                <li class="nav-item dropdown">
                                    <a
                                        class="nav-link site-nav__link dropdown-toggle<?= $isActive ? ' is-current' : '' ?>"
                                        href="#"
                                        id="<?= esc($menuId) ?>"
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <?= esc($item['label'] ?? '') ?>
                                    </a>
                                    <ul class="dropdown-menu site-dropdown-menu" aria-labelledby="<?= esc($menuId) ?>">
                                        <?php foreach ($children as $child): ?>
                                            <?php
                                            $childHref = $child['href'] ?? '#';
                                            $childLink = $buildNavLink($childHref, $isHomePage);
                                            $childIsActive = $childHref === '/projects' && $isProjectsPath;
                                            ?>
                                            <li>
                                                <a
                                                    class="dropdown-item site-dropdown-item<?= $childIsActive ? ' is-current' : '' ?>"
                                                    href="<?= esc($childLink) ?>"
                                                    <?= $childIsActive ? 'aria-current="page"' : '' ?>
                                                >
                                                    <?= esc($child['label'] ?? '') ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link site-nav__link<?= $isActive ? ' is-current' : '' ?>"
                                        href="<?= esc($link) ?>" data-nav-link <?= $isActive ? 'aria-current="page"' : '' ?>>
                                        <?= esc($item['label'] ?? '') ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main id="main-content">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="site-footer">
        <section class="library-stack-panel library-beta-panel">
            <div class="container">
                <div class="library-beta-copy">
                    <h2 class="library-panel-title library-panel-title--center">
                        <?= esc($librarySections['betaProgram']['title'] ?? '') ?>
                    </h2>

                    <form class="sub-hero-form library-beta-form">
                        <label class="visually-hidden" for="beta-email">
                            <?= esc($librarySections['betaProgram']['inputPlaceholder'] ?? 'Enter email address') ?>
                        </label>
                        <input id="beta-email" class="sub-hero-input" type="email" autocomplete="email"
                            placeholder="<?= esc($librarySections['betaProgram']['inputPlaceholder'] ?? '') ?>">
                        <button class="sub-hero-button" type="button">
                            <?= esc($librarySections['betaProgram']['buttonText'] ?? '') ?>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </footer>

    <script src="<?= base_url('assets/vendor/bootstrap/5.3.8/bootstrap.bundle.min.js') ?>" defer></script>
    <script src="<?= base_url('assets/js/site.js') ?>" defer></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>
