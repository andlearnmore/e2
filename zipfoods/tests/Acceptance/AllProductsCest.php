<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class AllProductsCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/products');

        $I->see('All Products');
    }

    public function numberProducts(AcceptanceTester $I)

    {
        $I->amOnPage('/products');

        $productCount = count($I->grabMultiple('.product-link'));

        $I->assertGreaterThanOrEqual(10, $productCount);
    }
}
