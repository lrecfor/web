<?php

function f1(){
    $numbers = [];

    for ($i = 0; $i < 50; $i++) {
        $numbers[$i] = rand(-100, 150);
    }

    $mul = 1;
    for ($i = 0; $i < 50; $i++) {
        if ($numbers[$i] > 0 && $i % 2 == 0)
            $mul *= $numbers[$i];
    }

    return $mul;
//    1). Вам нужно создать массив (50 элементов) и заполнить его случайными числами от -100 до 150 (ф-я rand).
// Далее, вычислить произведение тех элементов, которые больше ноля и у которых индексы четные цифры.
}

function f2($fio)
{
    $words = explode(" ", $fio);
    return $words[0]." ".$words[1][0].". ".$words[2][0].".";
//    2). Создание сокращенного варианта ФИО т. е. вводим: Иванов Иван Петрович и нам выводит: Иванов И. П.
}

function f3()
{
    $numbers = [];

    for ($i = 0; $i < 10; $i++) {
        $numbers[$i] = rand(0, 150);
    }

    $min = min($numbers);
    $max = max($numbers);
    $min_pos = array_search($min, $numbers);
    $max_pos = array_search($max, $numbers);

    $numbers[$min_pos] = $max;
    $numbers[$max_pos] = $min;

    print($min); printf(" %d\n", $max);
    return $numbers;
//    3). Cоздать массив, заполнить случайными значениями (функция rand), найти максимальное и минимальное значение
// и поменять их местами.
}

function f4($number)
{
    $red = 2;
    $green = 3;
    $color = 0;

    if ($number % 3 == 0)
    {
        return "green";
    }
    else if ($number % 5 == 0)
        return "red";
    else if ($number % 8 == 0)
        return "green";
    else
        return "red";

    //return $color;
//    4) Работа светофора запрограммирована таким образом: с начала каждого часа, в течении трех минут горит зеленый
// сигнал, следующие две минуты горит красный, дальше в течении трех минут - зеленый и т. д. Вам нужно разработать
// программу, которая по введенному числу определяла какого цвета сейчас горит сигнал.
}

printf("1) "); printf(f1());
printf("\n2) "); printf(f2("Ivanov Ivan Petrovich"));
printf("\n3) "); print_r(f3());
printf("\n4) "); print_r(f4(4));
