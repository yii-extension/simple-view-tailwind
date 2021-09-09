<?php

declare(strict_types=1);

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@root' => dirname(__DIR__, 2),
            '@assets' => '@root/tests/_data/public/assets',
            '@assetsUrl' => '/assets',
            '@npm' => '@root/node_modules',
            '@runtime' => '@root/tests/_data/runtime',
            '@simple-view-tailwind' => '@root',
        ]
    ],
];
