<?php
$body = '';
$period = new DatePeriod(
  new DateTime('first day of this month'),
  new DateInterval('P1D'),
  new DateTime('first day of next month')
);

foreach ($period as $day) {
  if ($day->format('w') % 7 === 0) {
    $body .= '</tr><tr>';
  }

  $body .= sprintf('<td class="youbi_%d">%d</td>', $day->format('w'), $day->format('d'));
}
?>


<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Calendar</title>
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <table>
    <thead>

      <tr class="eddge">
        <td>
          <a href="" onClick="alert('前');">
          &laquo;</a>
        </td>
        <td colspan="5"><?php
          $date = new DateTime();
          echo $date->format('M Y');
          ?></td>
        <td>
          <a href="" onClick="alert('次');">
          &raquo;</a>
        </td>
      </tr>
    </thead>
      <tbody>
      <tr>
        <td>Sun</td>
        <td>Mon</td>
        <td>Tue</td>
        <td>Wed</td>
        <td>Thu</td>
        <td>Fri</td>
        <td>Sat</td>
      </tr>
      <?php echo $body; ?>
      <tr class="today">
        <td colspan="7">Today</td>
      </tr>

    </tbody>
  </table>
</body>
</html>
