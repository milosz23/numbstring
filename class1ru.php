<?php

require 'class1.php';

class Numbstring_ru extends Numbstring 
{
    protected $zero_to_nine = array('ноль','один','два','три','четыре','пять','шесть','семь','восемь','девять');
    protected $ten_to_nineteen = array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать','пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
    protected $to_ninety = array('','','двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят','восемьдесят','девяносто');
    protected $hundred = " ";
    protected $hundred_to_thousand = array("","сто","двести","триста","четыреста","пятьсот","шестьсот","семьсот","восемьсот","девятьсот");
    protected $dash_digit = ' ';

    /**
     * MILLION word
     */
    protected function word_million()
    {
        return ' миллион ';
    }

    /**
     * THOUSAND word
     */
    protected function word_thousand()
    {
        return ' тысяча ';
    }

}

$Numbstring_ru = new Numbstring_ru(10000125);
echo $Numbstring_ru->get_result();

$Numbstring_ru2 = new Numbstring_ru(357124987);
echo $Numbstring_ru2->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Numbstring ru</title>
</head>
<body>
    
</body>
</html>