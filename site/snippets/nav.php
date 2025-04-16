<nav class="nav">
    <button class="button mobile-menu-button" type="button">
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 20H20M20 20H32M20 20L20 8M20 20L20 32" stroke="#1d1d1b"/>
        </svg>
    </button> 
    <ul class="nav-menu lang">
        <li class="menu-element"><a href="<?= $page->url($hrefEn) ?>" hreflang="<?= $hrefEn ?>"><?= $languageStringEn ?></a></li>
        <li class="menu-element"><a href="<?= $page->url($hrefFr) ?>" hreflang="<?= $hrefFr ?>"><?= $languageStringFr ?></a></li>
        <li class="menu-element"><a href="<?= $page->url($hrefDe) ?>" hreflang="<?= $hrefDe ?>"><?= $languageStringDe ?></a></li>
    </ul>
    <ul class="nav-menu menu">
        <!-- <li id="about-opener" class="menu-element"><?= $site->aboutNavLabel() ?></li> -->
            <!-- <?php foreach($pages->template('timeline')->listed() as $page) : ?>
                <li class="menu-element <?= e($page->isOpen(), '--current') ?>"><a href="<?= $page->url() ?>"><?= $page->title() ?></a></li>
            <?php endforeach ?>  -->
        <li id="contact-opener" class="menu-element"><?= $site->contactNavLabel() ?></li>   
    </ul>
</nav>

