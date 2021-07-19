<?php

declare(strict_types=1);

use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Html;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yii\Extension\Tailwind\NavBar;

/**
 * @var CsrfTokenInterface $csrf
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var UrlMatcherInterface $urlMatcher
 */

$currentPath = '';
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

<?= NavBar::widget()
    ->attributes(['class' => 'bg-black flex flex-wrap  items-center justify-between p-5'])
    ->buttonAttributes([
        'class' => 'inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white' .
        'hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white'
    ])
    ->buttonContainerAttributes(['class' => 'flex md:hidden'])
    ->brandAttributes(['class' => 'flex-shrink-0 flex items-center'])
    ->brandImageAttributes(['class' => 'block h-8 w-auto', 'title' => 'yii'])
    ->brandImage('/images/yii-logo.jpg')
    ->brandLink('/')
    ->brandText('My Proyect')
    ->brandTextAttributes(['class' => 'font-semibold pl-2 text-white'])
    ->begin();

NavBar::end();
