<?php
$begin = new DateTime('2010-05-28');
$end = new DateTime('2010-06-03');

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);

foreach ($period as $dt) {
    echo $dt->format("l Y-m-d H:i:s\n");
    echo "<br>";
}
$begin = new DateTime( "2015-12-28" );
$end   = new DateTime( "2016-01-05" );

for($i = $begin; $i <= $end; $i->modify('+1 day')){
    echo $i->format("Y-m-d");
    echo "<br>";
}
?>