<?php

declare(strict_types=1);

namespace Simple\View\Tailwind\Asset;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

final class SimpleViewTailwindAsset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@simple-view-tailwind/storage';

    public array $js = [
        'asset/simple-view-tailwind.js',
    ];

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = ['filter' => $pathMatcher->only('**asset/simple-view-tailwind.js')];
    }
}
