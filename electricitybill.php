<?php
$usage = 200;
switch ($usage) {
	case ($usage <= 50):
		$price = $usage * 3.5;
		echo "your bill is " . $price . " LE";
		break;
	case (($usage > 50) && ($usage < 100)):
		$price = $usage * 4;
		echo "your bill is " . $price . " LE";
		break;
	case ($usage > 150):
			$price = $usage * 6.5;
		echo "your bill is " . $price . " LE";
			break;	
	default:
		echo "Electricity OFF";
		break;
}