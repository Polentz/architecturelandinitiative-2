<?php
Kirby::plugin('architecturelandinitiative/blocks', [
    'blueprints' => [
        'blocks/sectionblock' => __DIR__ . '/blueprints/blocks/sectionblock.yml',
        'blocks/contactblock' => __DIR__ . '/blueprints/blocks/contactblock.yml',
        'blocks/timelineblock' => __DIR__ . '/blueprints/blocks/timelineblock.yml',
        'blocks/platformblock' => __DIR__ . '/blueprints/blocks/platformblock.yml',
      ],
      'snippets' => [
        'blocks/sectionblock' => __DIR__ . '/snippets/blocks/sectionblock.php',
        'blocks/contactblock' => __DIR__ . '/snippets/blocks/contactblock.php',
        'blocks/timelineblock' => __DIR__ . '/snippets/blocks/timelineblock.php',
        'blocks/platformblock' => __DIR__ . '/snippets/blocks/platformblock.php',
      ],
]);