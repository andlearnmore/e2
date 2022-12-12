<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class p3Cest
{


    public function startGame(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('[test=das-radio]', 'das');
        $I->click('[test=guess-button]');
        $I->seeElement('[test=feedback-div]');

        $article = $I->grabTextFrom('[test=article-output]');
        $I->comment('The correct article is: '.$article);

        if ($article == 'das') {
            $I->seeElement('[test=correct-output]');
            $I->comment('The test guess is das and the correct article is '.$article);
        } else {
            $I->seeElement('[test=incorrect-output]');
            $I->comment('The test guess is das but the correct article is '.$article);
        }
    }
}
