<?php

declare(strict_types=1);

use Simple\View\Tailwind\Handler\NotFoundHandler;
use Yiisoft\Definitions\DynamicReference;
use Yiisoft\Definitions\Reference;
use Yiisoft\ErrorHandler\Middleware\ErrorCatcher;
use Yiisoft\Middleware\Dispatcher\MiddlewareDispatcher;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Yii\Web\Application;

return [
    Application::class => [
        'class' => Application::class,
        '__construct()' => [
            'dispatcher' => DynamicReference::to(
                static fn(MiddlewareDispatcher $middlewareDispatcher) =>
                    $middlewareDispatcher->withMiddlewares(
                        [
                            Router::class,
                            SessionMiddleware::class,
                            ErrorCatcher::class,
                        ]
                    ),
            ),
            'fallbackHandler' => Reference::to(NotFoundHandler::class),
        ],
    ],
];
