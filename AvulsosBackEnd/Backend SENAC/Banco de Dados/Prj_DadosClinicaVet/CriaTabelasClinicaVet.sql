CREATE TABLE cliente (
idCliente INT PRIMARY KEY AUTO_INCREMENT,
nomeCliente VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL UNIQUE,
celular CHAR(11) NOT NULL,
email VARCHAR(50) NOT NULL,
cidade VARCHAR(50) NOT NULL,
estado CHAR(2) NOT NULL,
cep CHAR(8) NULL,
tipoLogradouro VARCHAR(15) NOT NULL,
nomeLogradouro VARCHAR(50) NOT NULL,
numero VARCHAR(6) NOT NULL,
complemento VARCHAR(30)
);

/*
DROP TABLE cliente
DROP TABLE contatotelefonico
DROP TABLE animal
DROP TABLE veterinario
DROP TABLE consultadbclinicavetdbclinicavet
DROP TABLE consulta
DROP TABLE tiposervico
DROP TABLE consultaTipoServico 
*/


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
nomeVeterinario VARCHAR(50) NOT NULL,
crmv VARCHAR(20) NOT NULL UNIQUE,
celular CHAR(11) NOT NULL,
especialidade VARCHAR(50)
);


CREATE TABLE consulta(
idConsulta INT PRIMARY KEY AUTO_INCREMENT,
idAnimal INT NOT NULL,
idVeterinario INT NOT NULL,
dataHora DATETIME NOT NULL,
pago BIT DEFAULT 0,
formaPagamento VARCHAR(45),
qtdeVezes TINYINT DEFAULT 1,
valorTotal DECIMAL(10,2) NOT NULL,
valorPago DECIMAL(10,2),
CONSTRAINT fk_Consulta_Animal FOREIGN KEY (idAnimal)
REFERENCES animal (idAnimal),
CONSTRAINT fk_Consulta_Veterinario FOREIGN KEY (idVeterinario)
REFERENCES veterinario (idVeterinario)
);
SHOW TABLES


CREATE TABLE tipoServico(
idTipoServico INT PRIMARY KEY AUTO_INCREMENT,
nomeServico VARCHAR(50) NOT NULL,
valor DECIMAL(10,2) NOT NULL
);

CREATE TABLE consultaTipoServico(
idConsultaTipoServico INT PRIMARY KEY AUTO_INCREMENT,
idConsulta INT NOT NULL,
idTipoServico INT NOT NULL,
valorServico DECIMAL(10,2) NOT NULL,
CONSTRAINT fk_consultaTipoServico_consulta FOREIGN KEY (idConsulta)
REFERENCES consulta(idConsulta),
CONSTRAINT fk_consultaTipoServico_tipoconsulta FOREIGN KEY (idTipoServico)
REFERENCES tipoServico (idTipoServico)
);


/*DROP TABLE*/

