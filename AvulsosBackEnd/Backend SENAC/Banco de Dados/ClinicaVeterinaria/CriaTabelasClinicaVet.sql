CREATE TABLE cliente (
idCliente INT PRIMARY KEY AUTO_INCREMENT,
nomeCliente VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL UNIQUE,
email VARCHAR(50) NOT NULL,
cidade VARCHAR(50) NOT NULL,
estado CHAR(2) NOT NULL,
cep CHAR(8) NULL,
tipoLogradouro VARCHAR(15) NOT NULL,
nomeLogradouro VARCHAR(50) NOT NULL,
numero VARCHAR(6) NOT NULL,
complemento VARCHAR(30)
);


CREATE TABLE contatoTelefonico(
idContatoTelefonico INT PRIMARY KEY AUTO_INCREMENT,
ddi VARCHAR(5) NOT NULL,
ddd VARCHAR(5) NOT NULL,
numero VARCHAR(9) NOT NULL,
idCliente INT NOT NULL,
CONSTRAINT fk_contatoTelefonico_Cliente FOREIGN KEY (idCliente)
REFERENCES cliente (idCliente)
);


CREATE TABLE animal (
idAnimal INT PRIMARY KEY AUTO_INCREMENT,
idCliente INT NOT NULL,
nomeAnimal VARCHAR(50),
especie VARCHAR(50) NOT NULL,
raca VARCHAR(50) NOT NULL,
peso DECIMAL(5,2) NOT NULL,
porte CHAR(1) NOT NULL,/*P,M,G, NÃO SE APLICA*/
sexo CHAR(1),/*MACHO | FEMEA*/
anoNascimento INT NOT NULL,
CONSTRAINT chk_porte CHECK (porte IN('P','M','G')),
CONSTRAINT chk_sexo CHECK (sexo IN ('M','F')),
CONSTRAINT fk_Animal_Cliente FOREIGN KEY (idCliente)
REFERENCES cliente (idCliente)
); 


/*
DROP TABLE	animal;*/

CREATE TABLE veterinario (
idVeterinario INT PRIMARY KEY AUTO_INCREMENT,
crmv VARCHAR(20) NOT NULL UNIQUE,
nmVeterinario VARCHAR(50) NOT NULL,
especialidade VARCHAR(45)
);


CREATE TABLE consulta(
idConsulta INT PRIMARY KEY AUTO_INCREMENT,
dataHora DATETIME NOT NULL;
valorPago VARCHAR(45) NOT NULL,
pago BIT NOT NULL,
cdConsulta VARCHAR(45) NOT NULL,
formaPagamento VARCHAR(45),
CONSTRAINT fk_Consulta_Animal FOREIGN KEY (idAnimal)
REFERENCES animal (idAnimal),
CONSTRAINT fk_Consulta_Veterinario FOREIGN KEY (idVeterinario)
REFERENCES animal (idVeterinario)
);

CREATE tipoServico (
idTipoServico INT PRIMARY KEY AUTO_INCREMENT,
nmServico VARCHAR(50),
valor DECIMAL(5,2)
);


CREATE ConsultaTipoServico (

);

