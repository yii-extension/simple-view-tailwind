<?php

declare(strict_types=1);

use Yiisoft\Aliases\Aliases;
use Yiisoft\Translator\CategorySource;
use Yiisoft\Translator\Message\Php\MessageSource;
use Yiisoft\Translator\MessageFormatterInterface;

return [
    'categorySourceSimpleViewTailwind' => static function (Aliases $aliases, MessageFormatterInterface $messageFormatter) {
        $messageReader = new MessageSource($aliases->get('@simple-view-tailwind/storage/translations'));

        return new CategorySource('simple-view-tailwind', $messageReader, $messageFormatter);
    },
];
