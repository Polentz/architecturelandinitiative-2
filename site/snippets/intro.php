<section class="page-intro">
    <h2 class="title"><?= $page->title() ?></h2>
    <?php if ($page->intro()->isNotEmpty()) : ?>
        <div class="<?php if ($slots->aboutPage()) : ?>intro-text<?php else : ?>text<?php endif ?>">
            <?= $page->intro()->kt() ?>
        </div>
    <?php endif ?>
    <?php if ($slots->aboutPage()) : ?>
        <?php if ($page->text()->isNotEmpty()) : ?>
            <div class="text">
                <?= $page->text()->kt() ?>
            </div>
        <?php endif ?>
        <?php if ($page->textblocks()->toBlocks()->count() >= 1) : ?>
            <button id="slider" class="button" type="button">
                <span class="text-label">Read more</span>
                <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.808 14.76C20.04 14.76 19.44 14.16 19.44 13.392C19.44 12.6 20.04 12 20.808 12C21.6 12 22.2 12.6 22.2 13.392C22.2 14.16 21.6 14.76 20.808 14.76ZM19.608 24.216C19.272 25.8 20.016 26.832 21.312 26.832C22.608 26.832 23.616 25.824 24.72 23.28L25.68 23.76C24.432 26.544 23.136 27.984 21.264 27.984C19.224 27.984 18 26.304 18.456 24.168L19.536 19.08L19.128 18.552H15L15.216 17.472H21.024L19.608 24.216Z" fill="#1D1D1B" />
                    <path d="M32.5 7.5V32.5H7.5V7.5H32.5Z" stroke="#1d1d1b" />
                </svg>
            </button>
        <?php endif ?>
    <?php else : ?>
        <?php if ($page->textblocks()->toBlocks()->count() >= 1) : ?>
            <button id="slider" class="button" type="button">
                <span class="text-label">Read more</span>
                <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.808 14.76C20.04 14.76 19.44 14.16 19.44 13.392C19.44 12.6 20.04 12 20.808 12C21.6 12 22.2 12.6 22.2 13.392C22.2 14.16 21.6 14.76 20.808 14.76ZM19.608 24.216C19.272 25.8 20.016 26.832 21.312 26.832C22.608 26.832 23.616 25.824 24.72 23.28L25.68 23.76C24.432 26.544 23.136 27.984 21.264 27.984C19.224 27.984 18 26.304 18.456 24.168L19.536 19.08L19.128 18.552H15L15.216 17.472H21.024L19.608 24.216Z" fill="#1D1D1B" />
                    <path d="M32.5 7.5V32.5H7.5V7.5H32.5Z" stroke="#1d1d1b" />
                </svg>
            </button>
        <?php endif ?>
    <?php endif ?>
</section>