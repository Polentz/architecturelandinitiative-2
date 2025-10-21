<?php
$current = $site->children()->listed()->findBy('isOpen', true);
$navigation = $site->children()->listed()->not('home');
?>

<header class="header">
    <nav class="header-nav">
        <button class="nav-mobile-opener" type="button">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 20H20M20 20H32M20 20L20 8M20 20L20 32" stroke="#1d1d1b" />
            </svg>
        </button>

        <?php foreach ($navigation as $page) : ?>
            <?= snippet('svg', ['page' => $page]) ?>
        <?php endforeach ?>
    </nav>
</header>

<div class="color-switcher text-label">
    <div class="color-switcher-wrapper">
        <input type="radio" name="color-mode" id="color-mode-bw" value="bw" checked>
        <label for="color-mode-bw">All black and white</label>
    </div>
    <div class="color-switcher-wrapper">
        <input type="radio" name="color-mode" id="color-mode-white" value="white">
        <label for="color-mode-white">White background</label>
    </div>
    <div class="color-switcher-wrapper">
        <input type="radio" name="color-mode" id="color-mode-color" value="color">
        <label for="color-mode-color">Colored background</label>
    </div>
    <button class="color-switcher-button" aria-label="Close">x</button>
</div>