<?php
declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;
$currentYatzy = $currentYatzy;
$dices = $currentYatzy->$dices ?? null;
$traits = $currentYatzy->formDiceTraits;
$result = $currentYatzy->resultText;
$gDices = $currentYatzy->graphicDices;

?>

<h1><?= $header ?></h1>
<p><?= $message ?></p>

<p> Check the boxes of the dices you want to throw. The first round all dices are mandatory.</p>
<p> You have three rounds until your score is fixed. You can also uncheck all boxes and press Submit if you are content.</p>
<h2> <?= $currentYatzy->gameCounter ?> </h2>

<form method="post" action="yatzy/newRound" class="<?=$currentYatzy->hidden?>">

  <input type="checkbox" name="d1" value="<?$dices['d1']?>" <?=$traits['d1']?>>
  <label for="d1"><?= $gDices['d1'] ?></label><br>

  <input type="checkbox" name="d2" value="<?$dices['d2']?>" <?=$traits['d2']?>>
  <label for="d2"><?= $gDices['d2'] ?></label><br>

  <input type="checkbox" name="d3" value="<?$dices['d3']?>"<?=$traits['d3']?>>
  <label for="d3"><?= $gDices['d3'] ?></label><br>

  <input type="checkbox" name="d4" value="<?$dices['d4']?>" <?=$traits['d4']?>>
  <label for="d4"><?= $gDices['d4'] ?></label><br>

  <input type="checkbox" name="d5" value="<?$dices['d5']?>" <?=$traits['d5']?>>
  <label for="d5"><?= $gDices['d5'] ?></label><br><br>

  <input type="submit" value="Submit">
</form>


<?= $result ?>