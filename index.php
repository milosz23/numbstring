<?php

$number = 123456789;
$max_digits = 9;
//arrays
$nine = array('zero','one','two','three','four','five','six','seven','eight','nine');
$ninety = array('','','twenty','thirty','fourty','fifty','sixty','seventy','eighty','ninety');
$tenteen = array('ten','eleven','twelwe','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen');

function append_leading_zeros($number, $length){
    $number_as_string = (string)$number;
    while ( strlen($number_as_string)<$length ) {
       $number_as_string = '0' . $number_as_string;
    }
    return $number_as_string;
}

function simple($number_as_string, $nine, $tenteen, $ninety){
    if ( $number_as_string === 0 ) {
        return 'zero';
    }
    $simple_result = '';
    if ($number_as_string[0]) {
        $simple_result .= $nine[ (int)$number_as_string[0] ] . " hundred ";
    }
    if ( (int)$number_as_string[1] === 1 ) {
        $simple_result .= $tenteen[ (int)$number_as_string[2] ];
    }
    else {
        if ($number_as_string[1]) {
            $simple_result .= $ninety[ (int)$number_as_string[1] ];
            //add '-' for 'thirty-three'-like digits---------
            if ($number_as_string[2]) {
                $simple_result .= '-';
            }//----------------------------------------------
        }
        if ($number_as_string[2]) {
            $simple_result .= $nine[ (int)$number_as_string[2] ];
        }

    }
    
    return $simple_result;
}

function million($number_as_string, $nine, $tenteen, $ninety){
    $str = $number_as_string[0] . $number_as_string[1] . $number_as_string[2];
    if ( (int)$str ) {
        $result = simple($str, $nine, $tenteen, $ninety) . ' million ';
    }
    else {
        $result = '';
    }
    echo "<br> million  str=$str   result=$result<br>";
    return $result;
}

function thousand($number_as_string, $nine, $tenteen, $ninety){
    $str = $number_as_string[3] . $number_as_string[4] . $number_as_string[5];
    if ( (int)$str ) {
        $result = simple($str, $nine, $tenteen, $ninety) . ' thousand ';
    }
    else {
        $result = '';
    }
    return $result;
}

function ones($number_as_string, $nine, $tenteen, $ninety){
    $str = $number_as_string[6] . $number_as_string[7] . $number_as_string[8];
    if ( (int)$str ) {
        $result = simple($str, $nine, $tenteen, $ninety);
    }
    else {
        $result = '';
    }
    return $result;
}
$number_as_string = append_leading_zeros($number, $max_digits);
$result = million($number_as_string, $nine, $tenteen, $ninety) . 
          thousand($number_as_string, $nine, $tenteen, $ninety) . 
          ones($number_as_string, $nine, $tenteen, $ninety); 
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