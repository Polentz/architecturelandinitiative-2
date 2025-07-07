<?php if ($page->textblocks()->toBlocks()->count() >= 1) : ?>
    <section id="slider" class="slider">
        <div class="slider-wrapper">
            <button class="ui-button x-button" type="button">
                <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 8L20 20M20 20L32 32M20 20L32 8M20 20L8 32" stroke="#1d1d1b" />
                </svg>
            </button>
            <div class="slider-content">
                <?= $page->textblocks()->toBlocks() ?>
            </div>
        </div>
    </section>
<?php endif ?>