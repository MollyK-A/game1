<?php

declare(strict_types=1);

namespace moan20\Dice;

use function moan20\Functions\{
    redirectTo,
    renderView,
    sendResponse,
    url
};

use \moan20\Dice\Dice;
use \moan20\Dice\GraphicalDice;
use \moan20\Dice\DiceHand;
use \moan20\Dice\GraphicDiceHand;

/**
 * Class Game.
 */
class YatzyGame
{
    public $hidden;
    public $gameCounter;
    public $sum;
    public $dices;
    public $graphicDices;
    public $formDiceTraits;
    public $resultText;

    public function __construct() 
    {
        $this->hidden = "";
        $this->resultText = "";
        $this->sum = 0;
        $this->gameCounter = $this->gameCounter ?? 3;
        $this->dices = [
            "d1" => new GraphicalDice(),
            "d2" => new GraphicalDice(),
            "d3" => new GraphicalDice(),
            "d4" => new GraphicalDice(),
            "d5" => new GraphicalDice()
        ];

        $this->graphicDices = $this->graphicDices ?? [
            "d1" => "&#127922;",
            "d2" => "&#127922;",
            "d3" => "&#127922;",
            "d4" => "&#127922;",
            "d5" => "&#127922;"
        ];

        $this->formDiceTraits = $this->formDiceTraits ?? [
            "d1" => "checked required",
            "d2" => "checked required",
            "d3" => "checked required",
            "d4" => "checked required",
            "d5" => "checked required"
        ];
    }

    public function playGame($recievedDices): void
    {
        $this->gameCounter -= 1;
        if ($this->gameCounter === 0) {
            $this->stopGame();
        }

        foreach (array_keys($this->graphicDices) as $d) {
            if (in_array($d, $recievedDices)) {
                $this->dices[$d]->roll();
                $this->graphicDices[$d] = $this->dices[$d]->getLastGraphicRoll();
                $this->formDiceTraits[$d] = "checked";
            } else {
                $this->formDiceTraits[$d] = "disabled";
            }
        }   
    }

    public function stopGame(): void
    {
        $this->hidden = "hidden";
        foreach (array_keys($this->dices) as &$d) {
            $this->formDiceTraits[$d] = "disabled";
            $this->sum += $this->dices[$d]->getLastRoll();
        }


        $this->resultText = "<p> Du fick " . $this->sum . " poäng. </p>";

        if ($this->sum >= 63) {
            $this->resultText += "<p> Du fick en bonus på 50 poäng. Du har nu" . ($this->sum + 50). " poäng. </p>";
        }
    }
}
