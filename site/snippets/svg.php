<a href="<?= $page->url() ?>" class="button <?= e($page->isOpen(), '--current') ?>" type="button">
    <span class="text-label"><?= $page->title() ?></span>
    <?php if ($page->intendedTemplate()->name() === 'projects') : ?>
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 7H33V11.3333H7V15.6667H33V20H7V24.3333H33V28.6667H7V33H33" stroke="#1D1D1B" />
        </svg>
    <?php elseif ($page->intendedTemplate()->name() === 'tools') : ?>
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 33L7 7L11.3333 7L11.3333 33L15.6667 33L15.6667 7L20 7L20 33L24.3333 33L24.3333 7L28.6667 7L28.6667 33L33 33L33 7" stroke="#1d1d1b" />
        </svg>
    <?php elseif ($page->intendedTemplate()->name() === 'timeline') : ?>
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 8H33" stroke="#1D1D1B" />
            <path d="M7 12H33" stroke="#1D1D1B" />
            <path d="M7 16H33" stroke="#1D1D1B" />
            <path d="M7 20H33" stroke="#1D1D1B" />
            <path d="M7 24H33" stroke="#1D1D1B" />
            <path d="M7 28H33" stroke="#1D1D1B" />
            <path d="M7 32H33" stroke="#1D1D1B" />
        </svg>
    <?php elseif ($page->intendedTemplate()->name() === 'about') : ?>
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 7.5C26.9036 7.5 32.5 13.0964 32.5 20C32.5 26.9036 26.9036 32.5 20 32.5C13.0964 32.5 7.5 26.9036 7.5 20C7.5 13.0964 13.0964 7.5 20 7.5Z" stroke="#1D1D1B" />
        </svg>
    <?php elseif ($page->intendedTemplate()->name() === 'home') : ?>
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M32.5 7.5V32.5H7.5V7.5H32.5Z" stroke="#1D1D1B" />
        </svg>
    <?php endif ?>
</a>