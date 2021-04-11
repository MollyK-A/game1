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
 * Class Dice.
 */
class Dice
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
}
