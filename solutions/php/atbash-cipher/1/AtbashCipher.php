<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

const ALPHA = [
    'a', 'b', 'c', 'd', 'e', 'f',
    'g', 'h', 'i', 'j', 'k', 'l',        
    'm', 'n', 'o', 'p', 'q', 'r',
    's', 't', 'u', 'v', 'w', 'x',
    'y', 'z'
    ];

// 암호화
function encode(string $text): string
{    
    $result = "";
    for($i = 0; $i < strlen($text); $i++) {
        $current = strtolower($text[$i]);
        $index = array_search($current, ALPHA, true); //현재 알파벳 위치 탐색
        if($index !== false) {
            $result .= ALPHA[25 - $index];
        }else if(ctype_digit($current)) { //숫자 그대로 추가
            $result .= $current;
        }
    }
    return implode(' ', str_split($result, 5));
}

// 복호화
function decode(string $text): string
{
    $result = "";
    for($i = 0; $i < strlen($text); $i++) {
        $current = strtolower($text[$i]);
        $index = array_search($current, ALPHA, true);
        if($index !== false) {
            $result .= ALPHA[25 - $index];
        }else if(ctype_digit($current)) {
            $result .= $current;
        }
    }

    return $result;
}
