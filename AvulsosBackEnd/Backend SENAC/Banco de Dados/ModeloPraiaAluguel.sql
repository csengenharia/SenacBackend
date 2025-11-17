CREATE TABLE cliente (
idCliente INT PRIMARY KEY AUTO_INCREMENT,
nomeCliente VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL UNIQUE
);
 
CREATE TABLE funcionario (
idFuncionario INT PRIMARY KEY AUTO_INCREMENT,
nomeFuncionario VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL UNIQUE,
celular CHAR(11) NOT null
);
 
CREATE TABLE equipamento (
idEquipamento INT PRIMARY KEY AUTO_INCREMENT,
nomeEquipamento VARCHAR(50) NOT NULL,
qtd INT NOT NULL,
valorHora DECIMAL(5,2)
);

CREATE TABLE aluguel(
idAluguel INT PRIMARY KEY AUTO_INCREMENT,
idCliente INT NOT NULL,
idEquipamento INT NOT NULL,
idFuncionario INT NOT NULL,
dataHoraRetirada DATETIME NOT NULL,
dataHoraDevolucao DATETIME NOT NULL,
valorAPagar DECIMAL(10,2),
valorPago DECIMAL(10,2),
pago BIT,
formaPagamento VARCHAR(50),
qtVezes INT,
CONSTRAINT fk_Aluguel_Cliente FOREIGN KEY (idCliente)REFERENCES cliente (idCliente),
CONSTRAINT fk_Aluguel_Equipamento FOREIGN KEY (idEquipamento)REFERENCES Equipamento (idEquipamento),
CONSTRAINT fk_Alguel_Funcionario FOREIGN KEY (idFuncionario)REFERENCES funcionario (idFuncionario)
);

/* 
1) Utilizando o comando ALTER TABLE, adicionar à tabela cliente já criada os seguintes atributos: 
 (lembre-se que trata-se de atributo composto)*/
ALTER TABLE cliente 
ADD email VARCHAR(50),
ADD cidade VARCHAR(50),
ADD estado CHAR(2),
ADD endereco VARCHAR(50),
ADD nomeLogradouro VARCHAR(50),
ADD tipoLogradouro VARCHAR(15),
ADD numero VARCHAR(6),
ADD complemento VARCHAR(50);

/*2) Apagar da Tabela Aluguel o atributo idEquipamento, pois criaremos uma outra tabela para conter tal atributo.
 Use o comando para dropar colunas para fazer isso.*/
ALTER TABLE aluguel
DROP FOREIGN KEY fk_Aluguel_Equipamento
ALTER TABLE aluguel
DROP COLUMN idEquipamento

/*2) Criar a tabela associativa AluguelEquipamento com os seguintes atributos:*/
CREATE TABLE AluguelEquipamento(
idAluguelEquipamento INT PRIMARY KEY AUTO_INCREMENT,
idEquipamento INT NOT NULL,
idAluguel INT NOT NULL,
valorItem DECIMAL(10,2) NOT NULL,
valorUnitario DECIMAL(10,2) NOT NULL,
qtd INT,
CONSTRAINT fk_AluguelEquipamento_Equipamento FOREIGN KEY (idEquipamento)REFERENCES Equipamento(idEquipamento),
CONSTRAINT fk_AluguelEquipamento_Aluguel FOREIGN KEY (idAluguel)REFERENCES aluguel(idAluguel)
);

/*3) Inserir 20 clientes segundo o seguinte critério:*/
INSERT INTO cliente (nomeCliente, cpf, email, cidade, estado, tipoLogradouro, nomeLogradouro, numero, endereco) 
VALUES
('Donald','11211211233','Donald@uol.com','Santos','SP','Rua','Principal','123','casa'),
('Margarida','22322322344','Margarida@uol.com','São Vicente','SP',NULL,NULL,NULL,NULL),
('Patinhas','33433433455','Patinhas@uol.com','Florianópolis','SC','Rua','Central','45','casa'),
('Huguinho','44544544566','Huguinho@gmail.com','Santos','SP',NULL,NULL,NULL,NULL),
('Luizinho','55655655677','Luizinho@gmail.com','Praia Grande','SP',NULL,NULL,NULL,NULL),
('Zezinho','66766766788','Zezinho@gmail.com','São Vicente','SP','Rua','Das Flores','78','casa'),
('Pardal','77877877899','Pardal@uol.com','Santos','SP','Rua','Dos Pássaros','12','casa'),
('Zé Carioca','88988988900',NULL,'Rio de Janeiro','RJ','Rua','Do Samba','99','casa'),
('Mickey','99099099011','Mickey@hotmail.com','Recife','PE',NULL,NULL,NULL,NULL),
('Minie','10110110122','Minie@gmail.com','Recife','PE',NULL,NULL,NULL,NULL),
('Pateta','21221221233','Pateta@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL),
('Branca de Neve','32332332344','BrancaDeNeve@hotmail.com','São Joaquim','SC',NULL,NULL,NULL,NULL),
('Aladin','43443443455','Aladin@gmail.com','Belém','PA',NULL,NULL,NULL,NULL),
('Cinderela','54554554566','Cinderela@hotmail.com','Goiania','GO','Rua','Encantada','7','casa'),
('Mulan','65665665677','Mulan@gmail.com','Rio das Ostras','RJ',NULL,NULL,NULL,NULL),
('Moana','76776776788','Moana@gmail.com','Parati','RJ',NULL,NULL,NULL,NULL),
('Asnésio','87887887899','Asnesio@uol.com','Belo Horizonte','MG',NULL,NULL,NULL,NULL),
('Maga Patalógica','98998998900','MagaPatalogica@gmail.com','Cubatão','SP',NULL,NULL,NULL,NULL),
('Capitão Boeing','10101010111','CapitaoBoeing@uol.com','Manaus','AM','Avenida','Dos Ares','500','casa'),
('Pão Duro Mac Money','20220220222','PaoDuroMacMoney@ig.com','Osasco','SP',NULL,NULL,NULL,NULL);


/*4)Inserir 03 funcionários com dados aleatórios, mas com os seguintes nomes:*/
INSERT INTO funcionario(nomeFuncionario, cpf,celular)
VALUES ('Cebolinha','11111111111','11912345678'),
		('Cascão','22222222222','11923456789'),
		('Chico Bento','33333333333','31934567890');
		
/*5)Inserir os seguintes equipamentos:*/
INSERT INTO equipamento(nomeEquipamento,qtd,valorHora)
VALUES ('Cadeira 02 posições', 50, 2.00),
		 ('Cadeira 04 posições', 100, 3.50),
		 ('Guarda Sol P', 40, 2.00),
		 ('Guarda Sol G', 60, 3.00),
		 ('Mesinha', 30, 1.50);
		 
		 
SELECT nomeCliente, email FROM cliente 
WHERE email LIKE '%@gmail.%'

SELECT nomeCliente, estado FROM cliente 
WHERE estado IN('SP', 'RJ')