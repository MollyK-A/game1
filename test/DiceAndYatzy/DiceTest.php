<?php

declare(strict_types=1);

// namespace Mos\Controller;
namespace moan20\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class DiceTest extends TestCase
{

    public function testCreateDiceClass()
    {

        $testDice = new GraphicalDice();
        $exp = "\moan20\Dice\GraphicalDice";

        $this->assertInstanceOf($exp, $testDice);
    }

    public function testDiceRoll()
    {
        $diceOptions = [
            '<i class="fas fa-dice-one"></i>',
            '<i class="fas fa-dice-two"></i>',
            '<i class="fas fa-dice-three"></i>',
            '<i class="fas fa-dice-four"></i>',
            '<i class="fas fa-dice-five"></i>',
            '<i class="fas fa-dice-six"></i>'
        ];
        $testDice = new GraphicalDice();
        $testDice->roll();

        $this->assertContains($testDice->getLastGraphicRoll(), $diceOptions, 'Class method returns wrong value');
        $this->assertTrue(is_integer($testDice->getLastRoll()));
    }
}
