<?php

/**
* 
*/
class Numbstring
{
    private $number;
    private $max_length = 9;
    private $num_as_string;
    protected $hundred = " hundred ";
    protected $dash_digit = '-';

    protected $zero_to_nine = array('zero','one','two','three','four','five','six','seven','eight','nine');
    protected $hundred_to_thousand = array('zero','one','two','three','four','five','six','seven','eight','nine');
    protected $ten_to_nineteen = array('ten','eleven','twelwe','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen');
    protected $to_ninety = array('','','twenty','thirty','fourty','fifty','sixty','seventy','eighty','ninety');
    


    /**
     * CONSTRUCT
     */
    function __construct($number)
    {
        $this->number = $number;
        echo $number . "<br>";
        $this->num_as_string = $this->append_leading_zeros();
    }

    /**
     * APPEND LEADING
     */
    private function append_leading_zeros()
    {
        $num_as_string = (string)$this->number;
        while ( strlen($num_as_string)<$this->max_length ) 
        {
           $num_as_string = '0' . $num_as_string;
        }
        echo "<br>$num_as_string<br>";
        return $num_as_string;
    }

    /**
     * THREE DIGITS TRANSFORM
     */
    protected function three_digits_transform($string)
    {
        $simple_result = '';

        if ($string[0]) {
            $simple_result .= $this->hundred_to_thousand[ (int)$string[0] ] . $this->hundred;
        }
        if ( (int)$string[1] === 1 ) {
            $simple_result .= $this->ten_to_nineteen[ (int)$string[2] ];
        }
        else {
            if ($string[1]) {
                $simple_result .= $this->to_ninety[ (int)$string[1] ];
                //add '-' for 'thirty-three'-like digits---------
                if ($string[2]) {
                    $simple_result .= $this->dash_digit;
                }//----------------------------------------------
            }
            if ($string[2]) {
                $simple_result .= $this->zero_to_nine[ (int)$string[2] ];
            }

        }

        return $simple_result;
    }
    
    /**
     * MILLION word
     */
    protected function word_million()
    {
        return ' million ';
    }

    /**
     * THOUSAND word
     */
    protected function word_thousand()
    {
        return ' thousand ';
    }

    /**
     * GET RESULT
     */
    public function get_result()
    {
        $result = "";
        $million  = $this->num_as_string[0] . $this->num_as_string[1] . $this->num_as_string[2];
        $thousand = $this->num_as_string[3] . $this->num_as_string[4] . $this->num_as_string[5];        
        $ones     = $this->num_as_string[6] . $this->num_as_string[7] . $this->num_as_string[8];
        
        $result .= ($million === '000') ? '' : $this->three_digits_transform($million) . $this->word_million();
        $result .= ($thousand === '000') ? '' : $this->three_digits_transform($thousand) . $this->word_thousand();
        $result .= ($ones === '000') ? '' : $this->three_digits_transform($ones);

        return $result;
    }

}

$Numbstring = new Numbstring(987654321);

echo $Numbstring->get_result();


?>