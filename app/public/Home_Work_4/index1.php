<?php

//Задание 1
$var = 100;
$var = $var*0.5;
$var = sqrt($var);
$var = (int)$var;

echo "Задание 1";
echo "<br>";
var_dump($var);

//Задание 2
$x = 2;
$y = 3;
$z = 4;

$length = sqrt($x*$x + $y*$y + $z + $z);

echo "<br>";
echo "Задание 2";
echo "<br>";
var_dump($length);

//Задание 3
$strPoly = "madam";
$count = strlen($strPoly) - 1;
$isEquality = 0;
for ($i=0;$i < strlen($strPoly); $i++){ 
  if ($strPoly[$i] == $strPoly[$count]){
    $isEquality++;
    $count--;
  }
}
echo "<br>";
echo "Задание 3";
echo "<br>";
if ($isEquality == strlen($strPoly)){
    echo "Является палиндромом";
}
else{ echo "Не является палиндромом";}

//Задание 4
function Table ($a){
    $array = array();
   for ($i=0; $i < 10; $i++) { 
   $array[$i . "*" . $a] = $a*$i;
   }
   return $array;
}
echo "<br>";
echo "Задание 4";
echo "<br>";
$table = Table(3);
print_r($table);
