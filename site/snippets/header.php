<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A&emsp;&emsp;&emsp;&emsp;L&emsp;&emsp;IN</title>
    <meta name="description"
        content="<?= $site->description() ?>">
    <link rel="canonical" href="<?= $page->url() ?>">
    <meta name="keywords"
        content="<?= $site->keywords() ?>">
    <meta property="og:locale" content="<?= $langCode ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $site->title()?>">
    <meta property="og:description"
        content="<?= $site->description() ?>">
    <meta property="og:url" content="<?= $page->url() ?>">
    <meta property="og:site_name" content="<?= $site->title()?>">
    <?php if ($site->ogimage()->isNotEmpty()) : ?>
        <meta property="og:image" content="<?= $site->ogimage()->toFile()->url() ?>">
        <meta property="og:image:alt" content="<?= $site->ogimage()->toFile()->alt() ?>">
    <?php endif ?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description"
        content="<?= $site->description() ?>">
    <meta name="twitter:title"
        content="<?= $site->title()?>">
    <?php if ($site->ogimage()->isNotEmpty()) : ?>
        <meta name="twitter:image:alt" content="<?= $site->ogimage()->toFile()->alt() ?>">
    <?php endif ?>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <?= css ([
        'assets/css/base.css',
        'assets/css/style.css',
        '@auto',
    ]) ?>
</head>
<body>
    <header class="header">
        <h1 class="header-headline">
            <a class="logo" href="<?= $site->page('home')->url() ?>">
                <span class="logo-word-1">Architecture</span>
                <span class="logo-word-2">Land</span>
                <span class="logo-word-3">INitiative</span>
            </a>
            <?php if (!$page->isHomePage()) : ?>
                <span class="logo-element text-label"><?= $page->title() ?></span>
            <?php endif ?>
        </h1>
        <nav class="header-button-wrapper">
            <?php if ($slots->pathsHeader()): ?>
                <?php foreach ($site->children()->filterby('intendedTemplate', 'projects') as $projects) : ?>
                    <a href="<?= $projects->url() ?>" class="button --current <?= e($projects->isOpen(), '--current') ?>" type="button">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 33L7 7L11.3333 7L11.3333 33L15.6667 33L15.6667 7L20 7L20 33L24.3333 33L24.3333 7L28.6667 7L28.6667 33L33 33L33 7" stroke="#1d1d1b"/>
                        </svg>
                        <span class="text-label"><?= $projects->title() ?></span>
                    </a>
                <?php endforeach ?>

                <?php foreach ($site->children()->filterby('intendedTemplate', 'tools') as $tools) : ?>
                    <a href="<?= $tools->url() ?>" class="button --current <?= e($tools->isOpen(), '--current') ?>" type="button">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="7.5" y="32.5" width="25" height="25" transform="rotate(-90 7.5 32.5)" stroke="#1d1d1b"/>
                        </svg>
                        <span class="text-label"><?= $tools->title() ?></span>
                    </a>
                <?php endforeach ?>
                <?php foreach ($site->children()->filterby('intendedTemplate', 'themes') as $themes) : ?>
                    <a href="<?= $themes->url() ?>" class="button --current <?= e($themes->isOpen(), '--current') ?>" type="button">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="39" height="39"/>
                            <path d="M7 8H33M7 12H33M7 16H33M7 20H33M7 24H33M7 28H33M7 32H33" stroke="#1d1d1b"/>
                        </svg>
                        <span class="text-label"><?= $themes->title() ?></span>
                    </a>
                <?php endforeach ?>
                <?php foreach ($site->children()->filterby('intendedTemplate', 'themes') as $themes) : ?>
                    <button id="about-opener" class="button --current <?= e($themes->isOpen(), '') ?>" type="button">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="39" height="39"/>
                            <circle cx="20" cy="20" r="12.5" stroke="#1d1d1b"/>
                        </svg>
                        <span class="text-label">Cooperative</span>
                    </button>
                <?php endforeach ?>
            <?php endif ?>

            <?php if ($slots->defaultHeader()): ?>
                <?php foreach ($site->children()->filterby('intendedTemplate', 'projects') as $projects) : ?>
                    <a href="<?= $projects->url() ?>" class="button" type="button">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 33L7 7L11.3333 7L11.3333 33L15.6667 33L15.6667 7L20 7L20 33L24.3333 33L24.3333 7L28.6667 7L28.6667 33L33 33L33 7" stroke="#1d1d1b"/>
                        </svg>
                        <span class="text-label"><?= $projects->title() ?></span>
                    </a>
                <?php endforeach ?>
                <?php foreach ($site->children()->filterby('intendedTemplate', 'tools') as $tools) : ?>
                    <a href="<?= $tools->url() ?>" class="button" type="button">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="7.5" y="32.5" width="25" height="25" transform="rotate(-90 7.5 32.5)" stroke="#1d1d1b"/>
                        </svg>
                        <span class="text-label"><?= $tools->title() ?></span>
                    </a>
                <?php endforeach ?>
                <?php foreach ($site->children()->filterby('intendedTemplate', 'themes') as $themes) : ?>
                    <a href="<?= $themes->url() ?>" class="button" type="button">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="39" height="39"/>
                            <path d="M7 8H33M7 12H33M7 16H33M7 20H33M7 24H33M7 28H33M7 32H33" stroke="#1d1d1b"/>
                        </svg>
                        <span class="text-label"><?= $themes->title() ?></span>
                    </a>
                <?php endforeach ?>
            <?php endif ?>
        </nav>
    </header>