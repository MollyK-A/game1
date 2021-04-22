<?php
declare(strict_types=1);
$header = $header ?? null;
$message = $message ?? null;
$currentGame = $currentGame ?? null;
$currentGame->matchIndex = $_GET['match_nr'] ?? 0;

if (isset($_POST['newGame'])) {
    // $currentGame->matchIndex += 1;
    $currentGame->newGame();
}

if (isset($_POST['resetScore'])) {
    $currentGame->resetScoreboard();
}
?>

<h1><?= $header ?></h1>
<p><?= $message ?></p>

<form method="GET">
    <input type="submit" name="match_nr" value="<?$currentGame->matchIndex?>">
</form>

<div class="<?php if ($currentGame->done === true) {echo 'hidden';} ?>">
    <form method="GET">

        <label for="numDices">Antal tärningar:</label> <br>
        <input type="number" name="numDices" min="1" max="2" value="1"> <br>
        <input type="submit" value="Kasta!">
    </form>

    <form method="POST" class="<?php if (!isset($_POST['numDices'])) {echo 'hidden';} ?>">
        <input type="submit" name="stop" value="Stanna">
    </form>
</div>