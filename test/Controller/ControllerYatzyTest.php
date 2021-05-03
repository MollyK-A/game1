<?php

declare(strict_types=1);

namespace Mos\Controller;
// namespace moan20\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use moan20\Dice\YatzyGame;

/**
 * Test cases for the controller Yatzy.
 */
class ControllerYatzyTest extends TestCase
{

    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {

        $controller = new Yatzy();
        $_SESSION['currentYatzy'] = $controller;

        $this->assertInstanceOf("\Mos\Controller\Yatzy", $controller);
    }

        /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse()
    {
        $controller = new Yatzy();
        $_SESSION['currentYatzy'] = new YatzyGame();
    
        $exp = "\Psr\Http\Message\ResponseInterface";

        fwrite(STDERR, print_r($controller, TRUE));

        $res = $controller->index();

        $this->assertInstanceOf($exp, $res);
    }
}
