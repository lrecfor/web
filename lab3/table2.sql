create table catalog
(
    id        integer primary key autoincrement,
    name      varchar(30)
);

create table goods
(
    id         integer primary key autoincrement,
    name       varchar(30),
    price      integer
);

create table main
(
    catalog_id integer,
    goods_id integer
);