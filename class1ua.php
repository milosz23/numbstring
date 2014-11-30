<?php

require 'class1ru.php';

class Numbstring_ua extends Numbstring_ru 
{
    protected $hundred = " ";
    protected $dash_digit = ' ';
    protected $appends_word_million = array(" мільйонів "," мільйона "," мільйон ");
    protected $appends_word_thousand = array(" тисяч "," тисячі "," тисяча ");
    protected $zero = 'нуль';

    protected $zero_to_nine = array('нуль','один','два','три','чотири',"п'ять",'шість','сім','вісім',"дев'ять");
    protected $zero_to_nine_fem = array('нуль','одна','дві','три','чотири',"п'ять",'шість','сім','вісім',"дев'ять");
    protected $ten_to_nineteen = array('десять','одинадцять','дванадцять','тринадцять','чотирнадцять',"п'ятнадцять",'шістнадцять','сімнадцять','вісімнадцять',"дев'ятнадцять");
    protected $to_ninety = array('','','двадцять','тридцять','сорок',"п'ятдесят",'шістдесят','сімдесят','вісімдесят',"дев'яносто");
    protected $hundred_to_thousand = array("","сто","двісти","триста","чотириста","п'ятсот","шістьсот","сімсот","вісімсот","дев'ятьсот");

    
}

$Numbstring_ua = new Numbstring_ua(0);
echo $Numbstring_ua->get_result();

$Numbstring_ua2 = new Numbstring_ua(352152987);
echo $Numbstring_ua2->get_result();

$Numbstring_ua3 = new Numbstring_ua(537121987);
echo $Numbstring_ua3->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Numbstring ua</title>
</head>
<body>
    
</body>
</html>