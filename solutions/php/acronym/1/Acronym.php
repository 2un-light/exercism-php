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

function acronym(string $text): string
{
    //하이픈을 공백으로 바꿔서 단어 구분자로 처리
    $text = str_replace('-', ' ', $text);

    //알파벳, 숫자, 공백을 제외한 문장부호 제거
    $text = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text);

    //공백 기준으로 단어 분리
    $words = preg_split('/\s+/', trim($text));

    $result = '';
    foreach($words as $word) {
        $result .= strtoupper($word[0]);
    }

    return $result;
}
