<?php

declare(strict_types=1);

namespace Simple\View\Tailwind\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Yiisoft\Http\Status;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\ViewRenderer;

final class NotFoundHandler implements RequestHandlerInterface
{
    public function __construct(
        private CurrentRoute $currentRoute,
        private TranslatorInterface $translator,
        private UrlGeneratorInterface $urlGenerator,
        private ViewRenderer $viewRenderer
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->viewRenderer
            ->withViewPath('@simple-view-tailwind/views')
            ->render(
                'site/404',
                [
                    'currentRoute' => $this->currentRoute,
                    'urlGenerator' => $this->urlGenerator,
                    'translator' => $this->translator,
                ],
            )
            ->withStatus(Status::NOT_FOUND);
    }
}
