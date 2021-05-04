<?php

declare(strict_types=1);

// namespace Mos\Controller;
namespace moan20\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use moan20\Dice\YatzyGame;

class YatzyGameTest extends TestCase
{
    /**
     * Try to create the yatzy game class.
     */
    public function testCreateTheYatzyGameClass()
    {
        $testGame = new YatzyGame();
        $exp = "\moan20\Dice\YatzyGame";

        $this->assertInstanceOf($exp, $testGame);
    }

    public function testAddedBonus()
    {
        $testGame = new YatzyGame();
        $testGame->savedValues = [
            "1" => "5",
            "2" => "10",
            "3" => "15",
            "4" => "20",
            "5" => "25",
            "6" => "30",
            "bonus" => 0,
            "sum" => 0
        ];

        $testGame->stopGame();
        $this->assertEquals($testGame->savedValues['bonus'], 50);
    }

    public function testNoBonus()
    {
        $testGame = new YatzyGame();
        $testGame->savedValues = [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
            "bonus" => 0,
            "sum" => 0
        ];

        $testGame->stopGame();
        $this->assertEquals($testGame->savedValues['bonus'], 0);
    }

    public function testIfGraphicalDices()
    {
        $testGame = new YatzyGame();
        $exp = "\moan20\Dice\GraphicalDice";
        foreach ($testGame->dices as $die) {
            $this->assertInstanceOf($exp, $die);
        }
    }

    public function testDisableFormFields()
    {
        $testGame = new YatzyGame();
        $testGame->playGame(['d1', 'd2', 'd3', 'd4', 'd5', 'd6']);

        $this->assertNotContains('disabled', $testGame->formDiceTraits);
        $this->assertTrue($testGame->formDiceTraits['save'] === "1|2|3|4|5|6");

        $testGame->playGame(['d1', 'd2']);

        $this->assertContains('disabled', $testGame->formDiceTraits);
        $this->assertContains('checked', $testGame->formDiceTraits);

        $testGame->playGame([]);

        $this->assertNotContains('checked', $testGame->formDiceTraits);
    }

    public function testSaveAs()
    {
        $testGame = new YatzyGame();

        $testGame->playGame(['d1', 'd2', 'd3', 'd4', 'd5', 'd6']);
        $testGame->restartGame('1');

        $this->assertTrue($testGame->formDiceTraits['save'] === "2|3|4|5|6", $testGame->formDiceTraits['save']);
    }
}
