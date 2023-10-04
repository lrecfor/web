<?php


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
        if ($myrow = $res->fetch()) {
            $db->query("delete from goods where id == '$arg1'");
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


class Catalog
{
    function add($arg1, $arg2)
    {
        $db = new PDO('sqlite:identifier2.sqlite');
        $res = $db->query("select * from catalog where name == '$arg1'");
        if ($myrow = $res->fetch()) {
            echo "";
        }
        else $db->query("insert into catalog (name, parent_id) values('$arg1', '$arg2')");
    }

    function delete($categoryId) {
        $db = new PDO('sqlite:identifier2.sqlite');

        // get goods list
        $stmt = $db->query("select g.id from goods g
                                  join catalog c on g.cat_id = c.id
                                  where c.id = '$categoryId' or c.parent_id = '$categoryId'");
        $productIds = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // delete goods
        foreach ($productIds as $productId) {
            (new Goods)->delete($productId['id']);
        }

        // delete category from catalog
        $db->query("delete from catalog where id = '$categoryId'");

        $stmt = $db->query("select id from catalog where parent_id = '$categoryId'");
        $childCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($childCategories as $childCategory) {
            $this->delete($childCategory['id']);
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
//print("before: \n");
//$cg->display();
//$cg->add("shoes", 2);
$cg->delete(5);
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
