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

<h1 class="fw-bold">404</h1>

<p class="text-danger">
    <?= $translator->translate('The page', [], 'simple-view-bootstrap5') ?>
    <strong><?= Html::encode($urlMatcher->getCurrentUri()->getPath()) ?></strong>
    <?= $translator->translate('not found', [], 'simple-view-bootstrap5') ?>.
</p>

<p>
    <?= $translator->translate(
        'The above error occurred while the Web server was processing your request',
        [],
        'simple-view-bootstrap5',
    ) ?>.
    <br/>
    <?= $translator->translate(
        'Please contact us if you think this is a server error. Thank you',
        [],
        'simple-view-bootstrap5',
    ) ?>.
</p>

<hr class="mb-3">

<a class ="btn btn-danger" href="<?= $urlGenerator->generate('home') ?>">
    <?= $translator->translate('Go Back Home', [], 'simple-view-bootstrap5') ?>
</a>
