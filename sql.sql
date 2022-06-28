create table aluno(idaluno int AUTO_INCREMENT PRIMARY KEY, nome varchar(100), idade varchar(100), endereco varchar(100), rg varchar(10) , cpf varchar(12))

create table aula( idaula int AUTO_INCREMENT PRIMARY KEY, nomeinstrutor varchar(100), nomemateria varchar(100), horachegada varchar (10) , horasaida varchar(10)); 

create table aeroclube( idaeroclube int AUTO_INCREMENT PRIMARY KEY, nomeaeroclube varchar(100), endereco varchar(100), cnpj varchar(100))

ALTER TABLE aula ADD FOREIGN key(idaula) REFERENCES aluno(idaluno);
ALTER TABLE aeroclube ADD FOREIGN key(idaeroclube) REFERENCES aluno(idaluno);
