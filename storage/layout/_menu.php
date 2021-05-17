<?php

declare(strict_types=1);

use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Html;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
//**use Yii\Extension\Tailwind\Nav;
use Yii\Extension\Tailwind\NavBar;

/**
 * @var CsrfTokenInterface $csrf
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var UrlMatcherInterface $urlMatcher
 */

$config = [
    'brandText()' => [$translator->translate('My Project', [], 'simple-view-bootstrap5')],
    'brandImage()' => ['/images/yii-logo.jpg'],
    'brandImageAttributes()' => [['class' => 'w-6']],
    'options()' => [['class' => 'navbar navbar-dark navbar-expand-lg bg-dark']],
    'toggleAttributes()' => [
        [
            'class' => 'text-white cursor-pointer text-xl leading-none border border-solid border-transparent ' .
                'rounded bg-transparent block lg:hidden outline-none focus:outline-none'
        ],
    ],
];

$currentUrl = '';
$menuItems = [];

if ($user !== [] && !$user->isGuest()) {
    $menuItems =  [
        [
            'label' => Form::widget()
                ->action($urlGenerator->generate('logout'))
                ->options(['csrf' => $csrf, 'encode' => false])
                ->begin() .
                    Html::submitButton(
                        'Logout (' . Html::encode($user->getIdentity()->getUsername()) . ')',
                        [
                            'id' => 'logout',
                            'encode' => false,
                        ],
                    ) .
                Form::end(),
            'encode' => false,
            'linkOptions' => ['encode' => false],
            'options' => ['encode' => false],
        ]
    ];
}

if ($urlMatcher->getCurrentRoute() !== null) {
    $currentPath = $urlMatcher->getCurrentUri()->getPath();
}

?>

<?=
    NavBar::widget()
    ->currentPath($currentPath)
    ->brandLink('/')
    ->brandText('My Proyect')
    ->begin();

    NavBar::end();
?>
