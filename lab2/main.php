<?php

function f1($num)
{
    if ($num <= 1)
        return 1;
    return $num * f1($num - 1);
//    1).Написать функцию для вычисления факториала.
}

function f2()
{
    $array = array(1,1,1,2,2,2,2,3);
    $result = [];
    foreach ($array as &$value)
    {
        if (in_array($value, $result))
            continue;
        else $result[] = $value;
    }
    unset($value);

    return $result;
//2). У нас есть массив $array = array(1,1,1,2,2,2,2,3), необходимо вывести 1,2,3, то есть вывести без дублей при помощи
// лишь одного цикла foreach без использования функций группировки элементов массива и не нарушая данный массив.
}

function f3($text)
{
    $new_text = explode(" ", $text);
    foreach ($new_text as &$word)
    {
        if (strlen($word) <= 7)
            continue;
        else $word = substr($word, 0, 6)."*";
    }
    unset($word);
    return implode(" ", $new_text);
//    3). Дан длинный текст, в нём встречаются слова длиннее 7 символов! Если слово длиннее 7 символов, то необходимо:
// оставить первые 6 символа и добавить звёздочку. Остальные символы вырезаются. Шаблон: "я купил бензогенератор вчера" . Результат: "я купил бензог* вчера"..
}

printf("1) %d\n", f1(5));
printf("2) "); print_r(f2()); print("\n");
printf("3) %s\n", f3("i kupil benzogenerator vchera"));