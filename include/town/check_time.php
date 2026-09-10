<?
$check=date("G");
if ( $check<=5 || $check>23 ) { $status="night"; // ночь
} elseif ( $check<=10 || $check>5 ) { $status="light"; // утро
} elseif ( $check<=18 || $check>10 ) { $status="light"; // день
} elseif ( $check<=23 || $check>18 ) { $status="night"; //  вечер
}
?>