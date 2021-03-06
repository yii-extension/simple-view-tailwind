<p align="center">
    <a href="https://github.com/yii-extension" target="_blank">
        <img src="https://lh3.googleusercontent.com/ehSTPnXqrkk0M3U-UPCjC0fty9K6lgykK2WOUA2nUHp8gIkRjeTN8z8SABlkvcvR-9PIrboxIvPGujPgWebLQeHHgX7yLUoxFSduiZrTog6WoZLiAvqcTR1QTPVRmns2tYjACpp7EQ=w2400" height="100px">
    </a>
    <h1 align="center">Simple view tailwind web application for yii.</h1>
    <br>
</p>

[![Total Downloads](https://poser.pugx.org/yii-extension/simple-view-tailwind/downloads.png)](https://packagist.org/packages/yii-extension/simple-view-tailwind)
[![Build Status](https://github.com/yii-extension/simple-view-tailwind/workflows/build/badge.svg)](https://github.com/yii-extension/simple-view-tailwind/actions?query=workflow%3Abuild)
[![codecov](https://codecov.io/gh/yii-extension/simple-view-tailwind/branch/master/graph/badge.svg?token=tUznVx9Em7)](https://codecov.io/gh/yii-extension/simple-view-tailwind)
[![static analysis](https://github.com/yii-extension/simple-view-tailwind/workflows/static%20analysis/badge.svg)](https://github.com/yii-extension/simple-view-tailwind/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yii-extension/simple-view-tailwind/coverage.svg)](https://shepherd.dev/github/yii-extension/simple-view-tailwind)

## Installation

```shell
composer require yii-extension/simple-view-tailwind
```

## Using translations

By default the package includes the translation into spanish and russian.

The translation is in the `/storage/translations` directory. 

## Translation extractor

```shell
composer require yiisoft/translator-extractor --prefer-dist
```

The root directory of simple-app: `config/packages/yiisoft-translator-extractor/console.php`:

```php
<?php

declare(strict_types=1);

use Yiisoft\Aliases\Aliases;
use Yiisoft\Translator\Extractor\Extractor;

/** @var array $params */

return [
    Extractor::class => [
        '__construct()' => [
            'messageReader' => static fn (Aliases $aliases) => new \Yiisoft\Translator\Message\Php\MessageSource(
                $aliases->get('@simple-view-tailwind/translations')
            ),
            'messageWriter' => static fn (Aliases $aliases) => new \Yiisoft\Translator\Message\Php\MessageSource(
                $aliases->get('@simple-view-tailwind/translations')
            ),
        ],
    ],
];
```

The root directory of simple-app:

```shell
./yii translator/extract --languages=es --only=**/vendor/yii-extension/simple-view-tailwind/storage/**
```

### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

## Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/docs). To run static analysis:

```shell
./vendor/bin/psalm
```

### License

The `yii-extension/simple-view-tailwind` is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Extension](https://github.com/yii-extension).

## Support the project

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/yiisoft)

## Powered by Yii Framework

[![Official website](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
