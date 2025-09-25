<?php

return function ($page) {

    $galleryFiles = $page->gallery()->toFiles();

    // Collect non-empty categories
    $categories = [];
    foreach ($galleryFiles as $file) {
        $category = $file->category();
        if ($category->isNotEmpty()) {
            $categories[] = $category;
        }
    }
    // Remove duplicates
    $categories = array_unique($categories);

    return [
        'galleryFiles' => $galleryFiles,
        'categories' => $categories,
    ];
};
