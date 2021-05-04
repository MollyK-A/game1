<?php

declare(strict_types=1);

namespace Mos\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use moan20\Dice\YatzyGame;

class ControllerYatzyTest extends TestCase
{
    public function testCreateTheControllerClass()
    {

        $controller = new Yatzy();
        $_SESSION['currentYatzy'] = $controller;

        $this->assertInstanceOf("\Mos\Controller\Yatzy", $controller);
    }

    public function testControllerReturnsResponse()
    {
        $controller = new Yatzy();
        $_SESSION['currentYatzy'] = new YatzyGame();
    
        $exp = "\Psr\Http\Message\ResponseInterface";

        fwrite(STDERR, print_r($controller, true));

        $res = $controller->index();

        $this->assertInstanceOf($exp, $res);
    }
}
