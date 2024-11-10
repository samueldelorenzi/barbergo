create database barbergo;

use barbergo;

create table cliente (
	id int not null auto_increment primary key,
    nome varchar(256),
    email varchar(256),
    senha varchar(256)
);

create table agendamento (
	id int not null auto_increment primary key,
    id_cliente int not null,
    id_servico int not null,
    dia date not null,
    hora time not null

    -- redundante o datetime já resolve data e hora 
);

create table servico (
    id int not null auto_increment primary key,
    nome varchar(256),
    descricao varchar(256),
    preco decimal(10,2)

    
);



select * from cliente

-- 