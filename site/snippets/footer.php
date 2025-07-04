<footer class="footer">
    <div class="footer-nav">
        <div class="footer-nav-wrapper">
            <h1 class="header-headline">
                <a class="logo" href="<?= $site->page('home')->url() ?>">
                    <span class="logo-word-1">Architecture</span>
                    <span class="logo-word-2">Land</span>
                    <span class="logo-word-3">INitiative</span>
                </a>
            </h1>
        </div>
        <div class="footer-nav-wrapper">
            <?php if ($site->toggleLang()->isTrue()) : ?>
                <ul class="footer-nav-wrapper">
                    <li class="lang-button"><a href="<?= $page->url($hrefEn) ?>" hreflang="<?= $hrefEn ?>"><?= $languageStringEn ?></a></li>
                    <li class="lang-button"><a href="<?= $page->url($hrefFr) ?>" hreflang="<?= $hrefFr ?>"><?= $languageStringFr ?></a></li>
                    <li class="lang-button"><a href="<?= $page->url($hrefDe) ?>" hreflang="<?= $hrefDe ?>"><?= $languageStringDe ?></a></li>
                </ul>
            <?php endif ?>
            <button id="contact-opener" class="button" type="button">
                <span class="text-label"><?= $site->contactNavLabel() ?></span>
            </button>
            <button class="button" type="button">
                <a href="<?= $site->instagram()->url() ?>" target="_blank" rel="noopener noreferrer"><span class="text-label">Instagram</span>
                    <!-- <svg style="width: var(--button-size)" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.7371 25.784L13.1211 26.168H17.1531V26.84H7.57715V26.168H11.6091L11.9931 25.784V14.216L11.6091 13.832H7.57715V13.16H17.1531V13.832H13.1211L12.7371 14.216V25.784Z" fill="#1D1D1B" />
                        <path d="M31.7033 26.84V25.52L31.3913 25.328C30.3593 26.384 29.0393 27.176 27.4553 27.176C23.9033 27.176 21.6473 24.056 21.6473 20C21.6473 15.944 23.9993 12.824 27.6953 12.824C29.6153 12.824 31.0793 13.688 32.2553 15.44L31.7273 15.944C30.7193 14.408 29.4953 13.544 27.6953 13.544C24.3593 13.544 22.3913 16.448 22.3913 20C22.3913 23.552 24.2633 26.456 27.4553 26.456C29.3993 26.456 30.6953 25.28 31.7033 23.888V20.744H27.2873V20.024H32.4233V26.84H31.7033Z" fill="#1D1D1B" />
                    </svg> -->
                </a>
            </button>
        </div>
    </div>
    <div id="contact" class="banner">
        <div class="banner-content">
            <?= $site->contactblocks()->toBlocks() ?>
        </div>
        <button class="button banner-button" type="button">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 8L20 20M20 20L32 32M20 20L32 8M20 20L8 32" stroke="#1d1d1b" />
            </svg>
        </button>
    </div>
</footer>