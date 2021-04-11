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
use \moan20\Dice\DiceHand;
use \moan20\Dice\GraphicDiceHand;

/**
 * Class Game.
 */
class Game
{
    public $userHand;
    public $userScore;
    public $matchIndex;
    public $done;

    function __construct() 
    {
        $this->done = false;
        $this->userScore = 0;
        // $_SESSION['currentGame']->result = 'Unset';
        $this->matchIndex = 0;
        $_SESSION['scoreboard'] = [];
        $_SESSION['scoreboard'][$this->matchIndex] = null;
    }

    function makeMove($numDices): void 
    {
        $this->userHand = new GraphicDiceHand($numDices);

        $this->userHand->roll();
        // $_SESSION['currentGame']['lastRoll'] = $this->userHand.getLastRoll();
        // $_SESSION['currentGame']['lastGraphicRoll'] = $this->userHand.getLastGraphicRoll();
        $this->userScore += $this->userHand->getLastRollSum();
        
        $this->checkGameResult();
    }

    function deliverResult(): string 
    {
        // if ($this->result === 'User won') {
        if ($_SESSION['scoreboard'][$this->matchIndex] === 'user') {
            $this->done = true;
            return "<h1 id='win'>GRATTIS DU VANN!</h1>";
        // } else if ($this->result === 'Computer won') {
        } else if ($_SESSION['scoreboard'][$this->matchIndex] === 'computer') {
            $this->done = true;
            return "<h1 id='lose'>Du förlorade. </h1>";
        } else {
            return "";
        }
    }

    function checkGameResult(): void 
    {
        if ($this->userScore === 21) {
            // $this->result = 'User won';
            $this->saveToScoreboard('user', $this->matchIndex);
        } else if ($this->userScore > 21) {
            // $this->result = 'Computer won';
            $this->saveToScoreboard('computer', $this->matchIndex);
        }
    }

    function saveToScoreboard($winner, $index): void 
    {
	    $_SESSION['scoreboard'][$index] = $winner;
    }

    function resetScoreboard(): void 
    {
        $this->matchIndex = 0;
        $_SESSION['scoreboard'] = [];
    }

    function computerPlayGame(): string 
    {
        $_SESSION['computerScore'] = 0;
        $die = new Dice();
        $die->roll();

        while ($_SESSION['computerScore'] < 15) {
            $die->roll();
            $_SESSION['computerScore'] += $die->getLastRoll();
        }

        if ($_SESSION['computerScore'] > 21) {
            $this->saveToScoreboard('none', $this->matchIndex);
            // $this->result = 'Double loss';
            return 'Datorn slog över 21 och förlorade också.';
        } else if ($_SESSION['computerScore'] == 21) {
            $this->saveToScoreboard('computer', $this->matchIndex);
            // $this->result = 'Computer won';
            return 'Datorn fick 21 och vann!';
        } else {
            return $this->compareResults();
        }
    }

    function compareResults(): string 
    {
        if ($_SESSION['computerScore'] > $this->userScore) {
            // $this->result = 'Computer won';
            $this->saveToScoreboard('computer', $this->matchIndex);
            return 'Datorn vann med ' . $_SESSION['computerScore'] . ' över ' . $this->userScore . '!';
        } else if ($_SESSION['computerScore'] === $this->userScore) { 
            // $this->result = 'Computer won';
            $this->saveToScoreboard('computer', $this->matchIndex);
            return 'Lika! Datorn vinner. Ha!';
        } else {
            $this->saveToScoreboard('user', $this->matchIndex);
            // $this->result = 'User won';
            return 'Du vann med ' . $this->userScore . ' över ' . $_SESSION['computerScore'] . '!';
        }
    }

    function newGame(): void 
    {
        // $this->matchIndex += 1;
        $_SESSION['userScore'] = 0;
        $this->userHand->sum = 0;
        $this->userScore = 0;
        $_SESSION['scoreboard'][$this->matchIndex] = null;
        $this->done = false;
    }

}