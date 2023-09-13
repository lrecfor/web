create table author
(
    id          integer
        primary key autoincrement,
    name        varchar(50),
    middle_name varchar(50),
    last_name   varchar(50)
);

create table book
(
    id   integer
        primary key autoincrement,
    name varchar(150)
);

create table match
(
    book_id   integer,
    author_id varchar(150)
);

