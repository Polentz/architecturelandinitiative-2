<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('architecturelandinitiative/blocks', [
  'blueprints' => [
    'blocks/textblock' => __DIR__ . '/blueprints/blocks/textblock.yml',
    'blocks/contactblock' => __DIR__ . '/blueprints/blocks/contactblock.yml',
    'blocks/tableblock' => __DIR__ . '/blueprints/blocks/tableblock.yml',
    'blocks/platformblock' => __DIR__ . '/blueprints/blocks/platformblock.yml',
  ],
  'snippets' => [
    'blocks/textblock' => __DIR__ . '/snippets/blocks/textblock.php',
    'blocks/contactblock' => __DIR__ . '/snippets/blocks/contactblock.php',
    'blocks/tableblock' => __DIR__ . '/snippets/blocks/tableblock.php',
    'blocks/platformblock' => __DIR__ . '/snippets/blocks/platformblock.php',
  ],
]);
