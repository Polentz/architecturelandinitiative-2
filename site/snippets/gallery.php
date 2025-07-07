<?php if ($media->type() == 'image') : ?>
    <figure class="gallery-item image-item" data-type="<?= $media->mediatype()->slug() ?>" data-category="<?= $media->filter()->slug() ?>" data-project="<?= $media->parent()->slug() ?>">
        <img class="image lazy" src="" data-src="<?= $media->resize(1200, null)->url() ?>" alt="<?= $media->alt() ?>" />
        <?= snippet('caption', ['media' => $media]) ?>
    </figure>
<?php endif ?>

<?php if ($media->type() == 'video') : ?>
    <figure class="gallery-item video-item" data-type="<?= $media->mediatype()->slug() ?>" data-category="<?= $media->filter()->slug() ?>" data-project="<?= $media->parent()->slug() ?>">
        <video src="<?= $media->url() ?>" autoplay muted loop controlslist="noplaybackrate nodownload" disablePictureInPicture type="video"></video>
        <?= snippet('caption', ['media' => $media]) ?>
    </figure>
<?php endif ?>

<?php if ($media->type() == 'audio') : ?>
    <figure class="gallery-item audio-item" data-type="<?= $media->mediatype()->slug() ?>" data-category="<?= $media->filter()->slug() ?>" data-project="<?= $media->parent()->slug() ?>">
        <div class="audio-player">
            <div class="audio-player-wrapper">
                <div class="audio-play button">
                    <svg class="play-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="39" height="39" />
                        <path d="M8.5 8.80902L30.882 20L8.5 31.191L8.5 8.80902Z" />
                    </svg>
                    <svg class="pause-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="39" height="39" />
                        <path d="M16 8L16 32M24 8L24 32" />
                    </svg>
                </div>
                <div class="audio-time">
                    <span class="audio-progress">0:00</span> / <span class="audio-duration"></span>
                </div>
                <div class="audio-volume button">
                    <svg class="volume-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="39" height="39" />
                        <path d="M15.5377 24.5991L15.4048 24.5H15.2389H8.43457V15.5H15.2389H15.4048L15.5377 15.4009L24.1302 8.9963V31.0037L15.5377 24.5991Z" />
                        <path d="M28.9346 16V24M32.065 14V26" />
                    </svg>
                    <svg class="mute-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="39" height="39" />
                        <path d="M15.6032 24.5991L15.4702 24.5H15.3043H8.5V15.5H15.3043H15.4702L15.6032 15.4009L24.1957 8.9963V31.0037L15.6032 24.5991Z" />
                        <path d="M32 18L28 22M32 22L28 18" />
                    </svg>
                </div>
            </div>
            <div class="audio-player-wrapper">
                <div class="seek-slider-container">
                    <input type="range" class="seek-slider" max="100" value="0">
                </div>
            </div>
            <audio src="<?= $media->url() ?>" controlslist="noplaybackrate nodownload" preload="metadata" type="audio"></audio>
        </div>
        <?= snippet('caption', ['media' => $media]) ?>
    </figure>
<?php endif ?>

<?php if ($media->type() == 'document') : ?>
    <figure class="gallery-item document-item" data-type="<?= $media->mediatype()->slug() ?>" data-category="<?= $media->filter()->slug() ?>" data-project="<?= $media->parent()->slug() ?>">
        <div class="pdf text-label">
            <?php if ($media->caption()->isNotEmpty()) : ?>
                <?= $media->caption()->kt() ?>
            <?php endif ?>
            <a href="<?= $media->url() ?>" target="_blank" rel="noopener noreferrer" class="button" type="button">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="39" height="39" stroke="#fff" />
                    <path d="M20 12.3636C20 11.2063 20.389 10.0964 21.0815 9.27808C21.7739 8.45974 22.713 8 23.6923 8H31.0769C31.3217 8 31.5565 8.11493 31.7296 8.31952C31.9027 8.52411 32 8.80158 32 9.09091V26.5455C32 26.8348 31.9027 27.1123 31.7296 27.3168C31.5565 27.5214 31.3217 27.6364 31.0769 27.6364H23.6923C22.713 27.6364 21.7739 28.0961 21.0815 28.9144C20.389 29.7328 20 30.8427 20 32M20 12.3636V32M20 12.3636C20 11.2063 19.611 10.0964 18.9185 9.27808C18.2261 8.45974 17.287 8 16.3077 8H8.92308C8.67826 8 8.44347 8.11493 8.27036 8.31952C8.09725 8.52411 8 8.80158 8 9.09091V26.5455C8 26.8348 8.09725 27.1123 8.27036 27.3168C8.44347 27.5214 8.67826 27.6364 8.92308 27.6364H16.3077C17.287 27.6364 18.2261 28.0961 18.9185 28.9144C19.611 29.7328 20 30.8427 20 32" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
        <?= snippet('caption', ['media' => $media]) ?>
    </figure>
<?php endif ?>