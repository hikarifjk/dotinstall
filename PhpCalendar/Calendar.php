<?php

namespace MyApp;

class Calendar {
  public $prev;
  public $next;
  public $yearMonth;
  private $_thisMonth;

  public function __construct() {
    try {
      if (!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}\z/', $_GET['t'])) {
<<<<<<< HEAD
          throw new Exception();
      }
      $this->$_thisMonth = new \DateTime($_GET['t']);
    } catch (Exception $e) {
      $this->$_thisMonth = new \DateTime('first day of this month');
    }

    $this->prev = $this->_createPrevLink();
    $this->next = $this->_createNextLink();
    $this->_thisMonth = new DateTime('first day of this month');
=======
          throw new \Exception();
      }
      $this->_thisMonth = new \DateTime($_GET['t']);
    } catch (\Exception $e) {
      $this->_thisMonth = new \DateTime('first day of this month');
    }


    $this->prev = $this->_createPrevLink();

    $this->next = $this->_createNextLink();
    $this->yearMonth = $this->_thisMonth->format('F Y');
>>>>>>> 78b17cad9179a27f6ef956fadb2f74b412c695f5

  }

  private function _createPrevLink() {
<<<<<<< HEAD
    $dt = clone $thisMonth;
    return $dt->modify('-1 month')->format('Y-m');
  }
  private function _createNextLink() {
    $dt = clone $thisMonth;
=======
    $dt = clone $this->_thisMonth;
    return $dt->modify('-1 month')->format('Y-m');
  }
  private function _createNextLink() {
    $dt = clone $this->_thisMonth;
>>>>>>> 78b17cad9179a27f6ef956fadb2f74b412c695f5
    return $dt->modify('+1 month')->format('Y-m');
  }


  public function show()
  {
    $tail = $this->_getTail();
    $body = $this->_getBody();
    $head = $this->_getHead();
    $html = '<tr>' . $tail . $body . $head . '</tr>';
    echo $html;
  }
  private function _getTail() {
    $tail = '';
<<<<<<< HEAD
    $lastDayOfPrevMonth = new DateTime('last day of ' . $this->$yearMonth . ' -1 month');
    while ($lastDayOfPrevMonth->format('w') < 6) {
      $tail .= sprintf('<td class="gray">%d</td>', $lastDayOfPrevMonth->format('d'));
      $lastDayOfPrevMonth->sub(new DateInterval('P1D'));
=======
    $lastDayOfPrevMonth = new \DateTime('last day of ' . $this->yearMonth . ' -1 month');
    while ($lastDayOfPrevMonth->format('w') < 6) {
      $tail .= sprintf('<td class="gray">%d</td>', $lastDayOfPrevMonth->format('d'));
      $lastDayOfPrevMonth->sub(new \DateInterval('P1D'));
>>>>>>> 78b17cad9179a27f6ef956fadb2f74b412c695f5
    }
    return $tail;
  }
  private function _getBody() {
    $body = '';
<<<<<<< HEAD
    $period = new DatePeriod(
      new DateTime('first day of ' . $this->$yearMonth),
      new DateInterval('P1D'),
      new DateTime('first day of ' . $this->$yearMonth . ' +1 month')
    );

    $today = new DateTime('today');
=======
    $period = new \DatePeriod(
      new \DateTime('first day of ' . $this->yearMonth),
      new \DateInterval('P1D'),
      new \DateTime('first day of ' . $this->yearMonth . ' +1 month')
    );

    $today = new \DateTime('today');
>>>>>>> 78b17cad9179a27f6ef956fadb2f74b412c695f5
    foreach ($period as $day) {
      if ($day->format('w') % 7 === 0) {
        $body .= '</tr><tr>';
      }
      $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d')) ? 'today' : '';
      $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'), $todayClass, $day->format('d'));
      // var_dump($day->format('d'));
    }
<<<<<<< HEAD

=======
    return $body;
>>>>>>> 78b17cad9179a27f6ef956fadb2f74b412c695f5
  }


  private function _getHead() {
    $head = '';
<<<<<<< HEAD
    $firstDayOfNextMonth = new DateTime('first day of ' . $this->$yearMonth . ' +1 month');
    while ($firstDayOfNextMonth->format('w') > 0) {
      $head .= sprintf('<td class="gray">
      %d</td>', $firstDayOfNextMonth->format('d'));
      $firstDayOfNextMonth->add(new DateInterval('P1D'));
    }
  }


}
//$yearMonth = $thisMonth->format('F Y');
=======
    $firstDayOfNextMonth = new \DateTime('first day of ' . $this->yearMonth . ' +1 month');
    while ($firstDayOfNextMonth->format('w') > 0) {
      $head .= sprintf('<td class="gray">
      %d</td>', $firstDayOfNextMonth->format('d'));
      $firstDayOfNextMonth->add(new \DateInterval('P1D'));
    }
    return $head;
  }
}
>>>>>>> 78b17cad9179a27f6ef956fadb2f74b412c695f5
