<?php

declare(strict_types=1);

namespace Mos\Controller;

use Nyholm\Psr7\Response;
use Nyholm\Psr7\Stream;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use moan20\Dice\YatzyGame;

use function moan20\Functions\{
    destroySession,
    renderView,
    url
};

class Yatzy
{
    public $currentYatzy;
    public $dices;

    public function index(): ResponseInterface
    {
        $this->currentYatzy = $_SESSION['currentYatzy'] ?? new YatzyGame();
        $_SESSION['currentYatzy'] = $this->currentYatzy;
        $psr17Factory = new Psr17Factory();

        $data = [
            "header" => "Yatzy",
            "message" => "Play yatzy with yaself",
            'traits' => $_SESSION['currentYatzy']->formDiceTraits,
            // "dices" => $_SESSION['currentYatzy']->dices,
            "currentYatzy" => $_SESSION['currentYatzy']
        ];

        $body = renderView("layout/yatzy.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function play(): ResponseInterface 
    {
        // $this->currentYatzy = new YatzyGame();
        $psr17Factory = new Psr17Factory();
        $this->dices = array();

        $diceNames = [
            'd1',
            'd2',
            'd3',
            'd4',
            'd5'
        ]; 

        foreach ($diceNames as $d) {
            if (isset($_POST[$d])) {
                array_push($this->dices, $d);
            }
        }

        $_SESSION['currentYatzy']->playGame($this->dices);

        $data = [
            "header" => "Yatzy",
            "message" => "Play yatzy with yaself",
            // "dices" => $_SESSION['currentYatzy']->dices,
            "currentYatzy" => $_SESSION['currentYatzy']
        ];

        $body = renderView("layout/yatzy.php", $data);

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/yatzy"));
    }

    public function newRound(): ResponseInterface
    {
        // var_dump($_POST['save']);
        $_SESSION['currentYatzy']->newRound($_POST['save']);

        $data = [
            "header" => "Yatzy",
            "message" => "Play yatzy with yaself",
            // "dices" => $_SESSION['currentYatzy']->dices,
            "currentYatzy" => $_SESSION['currentYatzy']
        ];

        $body = renderView("layout/yatzy.php", $data);

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/yatzy"));
    }
}
