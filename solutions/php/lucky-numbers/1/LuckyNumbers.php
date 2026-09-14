<?php

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {    
        //number 1 구하기
        $num1 = "";
        foreach($digitsOfNumber1 as $number1) {
            $num1 .= $number1;
        }

        //number 2 구하기
        $num2 = "";
        foreach($digitsOfNumber2 as $number2) {
            $num2 .= $number2;
        }

        return (int)$num1 + (int)$num2;
    }

    public function isPalindrome(int $number): bool
    {
        $strnum = strval($number);
        $size = strlen($strnum);

        for($i = 0; $i < $size / 2; $i++) {
            if($strnum[$i] != $strnum[$size - $i - 1]) {
                return false; 
            }
        }
        return true;
    }

    public function validate(string $input): string
    {
        if($input === '') {
            return 'Required field';
        }

        if((int) $input <= 0) {
            return "Must be a whole number larger than 0";
        }
        return '';
    }
}
