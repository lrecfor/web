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
        $del_id = "";
        if ($myrow = $res->fetch()) {
            $del_str = $db->query("select id from catalog where name == '$arg1'");
            $del_id = $del_str->fetch()["id"];
            $db->query("delete from catalog where name == '$arg1'");
            $db->query("delete from catalog where parent_id == '$del_id'");
        }
        $db->query("delete from goods where goods.cat_id == $del_id");
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


class Goods
{
    function add($arg1, $arg2, $arg3)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $res = $db->query("select * from goods where name == '$arg1'");
        if ($myrow = $res->fetch()) {
            echo "";
        }
        else $db->query("insert into goods (name, price, cat_id) values('$arg1', '$arg2', '$arg3')");
    }

    function delete($arg1)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $res = $db->query("select * from goods");
        $del_id = "";
        if ($myrow = $res->fetch()) {
            $del_str = $db->query("select id from goods where name == '$arg1'");
            $del_id = $del_str->fetch()["id"];
            $db->query("delete from goods where name == '$arg1'");
        }
    }

    function updateById($id, $new_name, $new_price, $new_cat)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $db->query("update goods set id = '$id', name = '$new_name', price='$new_price', cat_id='$new_cat' where id = '$id'");
    }

    function updateByName($old_name, $new_name, $new_price, $new_cat)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $db->query("update goods set id = id, name = '$new_name', price='$new_price', cat_id='$new_cat' where name = '$old_name'");
    }

    function display()
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $r = $db->query("select * from goods");

        if($myrow = $r->fetch())
        {
            printf("id\t\tname\t\t\t\tprice\t\t\t\t\tcat_id\n");
            do
            {
                printf("%s\t\t", $myrow["id"]);
                printf("%s\t\t\t\t\t", $myrow["name"]);
                printf("%s\t\t\t\t\t", $myrow["price"]);
                printf("%s\n", $myrow["cat_id"]);
            }while($myrow = $r->fetch());
        }
        else {
            echo "Sorry, no records were found.";
        }
    }
}

$cg = new Catalog();
//print("before: \n");
//$cg->display();
//$cg->add("books");
//$cg->delete("cat");
////$cg->updateById(3, "Clothes");
////$cg->updateByName("food", "Food");
//print("after: \n");
//$cg->display();

//$cg = new Goods();
//print("before: \n");
//$cg->display();
//$cg->add("ginger", 6);
//$cg->delete("ginger");
//$cg->updateById(3, "Milk", 15, 2);
//$cg->updateByName("Milk", "milk", 15, 2);
//print("after: \n");
//$cg->display();

//1).Разработать структуру БД для интернет магазина (Каталог-Товары)
//2).Используя расширение mysqli подключиться к MySQL. Прочитать можно  http://fi2.php.net/manual/ru/book.mysqli.php
//3).Написать скрипты для добавления/удаления/редактирования/просмотра товаров/каталога.
