<?php

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}


try {
  if (!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}\z/', $_GET['t'])) {
      throw new Exception();
  }
  $thisMonth = new DateTime($_GET['t']);
} catch (Exception $e) {
  $thisMonth = new DateTime('first day of this month');
}

$dt = clone $thisMonth;
$prev = $dt->modify('-1 month')->format('Y-m');
$dt = clone $thisMonth;
$next = $dt->modify('+1 month')->format('Y-m');

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

$today = new DateTime('today');
foreach ($period as $day) {
  if ($day->format('w') % 7 === 0) {
    $body .= '</tr><tr>';
  }
  $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d')) ? 'today' : '';
  $body .= sprintf('<td class="youbi_%d">%d</td>', $day->format('w'), $todayClass, $day->format('d'));
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

      <tr>
        <th>
          <a href="/?t=<?php echo h($prev); ?>">&laquo;</a>
        </th>
        <th colspan="5"><?php
          echo h($yearMonth);
          ?></th>
        <th>
          <a href="/?t=<?php echo h($next); ?>">
          &raquo;</a>
        </th>
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
    </tbody>
    <tfoot>
      <tr class="today">
        <th colspan="7"><a href="/">Today</a></th>
      </tr>
    </tfoot>

  </table>
</body>
</html>
