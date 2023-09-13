<?php
$db = new PDO('sqlite:identifier.sqlite');
$r = $db->query("select book.id, book.book_name, count(book.book_name) from book join match on 
    book.id=match.book_id group by book.book_name having count(book.book_name) == 3");

if($myrow = $r->fetch())
{
    printf("id\t\tname\n");
    do
    {
        printf("%s\t\t", $myrow["id"]);
        printf("%s\t\t\t\n", $myrow["book_name"]);
    }while($myrow = $r->fetch());
}
else {
    echo "Sorry, no records were found.";
}

//    4).Создайте структуру БД библиотеки. У книги есть название и ее авторы(может быть сколько угодно авторов у одной
// книги). У автора есть только ФИО.
//Напишите запрос который выводит список книг, которые написаны 3-мя со-авторами.