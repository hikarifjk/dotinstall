<?php

try {
  if (!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}\z/', $_GET['t'])) {
      throw new Exception();
  }
  $thisMonth = new DateTime($_GET['t']);
} catch (Exception $e) {
  $thisMonth = new DateTime('first day of this month');
}
// var_dump($thisMonth);
// exit;


// $t = '2015-08';
// $thisMonth = new DateTime($t);
$yearMonth = $thisMonth->format('F Y');

$tail = '';
$lastDayOfPrevMonth = new DateTime('last day of ' . $yearMonth . ' -1 month');
while ($lastDayOfPrevMonth->format('w') < 6) {
  $tail .= sprintf('<td class="gray">%d</td>', $lastDayOfPrevMonth->format('d'));
  $lastDayOfPrevMonth->sub(new DateInterval('P1D'));
}


$body = '';
$period = new DatePeriod(
  new DateTime('first day of ' . $yearMonth),
  new DateInterval('P1D'),
  new DateTime('first day of ' . $yearMonth . ' +1 month')
);

foreach ($period as $day) {
  if ($day->format('w') % 7 === 0) {
    $body .= '</tr><tr>';
  }
  $body .= sprintf('<td class="youbi_%d">%d</td>', $day->format('w'), $day->format('d'));
}

$firstDayOfNextMonth = new DateTime('first day of ' . $yearMonth . ' +1 month');
while ($firstDayOfNextMonth->format('w') > 0) {
  $head .= sprintf('<td class="gray">
  %d</td>', $firstDayOfNextMonth->format('d'));
  $firstDayOfNextMonth->add(new DateInterval('P1D'));
}
$html = '<tr>' . $tail . $body . $head . '</tr>';

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
          echo $yearMonth;
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
      <?php echo $html; ?>
      <tr class="today">
        <td colspan="7">Today</td>
      </tr>

    </tbody>
  </table>
</body>
</html>
