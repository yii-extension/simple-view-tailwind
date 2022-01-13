<?php

declare(strict_types=1);

use Simple\View\Tailwind\Handler\NotFoundHandler;
use Simple\View\Tailwind\ViewInjection\CommonViewInjection;
use Simple\View\Tailwind\ViewInjection\LayoutViewInjection;
use Yiisoft\Definitions\Reference;
use Yiisoft\Yii\View\CsrfViewInjection;

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@simple-view-tailwind' => '@vendor/yii-extension/simple-view-tailwind',
            '@layout' => '@simple-view-tailwind/views/layout',
        ]
    ],

    'yiisoft/yii/http' => [
        'notFoundHandler' => NotFoundHandler::class,
    ],

    'yiisoft/yii-view' => [
        'injections' => [
            Reference::to(CommonViewInjection::class),
            Reference::to(CsrfViewInjection::class),
            Reference::to(LayoutViewInjection::class),
        ],
    ],

    'yiisoft/translator' => [
        'categorySources' => [
            Reference::to('categorySourceSimpleViewTailwind'),
        ],
    ],
];
