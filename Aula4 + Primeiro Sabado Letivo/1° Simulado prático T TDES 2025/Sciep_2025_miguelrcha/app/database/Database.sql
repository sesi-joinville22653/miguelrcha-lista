CREATE DATABASE IF NOT EXISTS sciep_2025_miguelrcha;

USE sciep_2025_miguelrcha;


CREATE TABLE professor(
	id_professor INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	nome_professor VARCHAR(87) NOT NULL,
    email_professor VARCHAR(87) NOT NULL,
    password_professor VARCHAR(87) NOT NULL
);

CREATE TABLE turma (
	id_turma INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_turma VARCHAR(87) NOT NULL,
    fk_id_professor INT NOT NULL,
    FOREIGN KEY (fk_id_professor) REFERENCES professor(id_professor)
);

CREATE TABLE atividade (
	id_atividade INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao_atividade VARCHAR(87) NOT NULL,
    fk_id_turma INT NOT NULL,
    FOREIGN KEY (fk_id_turma) REFERENCES turma(id_turma)
);