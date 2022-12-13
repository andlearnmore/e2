 

# Project 3
+ By: Anne Dwojeski-Santos
+ URL: <http://e2p3.andlearn.me>

## Graduate requirement
*x one of the following:*
+ [ x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources
+ https://stackoverflow.com/questions/4100786/how-to-create-an-array-of-a-group-of-items-inside-an-html-form
+ https://laracasts.com/discuss/channels/laravel/is-it-possible-to-conditionally-seed-the-database : for adding function to seed

## Notes for instructor
+ My Games table seeds have game numbers that go in the opposite order of the timestamp. This is because I use 'reset($games))' to get the most recent game number.
+ I relied heavily on class videos for the testing section of my project.

## Codeception testing output
```
Codeception PHP Testing Framework v5.0.5 https://helpukrainewin.org

Tests.Acceptance Tests (5) ---------------------------------------------------------------------------------------------------
p3Cest: Game over
Signature: Tests\Acceptance\p3Cest:gameOver
Test: tests/Acceptance/p3Cest.php:gameOver
Scenario --
 I am on page "/"
 I fill field "[test=das-radio]","das"
 I click "[test=guess-button]"
 I click "[test=next-button]"
 I fill field "[test=das-radio]","das"
 I click "[test=guess-button]"
 I click "[test=next-button]"
 I fill field "[test=das-radio]","das"
 I click "[test=guess-button]"
 I click "[test=next-button]"
 I fill field "[test=das-radio]","das"
 I click "[test=guess-button]"
 I click "[test=next-button]"
 I fill field "[test=das-radio]","das"
 I click "[test=guess-button]"
 I click "[test=next-button]"
 I played 5 rounds.
 I see element "[test=game-over]"
 PASSED 

p3Cest: Game logic
Signature: Tests\Acceptance\p3Cest:gameLogic
Test: tests/Acceptance/p3Cest.php:gameLogic
Scenario --
 I am on page "/"
 I fill field "[test=das-radio]","das"
 I click "[test=guess-button]"
 I see element "[test=feedback-div]"
 I grab text from "[test=article-output]"
 The correct article is: die
 I see element "[test=incorrect-output]"
 The test guess is das but the correct article is die
 I click "[test=next-button]"
 I see element "[test=game-form]"
 PASSED 

p3Cest: Validate form
Signature: Tests\Acceptance\p3Cest:validateForm
Test: tests/Acceptance/p3Cest.php:validateForm
Scenario --
 I am on page "/"
 I click "[test=guess-button]"
 I see element "[test=validation-output]"
 PASSED 

p3Cest: Show nouns
Signature: Tests\Acceptance\p3Cest:showNouns
Test: tests/Acceptance/p3Cest.php:showNouns
Scenario --
 I am on page "/all-nouns"
 I grab multiple "[test=noun-li]"
 I assert greater than or equal 13,14
 PASSED 

p3Cest: Show history and round details
Signature: Tests\Acceptance\p3Cest:showHistoryAndRoundDetails
Test: tests/Acceptance/p3Cest.php:showHistoryAndRoundDetails
Scenario --
 I am on page "/games"
 I grab multiple "[test=game-results-link]"
 I assert greater than or equal 2,5
 I grab text from "[test=game-results-link]"
 I click "Game 5"
 I see "Game 5"
 PASSED 

------------------------------------------------------------------------------------------------------------------------------
Time: 00:00.520, Memory: 10.00 MB

OK (5 tests, 10 assertions)

```



