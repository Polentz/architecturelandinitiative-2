<?php

return function ($page) {

    $galleryFiles = $page->gallery()->toFiles();

    $categories = [];
    foreach ($galleryFiles as $file) {
        $category = $file->category();
        if ($category->isNotEmpty()) {
            $categories[] = $category;
        }
    }
    $categories = array_unique($categories);

    $structureMap = [
        'category'  => site()->categories()->toStructure(),
        'mediatype' => site()->mediatypes()->toStructure(),
        'itemtype'  => site()->itemtypes()->toStructure(),
        'members'   => site()->members()->toStructure(),
    ];

    return [
        'galleryFiles' => $galleryFiles,
        'categories' => $categories,
        'structureMap' => $structureMap
    ];
};
