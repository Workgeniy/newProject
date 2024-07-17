<?php

/*$variable = 1;

echo $variable;
echo "<br>";
echo PHP_EOL;
echo gettype($variable);

echo PHP_EOL;
$string = "hello";
echo $string;
echo PHP_EOL;
echo gettype($string);

echo PHP_EOL;
$boolean = true;
var_dump($boolean);

echo PHP_EOL;
$boolean = false;
var_dump($boolean);

echo PHP_EOL;
$float = 1.7;
var_dump($float);
echo gettype($float);


echo PHP_EOL;
$null = null;
var_dump($null);

$a = 10;
$b = 20;
var_dump($a);
var_dump($b);
$tmp = $a;
$a= $b;
$b = $tmp;
var_dump($a);
var_dump($b);

*/

//$var = "5.03qwerty";
//echo ((float)$var);

//echo "hello" . " " . "world";

/*
if (true){
// req
}
elseif{
//not req
}
else{
//not req
}
*/
$a = 2;
$b = 5;

if ($a == $b){
    echo "TRUE";
}
else {
    echo "FALSE";
}


$array = array(
    "John", 
    "Mary", 
    "David",
);

$array = [
    "John", 
    "Mary", 
    "David",
];
/*
$array = [];

$array = [
    'Russia' => 'Moscow', 
    'China' => 'Beigin',
    'Belorussia' => 'Minsk'
];

foreach ($array as $key => $value){
    echo 'Country' . $key . 'Capital' . $value. '<br>';
    echo "Country $key Capital $value<br>";
}

foreach ($array as $value){
    echo "Capital $value<br>";
}

foreach ($array as $value){
     $value .= '!!';
}
unset();
foreach ($array as  $value){
    echo "Capital $value<br>";
}
*/

$array = [
    'Russia' => ['Moscow', 'Piter', 'Tula'], 
    'China' => ['Beigin', 'Shanhay'],
    'Belorussia' => ['Minsk', 'Brest']
];

/*
foreach ($array as $capital => $cities) {
    echo "Country $capital <br><ul>";
   foreach ($cities as $city) {
    echo "<li> City $city</li>";
   }
   echo '<ul>';
}*/

foreach ($array as list($a)) {
    print_r($a);
}

for ($i =0 ;$i<10; $i++){
    $a[] = rand();
};

print_r ($a);

usort($a, function($a, $b) {return $a<=> $b;});

function nameFunction ($a, $b) {};

function nameFunction1 (int $a, int $b) {};

function nameFunction2 (int $a = 0, int $b = 0): int {};

$function = function (int $a = 0, int $b = 0): int {
    echo $a, $b;

    return 1;
};

$function(1, 2);