<?php

declare(strict_types=1);

namespace moan20\Dice;

/**
 * Class GraphicalDice.
 */
class GraphicalDice
{
    const FACES = 6;
    private $roll = null;

    public function roll(): int
    {
        $this->roll = rand(1, self::FACES);
        return $this->roll;
    }

    public function getLastRoll(): int
    {
        return $this->roll;
    }

    public function getLastGraphicRoll(): string
    {
        return $this->numberToIcon($this->roll);
    }

    public function numberToIcon($number): string
    {
        $diceWords = array(
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six'
        );

        return '<i class="fas fa-dice-' . $diceWords[$number] . '"></i>';
    }
}
