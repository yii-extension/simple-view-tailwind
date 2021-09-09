<?php

declare(strict_types=1);

use Simple\View\Tailwind\Asset\SimpleViewTailwindAsset;
use Yii\Extension\Asset\Tailwind\TailwindAsset;
use Yii\Extension\Fontawesome\Dev\Css\NpmAllAsset;
use Yii\Extension\Tailwind\AlertFlash;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var AssetManager $assetManager
 * @var string $content
 * @var CsrfTokenInterface $csrf
 * @var CurrentRoute $currentRoute
 * @var Flash $flash
 * @var TranslatorInterface $translator
 * @var WebView $this
 */

$assetManager->register([
    TailwindAsset::class,
    NpmAllAsset::class,
    SimpleViewTailwindAsset::class,
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
                            'currentRoute' => $currentRoute,
                            'translator' => $translator,
                            'urlGenerator' => $urlGenerator,
                            'currentUser' => $currentUser ?? [],
                        ]
                    ) ?>
                    <?= AlertFlash::widget([$flash])
                        ->bodyClass('align-middle flex-grow inline-block mr-8')
                        ->bodyTag('p')
                        ->buttonLabel('&times;')
                        ->buttonOnClick('closeAlert()')
                        ->class('flex font-bold items-center px-4 py-3 text-sm text-white')
                        ->iconAttributes(['class' => 'fa-2x pr-2'])
                        ->layoutBody('{icon}{body}{button}')
                        ->render() ?>
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

