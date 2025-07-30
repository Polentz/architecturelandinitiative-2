<footer class="footer">
    <div class="footer-nav">
        <h1 class="logo">
            <a class="logo-word" href="<?= $site->page('home')->url() ?>">
                <span class="ignore">A</span>rchitecture <span class="ignore">L</span>and <span class="ignore">In</span>itiative
            </a>
        </h1>
        <div class="footer-nav-wrapper">
            <?php if ($site->toggleLang()->isTrue()) : ?>
                <div class="lang-list">
                    <?php foreach ($site->selectLanguages()->split() as $language) : ?>
                        <button class="lang-button<?php e($kirby->language() == $language, ' active') ?>" type="button">
                            <a href="<?= $page->url($language) ?>" hreflang="<?php echo $language ?>"><span class="text-label"><?= ucfirst($language) ?></span></a>
                        </button>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <button id="contact-opener" class="button" type="button">
                <span class="text-label"><?= $site->contactNavLabel() ?></span>
            </button>
            <button class="button" type="button">
                <a href="<?= $site->instagram()->url() ?>" target="_blank" rel="noopener noreferrer">
                    <?php if ($site->instagramIcon() == 'icon') : ?>
                        <span class="text-label">IG</span>
                    <?php elseif ($site->instagramIcon() == 'text') : ?>
                        <span class="text-label">Instagram</span>
                    <?php endif ?>
                </a>
            </button>
        </div>
    </div>
    <div id="contact" class="banner">
        <button class="ui-button x-button" type="button">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 8L20 20M20 20L32 32M20 20L32 8M20 20L8 32" stroke="#1d1d1b" />
            </svg>
        </button>
        <div class="banner-content">
            <?= $site->contactblocks()->toBlocks() ?>
        </div>
    </div>
</footer>