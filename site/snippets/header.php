<?php
$current = $site->children()->listed()->findBy('isOpen', true);
$navigation = $site->children()->listed()->not($current);
?>

<header class="header">
    <div class="header-current">
        <?= snippet('svg', ['page' => $current]) ?>
    </div>

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