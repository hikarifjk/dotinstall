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
      <?php
        $j = 0;
        $calendarItemList = array(
          1, 2, 3, 4, 5, 6, 7,
          8, 9, 10, 11, 12, 13, 14,
          15, 16, 17, 18, 19, 20, 21,
          22, 23, 24, 25, 26, 27, 28,
          29, 30, 1, 2, 3, 4, 5,
        );
       ?>
      <?php for ($i = 0; $i < 5; $i++) : ?>
        <tr>
        <?php for (; $j < 28; $j++) : ?>
            <?php if (($j + 1) % 7 == 1): ?>
                <td class="sun"><?= $calendarItemList[$j] ?></td>
            <?php elseif (($j + 1) % 7 == 0): ?>
                <td class="sat"><?= $calendarItemList[$j] ?></td>
                <?php $j += 1; break; ?>

            <?php else: ?>
                <td><?= $calendarItemList[$j] ?></td>
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
