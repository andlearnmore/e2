<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class HomePageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->see('Welcome!');
    }

}
