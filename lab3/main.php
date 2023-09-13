<?php

class Catalog
{
    function add($arg1)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $res = $db->query("select * from catalog where name == '$arg1'");
        if ($myrow = $res->fetch()) {
            echo "";
        }
        else $db->query("insert into catalog (name) values('$arg1')");
    }

    function delete($arg1)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $res = $db->query("select * from catalog");
        if ($myrow = $res->fetch()) {
            $db->query("delete from catalog where name == '$arg1'");
        }
    }

    function updateById($id, $new_name)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $db->query("update catalog set id = '$id', name = '$new_name' where id = '$id'");
    }

    function updateByName($old_name, $new_name)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $db->query("update catalog set id = id, name = '$new_name' where name = '$old_name'");
    }

    function display()
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $r = $db->query("select * from catalog");

        if($myrow = $r->fetch())
        {
            printf("id\t\tname\n");
            do
            {
                printf("%s\t\t", $myrow["id"]);
                printf("%s\t\t\t\n", $myrow["name"]);
            }while($myrow = $r->fetch());
        }
        else {
            echo "Sorry, no records were found.";
        }
    }
}

$cg = new Catalog();
print("before: \n");
$cg->display();
$cg->add("books");
//$cg->delete("clothes");
//$cg->updateById(3, "Clothes");
//$cg->updateByName("food", "Food");
print("after: \n");
$cg->display();

//1).Разработать структуру БД для интернет магазина (Каталог-Товары)
//2).Используя расширение mysqli подключиться к MySQL. Прочитать можно  http://fi2.php.net/manual/ru/book.mysqli.php
//3).Написать скрипты для добавления/удаления/редактирования/просмотра товаров/каталога.
