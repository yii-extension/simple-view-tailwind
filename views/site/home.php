<?php

declare(strict_types=1);

use Yiisoft\Html\Html;

$this->setTitle($translator->translate('My Project', [], 'simple-view-bootstrap5'));
?>

<div class="">
    <div>
        <h1><?= $translator->translate('Hello!', [], 'simple-view-bootstrap5') ?></h1>

        <p>
            <?= $translator->translate(
                "Let's start something great with <strong>Yii3</strong>!",
                [],
                'simple-view-bootstrap5'
            ) ?>
        </p>

        <p>
            <a class="no-underline hover:underline text-blue-500" href="https://github.com/yiisoft/docs/tree/master/guide/en" target="_blank" rel="noopener">
                <?= $translator->translate("Don't forget to check the guide.", [], 'simple-view-bootstrap5') ?>
            </a>
        </p>
    <div>
</div>
