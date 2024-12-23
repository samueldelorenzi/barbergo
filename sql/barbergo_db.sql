drop database if exists barbergo;

create database barbergo;

use barbergo;

create table cliente (
	id int not null auto_increment primary key,
    nome varchar(256),
    email varchar(256),
    senha varchar(256),
    root boolean
);

create table agendamento (
	id int not null auto_increment primary key,
    id_cliente int not null,
    id_servico int not null,
    dia date not null,
    hora time not null
);

create table servico (
    id int not null auto_increment primary key,
    nome varchar(256),
    descricao varchar(256),
    preco decimal(10,2)
);

insert into servico (nome, descricao, preco) values
('Corte', 'Corte de cabelo', 30.00),
('Barba', 'Aparar e modelar barba', 35.00),
('Corte e Barba', 'Corte de cabelo e barba', 60.00);

-- usuario admin
insert into cliente (nome, email, senha, root) values
('admin', 'admin@barbergo.com', '$2y$10$pcKGDNS3GUfUIsSpDJ4qcuipZPeY8WsWAfJ37ewZsyileshPoOo3O', 1)