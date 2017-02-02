<?php

use Codeception\Util\Locator;

$I = new AcceptanceTester($scenario);
$I->wantTo('Login to my blog');
$I->amOnPage('/');

//here we'd Login  */
$usernameField = 'input[name="Email"]';
$pwField = 'input[name="Passwd"]';

//$I->amOnPage('/2017/02/testing-123.html');
//$I->waitForText('Sign In', 5);
$I->click('Sign in');

$I->wait(2);

try {
    $I->click('Charles');
    $I->wait(2);
}
catch(\Exception $e) {
    try {
        $I->click('Add account');
    }
    catch(\Exception $ee) {
        //Login
        $I->fillField($usernameField,'charleskendee@gmail.com');
        $I->click('Next');

        $I->wait(2);
        $I->fillField($pwField, '**********');
        $I->click('Sign in');

        $I->waitForText('View blog', 5);

        $I->click('View blog');

        $I->waitForText('New post');

        $I->click('New post');

        $I->waitForText('HTML');

        $I->click('//button[contains(text(),"HTML")]');
        //$I->seeElement('//body[id="postingComposeBox"]/p');

        //$I->fillField('//body[id="postingComposeBox"]/p', 'check 123');
        $I->fillField('textarea[id="postingHtmlBox"]', "To lorem is to ipsum.");

        $I->click('Publish');

        try {
            $I->waitForText('Cancel');

            $I->click('Cancel');
        } catch (\Exception $eeeee) {}


        $I->waitForText('View blog', 5);

        $I->click('To lorem is to ipsum.');
    }

    $I->wait(2);
}
