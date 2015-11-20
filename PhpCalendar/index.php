<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Calendar</title>
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <table>
    <tbody>
      <tr class="eddge">
        <td><<</td>
        <td colspan="5"><?php
          $date = new DateTime();
          echo $date->format('M Y');
          ?></td>
        <td>>></td>
      </tr>
      <tr>
        <td>Sun</td>
        <td>Mon</td>
        <td>Tue</td>
        <td>Wed</td>
        <td>Thu</td>
        <td>Fri</td>
        <td>Sat</td>
      </tr>
      <?php $j = 0; ?>
      <?php for ($i = 0; $i < 5; $i++) : ?>
        <tr>
        <?php for (; $j < 28; $j++) : ?>
            <?php if (($j + 1) % 7 == 1): ?>
                <td class="sun"><?= $j + 1 ?></td>
            <?php elseif (($j + 1) % 7 == 0): ?>
                <td class="sat"><?= $j + 1 ?></td>
                <?php $j += 1; break; ?>

            <?php else: ?>
                <td><?= $j + 1 ?></td>
            <?php endif; ?>
        <?php endfor; ?>
        </tr>
      <?php endfor; ?>
      <tr>
        <td class="sun">29</td>
        <td>30</td>
        <td class="otherMonth">1</td>
        <td class="otherMonth">2</td>
        <td class="otherMonth">3</td>
        <td class="otherMonth">4</td>
        <td class="sat otherMonth">5</td>
      </tr>
      <tr class="eddge">
        <td colspan="7">Today</td>
      </tr>

    </tbody>
  </table>
</body>
</html>
