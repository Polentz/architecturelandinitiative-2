<!DOCTYPE html>
<html lang="<?= $kirby->language() ?>">

<head>
    <script>document.documentElement.classList.add("js")</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A&emsp;&emsp;&emsp;&emsp;L&emsp;&emsp;IN</title>
    <meta name="description"
        content="<?= $site->description() ?>">
    <link rel="canonical" href="<?= $page->url() ?>">
    <meta name="keywords"
        content="<?= $site->keywords() ?>">
    <meta property="og:locale" content="<?= $kirby->language()->code() ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $site->title() ?>">
    <meta property="og:description"
        content="<?= $site->description() ?>">
    <meta property="og:url" content="<?= $page->url() ?>">
    <meta property="og:site_name" content="<?= $site->title() ?>">
    <?php if ($site->ogimage()->isNotEmpty()) : ?>
        <meta property="og:image" content="<?= $site->ogimage()->toFile()->url() ?>">
        <meta property="og:image:alt" content="<?= $site->ogimage()->toFile()->alt() ?>">
    <?php endif ?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description"
        content="<?= $site->description() ?>">
    <meta name="twitter:title"
        content="<?= $site->title() ?>">
    <?php if ($site->ogimage()->isNotEmpty()) : ?>
        <meta name="twitter:image:alt" content="<?= $site->ogimage()->toFile()->alt() ?>">
    <?php endif ?>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <?= css([
        'assets/css/variables.css',
        'assets/css/base.css',
        'assets/css/style.css',
        '@auto',
    ]) ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/Flip.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/SplitText.min.js" defer></script>
    <?= js([
        'assets/js/script.js',
        '@auto',
    ], ['defer' => true]) ?>
</head>

<body>
    <div class="loader"></div>