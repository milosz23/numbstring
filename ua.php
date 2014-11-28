<?php

$number = 307654821;
$max_digits = 9;
//arrays
$nine_ua = array('нуль','один','два','три','чотири',"п'ять",'шість','сім','вісім',"дев'ять");
$ninety_ua = array('','','двадцять','тридцять','сорок',"п'ятдесят",'шістдесят','сімдесят','вісімдесят',"дев'яносто");
$tenteen_ua = array('десять','одинадцять','дванадцять','тринадцять','чотирнадцять',"п'ятнадцять",'шістнадцять','сімнадцять','вісімнадцять',"дев'ятнадцять");
$hundred_ua = array("","сто","двісти","триста","чотириста","п'ятсот","шістьсот","сімсот","вісімсот","дев'ятьсот");
$mil_appends_ua = array(" мільйонів "," мільйона "," мільйон ");
$thous_appends_ua = array(" тисяч "," тисячі "," тисяча ");

function append_leading_zeros($number, $length){
    $number_as_string = (string)$number;
    while ( strlen($number_as_string)<$length ) {
       $number_as_string = '0' . $number_as_string;
    }
    return $number_as_string;
}

function simple($number_as_string, $nine_ua, $tenteen_ua, $ninety_ua,$hundred_ua){
    if ( $number_as_string === 0 ) {
        return 'zero';
    }
    $simple_result = '';
    if ($number_as_string[0]) {
        $simple_result .= $hundred_ua[ (int)$number_as_string[0] ] . " ";
    }
    if ( (int)$number_as_string[1] === 1 ) {
        $simple_result .= $tenteen_ua[ (int)$number_as_string[2] ];
    }
    else {
        if ($number_as_string[1]) {
            $simple_result .= $ninety_ua[ (int)$number_as_string[1] ]  . " ";
        }
        if ($number_as_string[2]) {
            $simple_result .= $nine_ua[ (int)$number_as_string[2] ];
        }

    }
    
    return $simple_result;
}

function million_thousand($str, $nine_ua, $tenteen_ua, $ninety_ua,$hundred_ua, $appends_ru){
    if ( (int)$str ) {
        $result = simple($str, $nine_ua, $tenteen_ua, $ninety_ua,$hundred_ua);
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

function ones($number_as_string, $nine_ua, $tenteen_ua, $ninety_ua,$hundred_ua){
    $str = $number_as_string[6] . $number_as_string[7] . $number_as_string[8];
    if ( (int)$str ) {
        $result = simple($str, $nine_ua, $tenteen_ua, $ninety_ua,$hundred_ua);
    }
    else {
        $result = '';
    }
    return $result;
}
$number_as_string = append_leading_zeros($number, $max_digits);
$number_million = $number_as_string[0] . $number_as_string[1] . $number_as_string[2];
$number_thousand = $number_as_string[3] . $number_as_string[4] . $number_as_string[5];
$result = million_thousand($number_million, $nine_ua, $tenteen_ua, $ninety_ua,$hundred_ua, $mil_appends_ua) . 
          million_thousand($number_thousand, $nine_ua, $tenteen_ua, $ninety_ua,$hundred_ua, $thous_appends_ua) .
          ones($number_as_string, $nine_ua, $tenteen_ua, $ninety_ua,$hundred_ua); 
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