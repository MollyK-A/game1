<?php

declare(strict_types=1);

namespace moan20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

use function moan20\Functions\{
    destroySession,
    renderView,
    url
};

/**
 * Controller for the Game21 route.
 */
class Game21
{
    public function index(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $_SESSION['currentGame'] = new \moan20\Dice\Game();

        $data = [
            "header" => "Spela 21!",
            "message" => "Välj hur många tärningar du vill spela med.",
            "currentGame" => $_SESSION['currentGame']
        ];

        $body = renderView("layout/game21.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function newGame(): ResponseInterface
    {
        return (new Response())
        ->withStatus(301)
        ->withHeader("Location", url("/game21/match_nr" . $_SESSION['matchNumber']));
    }
}


// <!-- else if ($method === "POST" && $path === ("/game21?match_nr=" . $_SESSION['matchNumber'])) {
//     $data = [
//         "header" => "Spela 21!",
//         "message" => "Välj hur många tärningar du vill spela med.",
//         "currentGame" => $_SESSION['currentGame']
//     ]; -->
