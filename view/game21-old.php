<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;

?>

<h1><?= $header ?></h1>
<p><?= $message ?></p>

<form method="POST" action="?dicethrown">
    <label for="num_dices">Antal tärningar:</label> <br>
    <input type="number" name="num_dices" min="1" max="2"> <br>
    <input type="submit" value="Kasta!">
</form>

<form method="POST">
    <!-- <label for="stop">Antal tärningar:</label> <br> -->
    <input type="submit" name="stop" value="Stanna">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);

    function same($key, $that, $list): bool
    {
        return isset($list[$key]) && $that === $that;
    }

    if (same('stop', 'Stanna', $_POST) or same('userGameResult', false, $_SESSION)) {
        echo $data['endResult'];
        echo `
        <form method="POST">
            <input type="submit" name="stop" value="Stanna">
        </form>
        `;
    }
    if (isset($_POST['num_dices'])) {
        if ($_POST['num_dices'] === "1") {
            echo $data['dieLastGraphicRoll'];
            $_SESSION['userScore'] += $data['dieLastRoll'];
            echo '<br>';
            echo 'Dina poäng är ' . $_SESSION['userScore'];
        } else {
            echo $data['diceHandLastGraphicRoll'];
            $_SESSION['userScore'] += $data['diceHandLastRoll'];
            echo '<br>';
            echo 'Dina poäng är ' . $_SESSION['userScore'];
        }
        echo '<br>';
    }




    // if ($_SESSION['userScore'] === 21) {
    //     echo 'Du vann!';
    // } else if ($_SESSION['userScore'] > 21) {
    //     echo 'Du fick ' . $_SESSION['userScore'] . ' och förlorade.';
    // }
}
?>

