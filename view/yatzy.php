<?php

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;
$currentYatzy = $currentYatzy;
$dices = $currentYatzy->dices;
$traits = $currentYatzy->formDiceTraits;
$result = $currentYatzy->resultText;
$gDices = $currentYatzy->graphicDices;
?>

<div id="yatzy">
  <div id="yatzy-info">
    <h1><?= $header ?></h1>
    <p><?= $message ?></p>

    <p> Check the boxes of the dices you want to throw. The first round all dices are mandatory.</p>
    <p> You have three rounds until your score is fixed. You can also uncheck all boxes and press Submit if you are content.</p>
    <h2> <?= $currentYatzy->gameCounter ?> </h2>
  </div>
  <div id="yatzy-dices">
    <form method="post" action="yatzy/play">

      <input type="checkbox" name="d1" value="<?php $dices['d1']?>" <?=$traits['d1']?>>
      <label for="d1"><?= $gDices['d1'] ?></label><br>

      <input type="checkbox" name="d2" value="<?php $dices['d2']?>" <?=$traits['d2']?>>
      <label for="d2"><?= $gDices['d2'] ?></label><br>

      <input type="checkbox" name="d3" value="<?php $dices['d3']?>"<?=$traits['d3']?>>
      <label for="d3"><?= $gDices['d3'] ?></label><br>

      <input type="checkbox" name="d4" value="<?php $dices['d4']?>" <?=$traits['d4']?>>
      <label for="d4"><?= $gDices['d4'] ?></label><br>

      <input type="checkbox" name="d5" value="<?php $dices['d5']?>" <?=$traits['d5']?>>
      <label for="d5"><?= $gDices['d5'] ?></label><br>

      <br><br>
    <?php if ($currentYatzy->gameCounter > 0) : ?>
      <input type="submit" value="Submit">
    </form>
    <?php elseif ($currentYatzy->roundCounter > 0) : ?>
    </form>
    <form method="post" action="yatzy/newRound">
      <label for="save">Save as</label>
      <input type="text" name="save" required pattern="<?=$traits['save']?>">
      <input type="submit" value="Submit">
  </form>
    <?php endif; ?>
  </div>
  <div id="yatzy-table">
  <table>
    <tbody>
      <tr>
        <th> Spelare</th>
        <th> Yatzy</th>
      </tr>
      <tr>
        <td>
        <span>Ettor</span>
        </td>
        <td> <?=$currentYatzy->savedValues['1']?> </td>
      </tr>
      <tr>
        <td>
        <span>Tvåor</span>
        </td>
        <td> <?=$currentYatzy->savedValues['2']?> </td>
      </tr>
      <tr>
        <td>
        <span>Treor</span>
        </td>
        <td> <?=$currentYatzy->savedValues['3']?> </td>
      </tr>
      <tr>
        <td>
        <span>Fyror</span>
        </td>
        <td> <?=$currentYatzy->savedValues['4']?> </td>
      </tr>
      <tr>
        <td>
        <span>Femmor</span>
        </td>
        <td> <?=$currentYatzy->savedValues['5']?> </td>
      </tr>
      <tr>
        <td>
        <span>Sexor</span>
        </td>
        <td> <?=$currentYatzy->savedValues['6']?> </td>
      </tr>
      <tr>
        <td>
        <span>Bonus</span>
        </td>
        <td> <?=$currentYatzy->savedValues['bonus']?> </td>
      </tr>
      <tr>
        <td>
        <span>Summa</span>
        </td>
        <td> <?=$currentYatzy->savedValues['sum']?> </td>
      </tr>
    </tbody>
  </table>

    <?= $result ?>
  </div>
</div>