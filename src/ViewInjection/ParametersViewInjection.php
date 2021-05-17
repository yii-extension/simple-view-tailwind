<?php

declare(strict_types=1);

namespace Simple\View\Tailwind\ViewInjection;

use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\ContentParametersInjectionInterface;
use Yiisoft\Yii\View\LayoutParametersInjectionInterface;

final class ParametersViewInjection implements ContentParametersInjectionInterface, LayoutParametersInjectionInterface
{
    private Aliases $aliases;
    private AssetManager $assetManager;
    private TranslatorInterface $translator;
    private UrlGeneratorInterface $urlGenerator;
    private UrlMatcherInterface $urlMatcher;

    public function __construct(
        Aliases $aliases,
        AssetManager $assetManager,
        TranslatorInterface $translator,
        UrlGeneratorInterface $urlGenerator,
        UrlMatcherInterface $urlMatcher
    ) {
        $this->aliases = $aliases;
        $this->assetManager = $assetManager;
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
        $this->urlMatcher = $urlMatcher;
    }

    public function getContentParameters(): array
    {
        return [
            'assetManager' => $this->assetManager,
            'translator' => $this->translator,
            'urlGenerator' => $this->urlGenerator,
            'urlMatcher' => $this->urlMatcher,
        ];
    }

    public function getLayoutParameters(): array
    {
        return [
            'aliases' => $this->aliases,
            'assetManager' => $this->assetManager,
            'translator' => $this->translator,
            'urlGenerator' => $this->urlGenerator,
            'urlMatcher' => $this->urlMatcher,
        ];
    }
}
