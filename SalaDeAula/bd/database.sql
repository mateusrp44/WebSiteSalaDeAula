DROP DATABASE IF EXISTS DBSalaAula;

CREATE DATABASE IF NOT EXISTS DBSalaAula;

USE DBSalaAula;

CREATE TABLE IF NOT EXISTS usuario (
  id INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  email VARCHAR(50) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  nivel ENUM('0', '1', '2'),
  documento INT NOT NULL,
  CONSTRAINT pk_usuario PRIMARY KEY (id)
);

INSERT INTO `usuario`(`login`, `email`, `senha`, `nivel`, `documento`) VALUES ('admin', 'admin@email.com.br', '$2y$10$asGC8DjuEFi4g0FqYa6Y1.7wAx4fNfA7VVTQvfTW6c4D1cnYImTLy', '0', '0');

CREATE TABLE IF NOT EXISTS aluno (
    id INT NOT NULL,
    nome_aluno VARCHAR(50) NOT NULL,
    data_nascimento DATE,
    necessidade_auxilio BOOLEAN NOT NULL DEFAULT FALSE,
    CONSTRAINT pk_aluno PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS professor (
    id INT NOT NULL,
    nome_prof VARCHAR(50) NOT NULL,
    data_nascimento DATE NOT NULL,
    CONSTRAINT pk_professor PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS disciplina (
    id INT NOT NULL AUTO_INCREMENT,
    nome_disciplina VARCHAR(30) NOT NULL,
    duracao TIME NOT NULL,
    aplicada BOOLEAN NOT NULL,
    id_prof INT NOT NULL,
    CONSTRAINT pk_disciplina PRIMARY KEY (id),
    CONSTRAINT fk_professor_disciplina FOREIGN KEY (id_prof) REFERENCES professor(id)
);

CREATE TABLE IF NOT EXISTS turma (
    id INT NOT NULL AUTO_INCREMENT,
    id_prof_turma INT NOT NULL,
    nome_turma VARCHAR(30) NOT NULL,
    periodo VARCHAR(30) NOT NULL,
    CONSTRAINT pk_turma PRIMARY KEY (id),
    CONSTRAINT fk_professor_turma FOREIGN KEY (id_prof_turma) REFERENCES professor(id)
);

CREATE TABLE IF NOT EXISTS turma_disciplina (
    id INT NOT NULL AUTO_INCREMENT,
    id_disciplina_turma INT NOT NULL,
    id_aluno_turma INT NOT NULL,
    CONSTRAINT pk_turma_disciplina PRIMARY KEY (id),
    CONSTRAINT fk_disciplina_turma FOREIGN KEY (id_disciplina_turma) REFERENCES disciplina(id),
    CONSTRAINT fk_aluno_turma FOREIGN KEY (id_aluno_turma) REFERENCES aluno(id)
);

CREATE TABLE IF NOT EXISTS auxilio_disciplina_aluno (
    id INT NOT NULL AUTO_INCREMENT,
    id_disciplina INT NOT NULL,
    topico varchar(50) NOT NULL,
    descricao VARCHAR(2000) NOT NULL,
    data DATE NOT NULL,
    CONSTRAINT pk_auxilio_professor_disciplina_aluno PRIMARY KEY (id),
    CONSTRAINT fk_disciplina FOREIGN KEY (id_disciplina) REFERENCES disciplina(id)
);