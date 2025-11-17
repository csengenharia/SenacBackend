                        SELECT * FROM animal
SELECT * FROM cliente

/* Busca específica de dados */
SELECT nomeAnimal,peso FROM animal

/*INSERÇÃO EXPLÍCITA*/
INSERT INTO cliente (nomeCliente,cpf,celular,email,
cidade,estado,cep,tipoLogradouro,nomeLogradouro,numero,complemento)
VALUES('Juquinha','4638930800','13999999999','juquinha@uol.com.br',
'Santos','SP','11054999','Avenida','Conselheiro Nébias','78',
'ap54');

/*Consulta específica*/
SELECT nomeCliente,email FROM cliente	

/*INSERÇÃO IMPLÍCITA*/
INSERT INTO cliente 
VALUES(2,'Margarida','99036371872','13888888888','margarida@uol.com.br',
'Sao Vicente','SP','11054888','Rua','Emílio Ribas','01',
'ap92');

/*INSERÇÃO EXPLÍCITA*/
INSERT INTO cliente (cpf,nomeCliente,celular,email,
cidade,estado,cep,tipoLogradouro,nomeLogradouro,numero,complemento)
VALUES('16882277842','Donald','13977777777','donald@uol.com.br',
'Guaruja','SP','11054111','Avenida','da Praia','80',
'ap54');

/*Alteração de dados*/
UPDATE cliente
SET  cidade='São Paulo',
	     cep='11088777',
	  numero='132',
complemento='ap59'
WHERE idCliente = 2

/*Exclusão de Dados*/
DELETE FROM cliente
WHERE idCliente=2

/*BUSCAS BÁSICAS*/
SELECT * FROM cliente
WHERE cidade LIKE 'M%'

SELECT nomeCliente,cpf,cidade FROM cliente
WHERE cidade <> 'São Paulo' 
/*Operadores > , <=, <=, =, <>, and, or, not */

SELECT nomeCliente, celular,email FROM cliente
ORDER BY nomeCliente 

INSERT INTO cliente (nomeCliente,cpf,celular, email, cidade, estado, 
cep, tipologradouro,nomelogradouro, numero, complemento) 
VALUES
('João da Silva' , '12345678900' , '11912345678' , 'joao.silva@email.com' , 'São Paulo' , 'SP' , '01001000' , 'Rua' , 'Augusta' , '123' , 'Apto 12'),
('Ana Pereira' , '98765432199' , '21998765432' , 'ana.pereira@email.com' , 'Rio de Janeiro' , 'RJ' , '22041001' , 'Avenida' , 'Atlântica' , '456' , 'Bloco B'),
('Carlos Souza' , '34567890122' , '31991234567' , 'carlos.souza@email.com' , 'Belo Horizonte' , 'MG' , '30130110' , 'Rua' , 'da Bahia' , '890' , 'Sala 3'),
('Mariana Oliveira' , '45678901233' , '41987654321' , 'mariana.oliveira@email.com' , 'Curitiba' , 'PR' , '80010000' , 'Alameda' , 'Cabral' , '77' , 'Casa 2'),
('Pedro Gomes' , '56789012344' , '51999887766' , 'pedro.gomes@email.com' , 'Porto Alegre' , 'RS' , '90010150' , 'Rua' , 'dos Andradas' , '345' , 'Fundos'),
('Luciana Alves' , '67890123455' , '61912349876' , 'luciana.alves@email.com' , 'Brasília' , 'DF' , '70040010' , 'Setor' , 'Comercial Norte' , '25' , 'Sala 201'),
('Rafael Lima' , '78901234566' , '85998761122' , 'rafael.lima@email.com' , 'Fortaleza' , 'CE' , '60060350' , 'Avenida' , 'Beira Mar' , '999' , 'Cobertura'),
('Patrícia Ferreira' , '89012345677' , '71991238899' , 'patricia.ferreira@email.com' , 'Salvador' , 'BA' , '40015970' , 'Ladeira' , 'da Barra' , '58' , null),
('Fernando Costa' , '90123456788' , '19987654433' , 'fernando.costa@email.com' , 'Campinas' , 'SP' , '13010200' , 'Rua' , 'Conceição' , '312' , 'Sala 5'),
('Gabriela Santos' , '01234567899' , '27992345566' , 'gabriela.santos@email.com' , 'Vitória' , 'ES' , '29010180' , 'Avenida' , 'Beira Rio' , '500' , null),
('Bruno Rocha' , '11122233344' , '62981233344' , 'bruno.rocha@email.com' , 'Goiânia' , 'GO' , '74003010' , 'Rua' , '24 de Outubro' , '210' , 'Loja 1'),
('Isabela Mendes' , '22233344455' , '95992223344' , 'isabela.mendes@email.com' , 'Boa Vista' , 'RR' , '69301040' , 'Travessa' , 'das Flores' , '14' , null),
('Felipe Araújo' , '33344455566' , '92988775566' , 'felipe.araujo@email.com' , 'Manaus' , 'AM' , '69005040' , 'Avenida' , 'Eduardo Ribeiro' , '801' , 'Apto 303'),
('Larissa Martins' , '44455566677' , '48991112233' , 'larissa.martins@email.com' , 'Florianópolis' , 'SC' , '88010400' , 'Rua' , 'Felipe Schmidt' , '230' , null),
('André Teixeira' , '55566677788' , '98999001111' , 'andre.teixeira@email.com' , 'São Luís' , 'MA' , '65010030' , 'Avenida' , 'Pedro II' , '77' , 'Casa 1'),
('Beatriz Nogueira' , '66677788899' , '13988223344' , 'beatriz.nogueira@email.com' , 'Santos' , 'SP' , '11010001' , 'Rua' , 'Conselheiro Nébias' , '920' , 'Bloco A'),
('Rodrigo Ribeiro' , '77788899900' , '16991225566' , 'rodrigo.ribeiro@email.com' , 'Ribeirão Preto' , 'SP' , '14010060' , 'Avenida' , 'Independência' , '410' , null),
('Carla Fernandes' , '88899900011' , '84998123344' , 'carla.fernandes@email.com' , 'Natal' , 'RN' , '59020120' , 'Rua' , 'das Dunas' , '199' , null),
('Ricardo Barbosa' , '99900011122' , '67991122233' , 'ricardo.barbosa@email.com' , 'Campo Grande' , 'MS' , '79002970' , 'Avenida' , 'Afonso Pena' , '321' , 'Sala 10'),
('Vanessa Castro' , '10120230344' , '82999998888' , 'vanessa.castro@email.com' , 'Maceió' , 'AL' , '57020000' , 'Rua' , 'do Sol' , '76' , 'Fundos');

/*4
LISTAR NOME DOS CLIENTES, CIDADE E ESTADO DE TODOS QUE SÃO ESTADO DE SP*/

SELECT nomeCliente, cidade, estado FROM cliente
WHERE estado ='SP' 

/*5
LISTAR NOME DOS CLIENTES, CIDADE E ESTADO DE TODOS QUE SÃO ESTADO DE SP e RJ , cujos nomes começam com a letra A*/
SELECT nomeCliente, cidade, estado FROM cliente
WHERE (estado ='SP' OR estado ='RJ') AND nomeCliente LIKE 'A%' 

/*6
LISTAR NOME DOS CLIENTES, CIDADE E ESTADO E CELULAR DE TODOS AQUELES QUE SÃO ESTADO DE SP e RJ, MG E ES (REGIÃO SUDESTE)
CUJOS NOMES COMEÇAM COM A LETRA F EM ORDEM ALFABÉTICA POR NOME*/
SELECT nomeCliente, cidade, estado, celular
FROM cliente
WHERE (estado = 'SP' OR estado = 'RJ' OR estado = 'MG' OR estado = 'ES')
AND nomeCliente LIKE 'F%'
ORDER BY nomeCliente ASC;

SELECT nomeCliente, cidade, estado, celular
FROM cliente
WHERE estado IN ( 'SP','RJ','MG','ES')
AND nomeCliente LIKE 'F%'
ORDER BY nomeCliente ASC;

SELECT * FROM cliente
/*7
LISTAR O NOME DO CLIENTE, O CELULAR E CIDADE DE TODOS OS CLIENTE QUE MOREM
EM CASA, EM ORDEM ALFABÉTICA POR NOME*/
SELECT nomeCliente, celular, cidade FROM cliente
WHERE complemento LIKE 'Casa%' OR complemento LIKE 'Fundos%' OR complemento LIKE 'Bloco%' OR complemento IS null
ORDER BY nomeCliente ASC;

/*Outra forma*/
SELECT nomeCliente, celular, cidade FROM cliente
WHERE complemento IN ('Casa%','Fundos%','Bloco%') or complemento IS null
ORDER BY nomeCliente ASC;

/* lISTAR TODOS OS DADOS DOS CLIENTES QUE MOREM NO ESTADO DE SP
E MOREM EM AVENIDAS, EM ORDEM DESCRESCENTE POR NOME */
SELECT * FROM cliente
WHERE estado = 'SP' AND tipoLogradouro like 'Avenida%'
ORDER BY nomeCliente DESC;

SELECT nomeCliente, cidade FROM cliente
WHERE nomeCliente LIKE 'R%'
ORDER BY nomeCliente

SELECT idCliente, nomeCliente, email, cpf FROM cliente
WHERE email LIKE ('%uol%') AND estado IN ('SP')
ORDER BY nomeCliente

