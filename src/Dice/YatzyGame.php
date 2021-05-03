<?php

declare(strict_types=1);

namespace moan20\Dice;

use function moan20\Functions\{
    renderView,
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
    public $roundCounter;
    public $gameCounter;
    public $sum;
    public $dices;
    public $graphicDices;
    public $formDiceTraits;
    public $resultText;
    public $savedValues;

    public function __construct() 
    {
        $this->hidden = "";
        $this->resultText = "";
        $this->sum = 0;
        $this->gameCounter = $this->gameCounter ?? 3;
        $this->roundCounter = $this->roundCounter ?? 6;
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
            "d5" => "checked required",
            "save" => "1|2|3|4|5|6"
        ];

        $this->savedValues = $this->savedValues ?? [
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "bonus" => 0,
            "sum" => 0
        ];
    }

    public function playGame($recievedDices): void
    {
        $this->gameCounter -= 1;


        foreach (array_keys($this->graphicDices) as $d) {
            if (in_array($d, $recievedDices)) {
                $this->dices[$d]->roll();
                $this->graphicDices[$d] = $this->dices[$d]->getLastGraphicRoll();
                $this->formDiceTraits[$d] = "checked";
            } else {
                $this->formDiceTraits[$d] = "disabled";
            }
        }   

        if ($this->gameCounter === 0) {
            foreach (array_keys($this->dices) as &$d) {
                $this->formDiceTraits[$d] = "disabled";
                $this->sum += $this->dices[$d]->getLastRoll();
            }
            // $this->stopGame();
        }
    }

    public function newRound($saveAs): void
    {
        $c = 0;
        foreach ($this->dices as $key => $dice) {
            if (strval($dice->getLastRoll()) === $saveAs) {
                // $this->sum += $dice->getLastRoll();
                $c += 1;
            }
        }

        $this->savedValues[$saveAs] = $c * intval($saveAs);
        $this->roundCounter -= 1;
        if ($this->roundCounter > 0) {
            $this->restartGame($saveAs);
        } else {
            $this->stopGame();
        }   
    }

    public function restartGame($saveAs): void
    {
        $this->gameCounter = 3;
        $this->sum = 0;
        $this->graphicDices = [
            "d1" => "&#127922;",
            "d2" => "&#127922;",
            "d3" => "&#127922;",
            "d4" => "&#127922;",
            "d5" => "&#127922;"
        ];
        $saveArray = explode("|", $this->formDiceTraits['save']);
        $_SESSION['savearray'] = $saveArray;
        $newSaveArray = array();

        foreach ($saveArray as $num) {
            if ($num !== $saveAs) {
                array_push($newSaveArray, $num);
            }
        }

        $_SESSION['newsavearray'] = $newSaveArray;

        $this->formDiceTraits['save'] = implode("|", $newSaveArray);

        foreach (array_slice($this->formDiceTraits, 0, -1) as $dice => $trait) {
            $this->formDiceTraits[$dice] = "checked required";
        }

    }

    public function stopGame(): void
    {
        $endSum = 0;
        foreach ($this->savedValues as $num => $value) {
            $endSum += intval($value);
            if ($endSum >= 63) {
                $this->savedValues['bonus'] = 50;
            }
        }
        $this->savedValues['sum'] = $endSum + $this->savedValues['bonus'];

        $this->resultText = "<p> Du fick " . $this->savedValues['sum'] . " poäng. </p>";
    }
}
