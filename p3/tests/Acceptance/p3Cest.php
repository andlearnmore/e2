<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class p3Cest
{

    public function gameOver(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        for($i = 0; $i < 5; $i++) {
            $I->fillField('[test=das-radio]', 'das');
            $I->click('[test=guess-button]');
            $I->click('[test=next-button]');
        }
        $I->comment('I played 5 rounds.');

        $I->seeElement('[test=game-over]');
    }

    
    public function gameLogic(AcceptanceTester $I)
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

        $I->click('[test=next-button]');
        $I->seeElement('[test=game-form]');
    }


    public function validateForm(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('[test=guess-button]');
        $I->seeElement('[test=validation-output]');
    }


    public function showNouns(AcceptanceTester $I)
    {
        $I->amOnPage('/all-nouns');

        $nounCount = count($I->grabMultiple('[test=noun-li]'));
        $I->assertGreaterThanOrEqual(13, $nounCount);
    }


    public function showHistoryAndRoundDetails(AcceptanceTester $I)
    {
        $I->amOnPage('/games');

        $gameCount = count($I->grabMultiple('[test=game-results-link]'));
        $I->assertGreaterThanOrEqual(2, $gameCount);

        $gameNumber = $I->grabTextFrom('[test=game-results-link]'); 
        $I->click($gameNumber);
        $I->see($gameNumber);
    }

}
