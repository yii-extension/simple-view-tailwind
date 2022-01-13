<?php

declare(strict_types=1);

namespace Simple\View\Tailwind\ViewInjection;

use Yiisoft\Assets\AssetManager;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\CommonParametersInjectionInterface;

final class CommonViewInjection implements CommonParametersInjectionInterface
{
    public function __construct(
        private AssetManager $assetManager,
        private CurrentRoute $currentRoute,
        private TranslatorInterface $translator,
        private UrlGeneratorInterface $urlGenerator
    )
    {
    }

    public function getCommonParameters(): array
    {
        return [
            'assetManager' => $this->assetManager,
            'currentRoute' => $this->currentRoute,
            'translator' => $this->translator,
            'urlGenerator' => $this->urlGenerator,
        ];
    }
}
