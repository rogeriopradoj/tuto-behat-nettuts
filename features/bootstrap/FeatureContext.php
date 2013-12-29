<?php

use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use RogerioPradoJ\TutoBehatNettuts\Phpadder;

require_once dirname(__FILE__) . '/../../vendor/autoload.php';

class FeatureContext extends BehatContext
{
    private $adder;

    /**
     * @Given /^I have the number (\d+) and the number (\d+)$/
     */
    public function iHaveTheNumberAndTheNumber($a, $b)
    {
        $this->adder = new Phpadder($a, $b);
    }

    /**
     * @When /^I add them together$/
     */
    public function iAddThemTogether()
    {
        $this->adder->add();
    }

    /**
     * @Then /^I should get (\d+)$/
     */
    public function iShouldGet($sum)
    {
        if ($this->adder->sum != $sum) {
            throw new Exception("Actual sum: ". $this->adder->sum);
        }
        $this->adder->display();
    }
}
