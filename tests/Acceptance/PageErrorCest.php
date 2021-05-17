<?php

declare(strict_types=1);

namespace Simple\View\Bootstrap5\Tests\Acceptance;

use Simple\View\Bootstrap5\Tests\AcceptanceTester;

final class PageErrorCest
{
    public function testPageError(AcceptanceTester $I): void
    {
        $I->amGoingTo('go to the error page');
        $I->amOnPage('/about');

        $I->wantTo('see error page.');
        $I->see('404');
        $I->see('The page /about not found.');
        $I->see('The above error occurred while the Web server was processing your request.');
        $I->see('Please contact us if you think this is a server error. Thank you.');
    }
}
