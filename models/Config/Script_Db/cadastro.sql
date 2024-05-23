create database cadastro;
use cadastro;

create table usuario(
id int auto_increment primary key,
nome varchar(250) not null, 
cpf varchar(12) not null, 
email varchar (150) not null
);