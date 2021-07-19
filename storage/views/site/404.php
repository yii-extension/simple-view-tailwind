<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;

/**
 * @var UrlGeneratorInterface $urlGenerator
 * @var UrlMatcherInterface $urlMatcher
 */

$this->setTitle('404');
?>

<div class="justify-center">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
        <div class="border-t border-gray-200 text-center pt-8">
            <h1 class="text-9xl font-bold text-black">404</h1>
            <p>
                <?= $translator->translate('The page', [], 'simple-view-tailwind') ?>
                <strong><?= Html::encode($urlMatcher->getCurrentUri()->getPath()) ?></strong>
                <?= $translator->translate('not found', [], 'simple-view-tailwind') ?>.
            </p>

            <hr class="mb-3">

            <p class="text-red-500">
                <?= $translator->translate(
                    'The above error occurred while the Web server was processing your request',
                    [],
                    'simple-view-tailwind',
                ) ?>.
                <br/>
                <?= $translator->translate(
                    'Please contact us if you think this is a server error. Thank you',
                    [],
                    'simple-view-tailwind',
                ) ?>.
            </p>

            <hr class="mb-5">

            <a class ="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="<?= $urlGenerator->generate('home') ?>">
                <?= $translator->translate('Go Back Home', [], 'simple-view-tailwind') ?>
            </a>
        </div>
    </div>
</div>
