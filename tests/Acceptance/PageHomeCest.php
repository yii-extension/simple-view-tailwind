<?php

declare(strict_types=1);

namespace Simple\View\Bootstrap5\Tests\Acceptance;

use Simple\View\Bootstrap5\Tests\AcceptanceTester;

final class PageHomeCest
{
    public function testPageHome(AcceptanceTester $I): void
    {
        $I->amGoingTo('go to the index page');
        $I->amOnPage('/');

        $I->expectTo('see page index.');
        $I->see('Hello!');
        $I->see("Let's start something great with Yii3!");
    }
}
