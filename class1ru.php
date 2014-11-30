<?php

require 'class1.php';

class Numbstring_ru extends Numbstring 
{
    protected $hundred = " ";
    protected $dash_digit = ' ';
    protected $appends_word_million = array(" миллионов "," миллиона "," миллион ");
    protected $appends_word_thousand = array(" тысяч "," тысячи "," тысяча ");
    protected $zero = 'ноль';

    protected $zero_to_nine = array('ноль','один','два','три','четыре','пять','шесть','семь','восемь','девять');
    protected $zero_to_nine_fem = array('ноль','одна','две','три','четыре','пять','шесть','семь','восемь','девять');
    protected $ten_to_nineteen = array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать','пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
    protected $to_ninety = array('','','двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят','восемьдесят','девяносто');
    protected $hundred_to_thousand = array("","сто","двести","триста","четыреста","пятьсот","шестьсот","семьсот","восемьсот","девятьсот");

}

$Numbstring_ru = new Numbstring_ru(200000);
echo $Numbstring_ru->get_result();

$Numbstring_ru2 = new Numbstring_ru(352125987);
echo $Numbstring_ru2->get_result();

$Numbstring_ru3 = new Numbstring_ru(531121987);
echo $Numbstring_ru3->get_result();

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