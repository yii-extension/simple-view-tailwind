<?php

declare(strict_types=1);

use Yii\Extension\Asset\Tailwind\TailwindAsset;
use Yii\Extension\Fontawesome\Dev\Css\NpmAllAsset;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var AssetManager $assetManager
 * @var string $content
 * @var CsrfTokenInterface $csrf
 * @var TranslatorInterface $translator
 * @var UrlMatcherInterface $urlMatcher
 * @var WebView $this
 */

$assetManager->register([
    TailwindAsset::class,
    NpmAllAsset::class,
]);

$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
?>

<?php $this->beginPage() ?>
    <!doctype html>
    <html>
        <?= $this->render('_head', ['csrf' => $csrf]) ?>
        <?php $this->beginBody() ?>
            <body class="flex flex-col h-screen">
                <header>
                    <?= $this->render(
                        '_menu',
                        [
                            'csrf' => $csrf,
                            'translator' => $translator,
                            'urlGenerator' => $urlGenerator,
                            'urlMatcher' => $urlMatcher,
                            'currentUser' => $currentUser ?? [],
                        ]
                    ) ?>
                </header>

                <main class="flex flex-col flex-grow items-center justify-center">
                    <?= $content ?>
                </main>

                <footer>
                    <?= $this->render('_footer', ['aliases' => $aliases]) ?>
                </footer>
            </body>
        <?php $this->endBody() ?>
    </html>
<?php $this->endPage() ?>

