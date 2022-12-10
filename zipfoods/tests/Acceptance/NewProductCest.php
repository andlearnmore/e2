<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class NewProductCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/products/new');

        $I->see('Add an Item');
    }

    public function submitProduct(AcceptanceTester $I)
    {
        $I->amOnPage('/products/new');

        $productName = 'Ritter Sport Hazelnut Dark Chocolate Bar';
        $I->fillField('[test=new-product-name-input]', $productName);

        $productSku = 'Ritter-Sport-Hazelnut-Dark-Chocolate-Bar';
        $I->fillField('[test=new-product-sku-input]', $productSku);
        
        $productDescription = 'Crunchy roasted hazelnuts in milk chocolate make RITTER SPORT Whole Hazelnuts the absolute favourite in our range.';
        $I->fillField('[test=new-product-description-input]', $productDescription);

        $productPrice = '$3.99';
        $I->fillField('[test=new-product-price-input]', $productPrice);

        $available = '12';
        $I->fillField('[test=new-product-available-input]', $available);

        $weight = '0.22';
        $I->fillField('[test=new-product-weight-input]', $weight);

        $perishable = '';
        $I->selectOption('[test=new-product-perishable-input]', $perishable);

        $I->click('[test=new-product-submit-button]');

        $I->seeElement('[test=new-product-saved]');
    }
}
