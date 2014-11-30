<?php
 require 'data.php';
/**
* 
*/
class Numbstring
{
    private $number;
    private $max_length = 9;
    private $num_as_string;

    //attributes below are different for diff langs and will be fetched from data.php
    protected $hundred = " hundred ";
    protected $dash_digit = '-';
    protected $appends_word_million = array(' million ',' million ',' million ');
    protected $appends_word_thousand = array(' thousand ',' thousand ',' thousand ');
    protected $zero = 'zero';

    protected $zero_to_nine = array('zero','one','two','three','four','five','six','seven','eight','nine');
    protected $zero_to_nine_fem = array('zero','one','two','three','four','five','six','seven','eight','nine');
    protected $ten_to_nineteen = array('ten','eleven','twelwe','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen');
    protected $to_ninety = array('','','twenty','thirty','fourty','fifty','sixty','seventy','eighty','ninety');
    protected $hundred_to_thousand = array('zero','one','two','three','four','five','six','seven','eight','nine');
    //-------------------------------------------------------------------------------------


    /**
     * CONSTRUCT
     */
    function __construct($number,$data)
    {
        $this->number = $number;
        echo $number . "<br>";
        $this->num_as_string = $this->append_leading_zeros();

        //hyvhjkblbuvcuiviuik
        $this->hundred = $data['hundred'];
        $this->dash_digit = $data['dash_digit'];
        $this->appends_word_million = $data['appends_word_million'];
        $this->appends_word_thousand = $data['appends_word_thousand'];
        $this->zero = $data['zero'];;

        $this->zero_to_nine = $data['zero_to_nine'];
        $this->zero_to_nine_fem = $data['zero_to_nine_fem'];
        $this->ten_to_nineteen = $data['ten_to_nineteen'];
        $this->to_ninety = $data['to_ninety'];
        $this->hundred_to_thousand = $data['hundred_to_thousand'];
           
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
        return $num_as_string;
    }

    /**
     * THREE DIGITS TRANSFORM
     */
    private function three_digits_transform($string, $zero_to_nine)
    {
        $simple_result = '';

        if ($string[0]) 
        {
            $simple_result .= $this->hundred_to_thousand[ (int)$string[0] ] . $this->hundred;
        }
        if ( (int)$string[1] === 1 ) 
        {
            $simple_result .= $this->ten_to_nineteen[ (int)$string[2] ];
        }
        else 
        {
            if ($string[1]) 
            {
                $simple_result .= $this->to_ninety[ (int)$string[1] ];
                //add '-' for 'thirty-three'-like digits---------
                if ($string[2]) 
                {
                    $simple_result .= $this->dash_digit;
                }//----------------------------------------------
            }
            if ($string[2]) 
            {
                $simple_result .= $zero_to_nine[ (int)$string[2] ];
            }

        }

        return $simple_result;
    }
    
    /**
     * MILLION word
     */
    protected function word_million_thousand($million_thousand,$appends)
    {
        if ( strpos("056789", $million_thousand[2]) !== FALSE || $million_thousand[1] === '1') 
        {
            $append = $appends[0];
        }
        elseif ( strpos("234", $million_thousand[2]) !== FALSE ) 
        {
            $append = $appends[1];
        }
        else 
        {
            $append = $appends[2];
        }

        return $append;
    }

    /**
     * GET RESULT
     */
    public function get_result()
    {
        $result = "";
        if ($this->number === 0) 
        {
            $result = $this->zero;
        }
        else
        {
            $million  = $this->num_as_string[0] . $this->num_as_string[1] . $this->num_as_string[2];
            $thousand = $this->num_as_string[3] . $this->num_as_string[4] . $this->num_as_string[5];        
            $ones     = $this->num_as_string[6] . $this->num_as_string[7] . $this->num_as_string[8];
            
            $result .= ($million === '000') ? '' : $this->three_digits_transform($million,$this->zero_to_nine) . $this->word_million_thousand($million, $this->appends_word_million);
            $result .= ($thousand === '000') ? '' : $this->three_digits_transform($thousand,$this->zero_to_nine_fem) . $this->word_million_thousand($thousand, $this->appends_word_thousand);
            $result .= ($ones === '000') ? '' : $this->three_digits_transform($ones,$this->zero_to_nine);            
        }

        return $result;
    }

}

?>