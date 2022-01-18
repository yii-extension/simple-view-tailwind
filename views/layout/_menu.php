<?php

declare(strict_types=1);

use Yii\Extension\Tailwind\Nav;
use Yii\Extension\Tailwind\NavBar;
use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var CsrfTokenInterface $csrf
 * @var CurrentRoute $currentRoute
 * @var IdentityInterface $identity
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var WebView $this
 */
$menuItems = $this->getParameter('menuItemsIsGuest', []);

if (isset($identity) && $identity instanceof IdentityInterface) {
    $menuItems = $this->getParameter('menuItemsIsNotGuest', []);
    $menuItems[] = [
        'label' => Form::widget()
            ->action($urlGenerator->generate('logout'))
            ->attributes([])
            ->csrf($csrf)
            ->begin() .
                Button::tag()
                ->class('bg-white text-black font-semibold py-2 px-3 hover:text-blue-700 rounded')
                ->content(
                    'Logout (' . $identity->account->username . ')'
                )
                ->id('logout')
                ->type('submit') .
        Form::end(),
    ];
}

$currentUrl = $currentRoute->getUri() !== null ? $currentRoute->getUri()->getPath() : '';
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
    ->containerAttributes(['class' => 'container flex flex-wrap items-center justify-between'])
    ->begin() ?>

    <?= Nav::widget()
        ->attributes(['class' => 'toggle hidden md:flex md:mt-0 md:w-auto text-bold text-right text-white w-full'])
        ->currentPath($currentUrl)
        ->items($menuItems)
    ?>

<?= NavBar::end();
