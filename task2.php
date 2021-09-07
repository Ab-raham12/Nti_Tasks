<?php
//Write a PHP function to print the next character of a specific character
$input = 'a';  //Output : 'b'
function get_b(string $arg){
	$arg++;
	echo  $arg;
}
get_b($input);
echo "<hr>";
//Write a PHP function to print the next character of a specific character
//input : z    output : a
//Answer num1
$char = 'z';
$next_char = ++$char; 
if (strlen($next_char) > 1) { // if you go beyond z or Z reset to a or A
 $next_char = $next_char[0];
 echo $next_char;
}
echo "<br>";
//Answer2
$character = 'z';
$character++;
echo $character[1];
echo "<hr>";
//Write a PHP function to extract the file name from the following string.
$link = 'www.example.com/public_html/index.php';
function get_page($arg){
	$result = strstr($arg, 'index.php');
	echo $result;
}
get_page($link);
echo "<hr>";