<?php

declare(strict_types=1);

use Simple\View\Tailwind\Handler\NotFoundHandler;
use Simple\View\Tailwind\ViewInjection\ParametersViewInjection;
use Yiisoft\Definitions\Reference;
use Yiisoft\Yii\View\CsrfViewInjection;

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@simple-view-tailwind' => '@vendor/yii-extension/simple-view-tailwind',
            '@layout' => '@simple-view-tailwind/storage/layout',
        ]
    ],

    'yiisoft/yii/http' => [
        'notFoundHandler' => NotFoundHandler::class,
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
