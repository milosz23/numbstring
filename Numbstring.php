<?php

/**
* Class transforms numbers to text form
*/
class Numbstring
{
    private $number;         // input number
    private $max_length = 9; // standard lenght of input number
    private $num_as_string;  // input number,with type of string

    //attributes below are different for diff langs and will be fetched from languages.php
    private $hundred = "";
    private $dash_digit = "";
    private $appends_word_million = array();
    private $appends_word_thousand = array();
    private $zero = "";

    private $zero_to_nine = array();
    private $zero_to_nine_fem = array();
    private $ten_to_nineteen = array();
    private $to_ninety = array();
    private $hundred_to_thousand = array();
    //-------------------------------------------------------------------------------------


    /**
     * Gets input number and language data. Prepare them for following usage
     */
    function __construct($number,$data)
    {
        $this->number = $number;
        $this->num_as_string = $this->append_leading_zeros();

        //getting data from languages.php
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
     * Makes the number of standard lenght by appending zeros in front of it
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
     * Transforms 3-digits number to text form 
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
                //adds '-' for 'thirty-three'-like digits---------
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
     * Adds word 'million' or 'thousand' after 3-digits number
     */
    private function word_million_thousand($million_thousand,$appends)
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
     * Gets final result of transformation number to text
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
            //this 3 strings represents 3-digits numbers with weight of million,thousand or ones
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