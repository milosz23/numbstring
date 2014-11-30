<?php

require 'Numbstring.php';
require 'languages.php';

//validates number from input form. if valid - make 3 instances of class for 3 languages and get results
if ( isset($_GET['number']) ) 
{
    $number = htmlspecialchars($_GET['number']);
    if ( is_numeric($number)  && (int)$number >= 0 && (int) $number < 1e9 ) 
    {
        $Numbstring = new Numbstring((int)$number, $english);
        $result = $Numbstring->get_result();

        $Numbstring_ru = new Numbstring((int)$number, $russian);
        $result_ru = $Numbstring_ru->get_result();

        $Numbstring_ua = new Numbstring((int)$number, $ukrainian);
        $result_ua = $Numbstring_ua->get_result();
    }
    else
    {
        $status = 'Please enter valid number! (it goes somewhere berween 0 and 999 million)';
    }
}

require 'view.php';

?>