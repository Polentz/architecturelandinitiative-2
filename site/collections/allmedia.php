<?php

return function ($pages) {
    return $pages->children()->files()->template('media');
};