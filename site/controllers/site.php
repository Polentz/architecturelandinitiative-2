<?php

return function ($kirby, $page) {
    if ($kirby->language()->code() == 'en') {
        $lang = 'en';
        $langCode = 'en_US';
        $type = 'TYPE';
        $project = 'PROJECT';
        $where = 'WHERE';
        $members = 'MEMBERS';
    } else if ($kirby->language()->code() == 'fr') {
        $lang = 'fr';
        $langCode = 'fr_FR';
        $type = 'TYPE';
        $project = 'PROJET';
        $where = 'OÙ';
        $members = 'MEMBRES';
    } else if ($kirby->language()->code() == 'de') {
        $lang = 'de';
        $langCode = 'de_DE';
        $type = 'ART';
        $project = 'PROJEKT';
        $where = 'ORT';
        $members = 'MITGLIEDER';
    }

    $languageStringEn = 'En';
    $languageStringFr = 'Fr';
    $languageStringDe = 'De';
    $hrefEn = '/';
    $hrefFr = 'fr';
    $hrefDe = 'de';

    $allmedia = $kirby->collection('allmedia'); 

    return [
        'lang' => $lang,
        'langCode' => $langCode,
        'type' => $type,
        'project' => $project,
        'where' => $where,
        'members' => $members,
        'languageStringEn' => $languageStringEn,
        'languageStringFr' => $languageStringFr,
        'languageStringDe' => $languageStringDe,
        'hrefEn' => $hrefEn,
        'hrefFr' => $hrefFr,
        'hrefDe' => $hrefDe,
        'allmedia' => $allmedia,
    ];
};