<?php

declare(strict_types=1);

use Simple\View\Tailwind\ViewInjection\ParametersViewInjection;
use Yiisoft\Factory\Definition\Reference;
use Yiisoft\Yii\View\CsrfViewInjection;

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@simple-view-tailwind' => '@vendor/yii-extension/simple-view-tailwind',
            '@layout' => '@simple-view-tailwind/storage/layout',
        ]
    ],

    'yiisoft/yii-view' => [
        'injections' => [
            Reference::to(CsrfViewInjection::class),
            Reference::to(ParametersViewInjection::class),
        ],
    ],

    'yiisoft/translator' => [
        'categorySources' => [
            Reference::to('categorySourceSimpleViewTailwind'),
        ],
    ],
];
