<?php 

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('Test my page');
        $I->amOnPage('/mycv/number');
        $I->see('Mathilde Meunier');
    }
}
