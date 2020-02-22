CREATE DATABASE projeto1;
USE projeto1;

CREATE TABLE medico (
   id int(11) AUTO_INCREMENT PRIMARY KEY,
   email varchar(112) NOT NULL,
   nome varchar(112) NOT NULL,
   senha varchar(112) NOT NULL,
   endereco_consultorio varchar(112) NOT NULL,
   data_criacao timestamp NULL DEFAULT NULL,
   data_alteracao timestamp NULL DEFAULT NULL
) 