<?php

declare(strict_types=1);

namespace moan20\Dice;

/**
 * Class GraphicDiceHand.
 */
class GraphicDiceHand
{
    private $dices;
    public $sum;

    public function __construct($numDices)
    {
        $this->numDices = $numDices;

        for ($i = 1; $i <= $numDices; $i++) {
            $this->dices[$i] = new GraphicalDice();
        }
    }

    public function roll(): void
    {
        // $len = count($this->dices);
        $this->sum = 0;

        for ($i = 1; $i <= $this->numDices; $i++) {
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
        return $this->sum;
    }

    public function getLastGraphicRoll(): string
    {
        $res = "";
        
        for ($i = 1; $i <= $this->numDices; $i++) {
            $res .= $this->dices[$i]->getLastGraphicRoll() . ", ";
        }

        return $res . " = " . $this->sum;
    }
}
