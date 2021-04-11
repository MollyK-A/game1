<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;

?>

<h1 class="header"><?= $header ?></h1>
<p class="message"><?= $message ?></p>

<h3>Single dice</h3>
<p><?= $dieLastRoll ?></p>

<h3>Dicehand</h3>
<p><?= $diceHandLastRoll ?></p>