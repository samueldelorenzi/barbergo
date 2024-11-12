-- Exclui o esquema se já existir
drop database if exists barbergo;

-- Cria o esquema
create database barbergo;

-- Usa o esquema criado
use barbergo;

-- Cria a tabela cliente
create table cliente (
    id int not null auto_increment primary key,
    nome varchar(256),
    email varchar(256),
    senha varchar(256)
);

-- Cria a tabela servico
create table servico (
    id int not null auto_increment primary key,
    tipo enum('Cabelo', 'Barba', 'Cabelo e Barba') not null,
    preco decimal(10,2) not null
);

-- Cria a tabela agendamento
create table agendamento (
    id int not null auto_increment primary key,
    id_cliente int not null,
    id_servico int,
    data_hora datetime not null,
    foreign key (id_cliente) references cliente(id) on delete cascade,
    foreign key (id_servico) references servico(id) on delete set null
);