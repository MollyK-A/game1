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

<?php



if (isset($_POST['numDices']) && isset($_GET['match_nr']) && !isset($_POST['stop'])) {
    $currentGame->makeMove($_POST['numDices']);
    echo '<h3>Ditt slag:</h3>';
    echo $currentGame->userHand->getLastGraphicRoll();
    echo '<h3>Dina poäng:</h3>';
    echo $currentGame->userScore;
} else if (isset($_POST['stop'])) {
    echo $currentGame->computerPlayGame();
}

if ($_SESSION['scoreboard'][$currentGame->matchIndex]) {
    echo $currentGame->deliverResult();
}

?>

<div class="<?php if ($currentGame->done === true) {echo 'hidden';} ?>">
    <form method="POST" action="?match_nr=<?= $currentGame->matchIndex ?>">

        <label for="numDices">Antal tärningar:</label> <br>
        <input type="number" name="numDices" min="1" max="2" value="1"> <br>
        <input type="submit" value="Kasta!">
    </form>

    <form method="POST" class="<?php if (!isset($_POST['numDices'])) {echo 'hidden';} ?>">
        <input type="submit" name="stop" value="Stanna">
    </form>
</div>

<form method="POST" class="<?php if ($currentGame->done === false) {echo 'hidden';} ?>" action="?match_nr=<?= $currentGame->matchIndex + 1?>">
    <input type="submit" name="newGame" value="Nytt spel">
</form>

<h3><?= $currentGame->matchIndex ?></h3>

<div class="<?php if (!isset($_SESSION['currentGame'])) {echo 'hidden';}?>">
    <form method="POST" action="?reset">
        <input type="submit" name="resetScore" value="Återställ poängtavla">
    </form>
</div>