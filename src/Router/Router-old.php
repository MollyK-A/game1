<?php

declare(strict_types=1);

namespace moan20\Router;

use function moan20\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

/**
 * Class Router.
 */
class Router
{
    public static function dispatch(string $method, string $path): void
    {
        $_SESSION['matchNumber'] = $_SESSION['matchNumber'] ?? 0;
        if (isset($_POST['newGame'])) {
            $_SESSION['matchNumber'] += 1;
        }
        
        if ($method === "GET" && $path === "/") {
            $data = [
                "header" => "Index page",
                "message" => "Hello, this is the index page, rendered as a layout.",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session") {
            $body = renderView("layout/session.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session/destroy") {
            destroySession();
            redirectTo(url("/session"));
            return;
        } else if ($method === "GET" && $path === "/debug") {
            $body = renderView("layout/debug.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/twig") {
            $data = [
                "header" => "Twig page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderTwigView("index.html", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/some/where") {
            $data = [
                "header" => "Rainbow page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/game21") {
            $_SESSION['currentGame'] = new \moan20\Dice\Game();
            $data = [
                "header" => "Spela 21!",
                "message" => "Välj hur många tärningar du vill spela med.",
                "currentGame" => $_SESSION['currentGame']
            ];

            $_SESSION['currentGame'] = new \moan20\Dice\Game();
            $body = renderView("layout/game21.php", $data);
            sendResponse($body);

            return;
        // } else if ($method === "POST" && $path === ("/game21?match_nr=" . $_SESSION['matchNumber'])) {
        //     $data = [
        //         "header" => "Spela 21!",
        //         "message" => "Välj hur många tärningar du vill spela med.",
        //         "currentGame" => $_SESSION['currentGame']
        //     ];

        //     $body = renderView("layout/game21.php", $data);
        //     sendResponse($body);
        //     return;
        } else if ($method === "POST" && $path === "/game21?reset") {
            $data = [
                "header" => "Poängtavlan är nollställd",
                "message" => "Börja om från början, börja om på nytt... ♩ ♪ ♫ ♬",
            ];

            $body = renderView("layout/page.php", $data);
            $_SESSION['currentGame']->resetScoreboard();
            sendResponse($body);
            return;
        }

        $data = [
            "header" => "404",
            "message" => "The page you are requesting is not here. You may also checkout the HTTP response code, it should be 404.",
        ];
        $body = renderView("layout/page.php", $data);
        sendResponse($body, 404);
    }
}
