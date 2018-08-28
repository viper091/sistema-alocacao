CREATE DATABASE ben;
USE ben;

create table users(
    id int(10) unsigned primary key auto_increment,
    email varchar(255) not null,
    passwd varchar(255) not null,

    UNIQUE KEY unique_email(email)
);
create table cars(
    id int(10) unsigned primary key auto_increment,
    placa varchar(30) not null,
    local_de_locacao varchar(255) not null,
    car varchar(30) not null,
    saida timestamp,
    devo timestamp
    
);



insert into cars values (0, '012f3', 'mogi mirim', 'saveiro', now(), now()),
(0, '012f3', 'mogi mirim', 'palio', now(), now()),
(0, '111f3', 'sao paulo', 'citroen', now(), now());