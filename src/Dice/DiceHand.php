<?php

declare(strict_types=1);

namespace moan20\Dice;

// use function moan20\Functions\{
//     destroySession,
//     redirectTo,
//     renderView,
//     renderTwigView,
//     sendResponse,
//     url
// };

/**
 * Class DiceHand.
 */
class DiceHand
{
    private $dices;
    private $sum;

    public function __construct()
    {
        for ($i = 0; $i <= 2; $i++) {
            $this->dices[$i] = new GraphicalDice();
        }
    }

    public function roll(): void
    {
        $len = count($this->dices);
        $this->sum = 0;

        for ($i = 1; $i <= 2; $i++) {
            $this->sum += $this->dices[$i]->roll();
        }
    }

    public function getLastRoll(): string
    {
        $res = "";
        
        for ($i = 1; $i <= 2; $i++) {
            $res .= $this->dices[$i]->getLastRoll() . ", ";
        }

        return $res . " = " . $this->sum;
    }

    public function getLastRollSum(): int
    {
        // $res = "";
        
        // for ($i = 1; $i <= 2; $i++) {
        //     $res .= $this->dices[$i]->getLastRoll() . ", ";
        // }

        return $this->sum;
    }

    public function getLastGraphicRoll(): string
    {
        $res = "";
        
        for ($i = 1; $i <= 2; $i++) {
            $res .= $this->dices[$i]->getLastGraphicRoll() . ", ";
        }

        return $res . " = " . $this->sum;
    }
}
