<?php

$number = 302652821;
$max_digits = 9;
//arrays
$nine_ru = array('ноль','один','два','три','четыре','пять','шесть','семь','восемь','девять');
$ninety_ru = array('','','двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят','восемьдесят','девяносто');
$tenteen_ru = array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать','пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
$hundred_ru = array("","сто","двести","триста","четыреста","пятьсот","шестьсот","семьсот","восемьсот","девятьсот");
$mil_appends_ru = array(" миллионов "," миллиона "," миллион ");
$thous_appends_ru = array(" тысяч "," тысячи "," тысяча ");

function append_leading_zeros($number, $length){
    $number_as_string = (string)$number;
    while ( strlen($number_as_string)<$length ) {
       $number_as_string = '0' . $number_as_string;
    }
    return $number_as_string;
}

function simple($number_as_string, $nine_ru, $tenteen_ru, $ninety_ru,$hundred_ru){
    if ( $number_as_string === 0 ) {
        return 'zero';
    }
    $simple_result = '';
    
    if ($number_as_string[0]) {
        $simple_result .= $hundred_ru[ (int)$number_as_string[0] ] . " ";
    }
    if ( (int)$number_as_string[1] === 1 ) {
        $simple_result .= $tenteen_ru[ (int)$number_as_string[2] ];
    }
    else {
        if ($number_as_string[1]) {
            $simple_result .= $ninety_ru[ (int)$number_as_string[1] ]  . " ";
        }
        if ($number_as_string[2]) {
            $simple_result .= $nine_ru[ (int)$number_as_string[2] ];
        }

    }
    
    return $simple_result;
}

function million_thousand($str, $nine_ru, $tenteen_ru, $ninety_ru,$hundred_ru, $appends_ru){
    if ( (int)$str ) {
        $result = simple($str, $nine_ru, $tenteen_ru, $ninety_ru,$hundred_ru);
        if ( strpos("056789", $str[2]) !== FALSE || $str[1] === '1') {
            $append = $appends_ru[0];
        }
        elseif ( strpos("234", $str[2]) !== FALSE ) {
            $append = $appends_ru[1];
        }
        else {
            $append = $appends_ru[2];
        }
        $result .= $append;
    }
    else {
        $result = '';
    }
    return $result;
}

function ones($number_as_string, $nine_ru, $tenteen_ru, $ninety_ru,$hundred_ru){
    $str = $number_as_string[6] . $number_as_string[7] . $number_as_string[8];
    if ( (int)$str ) {
        $result = simple($str, $nine_ru, $tenteen_ru, $ninety_ru,$hundred_ru);
    }
    else {
        $result = '';
    }
    return $result;
}
$number_as_string = append_leading_zeros($number, $max_digits);
$number_million = $number_as_string[0] . $number_as_string[1] . $number_as_string[2];
$number_thousand = $number_as_string[3] . $number_as_string[4] . $number_as_string[5];
$result = million_thousand($number_million, $nine_ru, $tenteen_ru, $ninety_ru,$hundred_ru, $mil_appends_ru) . 
          million_thousand($number_thousand, $nine_ru, $tenteen_ru, $ninety_ru,$hundred_ru, $thous_appends_ru) .
          ones($number_as_string, $nine_ru, $tenteen_ru, $ninety_ru,$hundred_ru); 
echo "number=$number<br>result= " . $result;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Numbstring</title>
</head>
<body>
    
</body>
</html>