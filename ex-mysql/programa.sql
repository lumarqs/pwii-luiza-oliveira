CREATE database programa;

use programa;


create table dados(
id int auto_increment primary key,
nome VARCHAR(250),
idade VARCHAR(3),
cpf VARCHAR(14)
);

select * from dados;