<?php

$number = 621;
$string_num = (string)$number;
//arrays
$nine = array('zero','one','two','three','four','five','six','seven','eight','nine');
$ninety = array('','','twenty','thirty','fourty','fifty','sixty','seventy','eighty','ninety');
$tenteen = array('ten','eleven','twelwe','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen');



function simple($string_num, $nine, $tenteen, $ninety){
    $simple_result = '';
    if ($string_num[0]) {
        $simple_result .= $nine[ (int)$string_num[0] ] . " hundred ";
    }
    if ( (int)$string_num[1] === 1 ) {
        $simple_result .= $tenteen[ (int)$string_num[0] ];
    }
    else {
        if ($string_num[1]) {
            $simple_result .= $ninety[ (int)$string_num[1] ];
            //add '-' for 'thirty-three'-like digits---------
            if ($string_num[2]) {
                $simple_result .= '-';
            }//----------------------------------------------
        }
        if ($string_num[2]) {
            $simple_result .= $nine[ (int)$string_num[2] ];
        }

    }
    
    return $simple_result;
}

echo "<br><br> result= " . simple($string_num, $nine, $tenteen, $ninety);
?>