<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var CurrentRoute $currentRoute
 * @var UrlGeneratorInterface $urlGenerator
 * @var TranslatorInterface $translator
 */

$this->setTitle('404');
?>

<div class="justify-center">
    <div class="bg-white overflow-hidden pb-8">
        <div class="text-center pt-8">
            <h1 class="text-9xl font-bold text-black"><?= Html::encode($this->getTitle()) ?></h1>
            <p class="mb-5">
                <?= $translator->translate('The page', [], 'simple-view-tailwind') ?>
                <strong><?= Html::encode($currentRoute->getUri()->getPath()) ?></strong>
                <?= $translator->translate('not found', [], 'simple-view-tailwind') ?>.
            </p>

            <p class="text-red-500 mb-5">
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

            <a class ="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="<?= $urlGenerator->generate('home') ?>">
                <?= $translator->translate('Go Back Home', [], 'simple-view-tailwind') ?>
            </a>
        </div>
    </div>
</div>
