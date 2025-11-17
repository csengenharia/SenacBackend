INSERT INTO cliente (nomeCliente,cpf,celular, email, cidade, estado, cep, tipologradouro,nomelogradouro, numero, complemento) 
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
 
SELECT * FROM Cliente
SELECT * FROM tiposervico
 
INSERT INTO tiposervico (nomeservico, valor)
VALUES 
('Consulta Padrão',150),
('Consulta Emergência',250),
('Exame - Sangue',100),
('Exame - Ultrassom|Raio X',300),
('Vacina - Geral',100),
('Castração',80),
('Internação',600);
 
SELECT*FROM animal

INSERT INTO animal (idCliente, nomeAnimal, especie, raca, peso, porte, sexo, anoNascimento)
VALUES
(1,  'Thor',  'Canino', 'SRD', 12.40, 'M', 'M', 2021),
(7,  'Maya',  'Felino', 'Siames', 4.20, 'P', 'F', 2023),
(12, 'Pingo', 'Canino', 'Pinscher', 3.10, 'P', 'M', 2022),
(18, 'Luna',  'Felino', 'Persa', 3.80, 'P', 'F', 2020),
(20, 'Zeca',  'Ave',    'Calopsita', 0.09, 'P', 'M', 2024);
 
SELECT*FROM veterinario
INSERT INTO veterinario (nomeVeterinario, celular, crmv, especialidade)
VALUES 
('Farinhas Breno', 999999993, 19234511070, 'Vet de Animais Intolerantes Celíacos'),
('Camila Souza', 988887777, 20234511111, 'Cirurgiã de Pequenos Animais'),
('Rafael Nogueira', 997654321, 18256722222, 'Clínico Geral e Emergencista'),
('Larissa Almeida', 996543210, 17287633333, 'Especialista em Felinos'),
('Pedro Henrique', 995432109, 16234544444, 'Anestesista Veterinário'),
('Juliana Ribeiro', 994321098, 19298755555, 'Dermatologista de Animais Domésticos'),
('Lucas Fernandes', 993210987, 15287666666, 'Ortopedista Veterinário'),
('Ana Beatriz Costa', 992109876, 14234577777, 'Especialista em Animais Silvestres'),
('Gabriel Martins', 991098765, 13287688888, 'Cardiologista Veterinário'),
('Patrícia Lima', 990987654, 12234599999, 'Nutricionista Animal');

/* 1- Inserir 2 consultas com 1 procedimento cada para um mesmo animal da clínica, mas em dias diferentes; 
(2 coins por linha afetada corretamente)*/

SELECT * FROM cliente
SELECT * FROM tiposervico
SELECT * FROM consulta
SELECT * FROM consultatiposervico
SELECT * FROM tiposervico
SELECT * FROM veterinario
SELECT * FROM animal

/*Inserir 2 consultas*/
INSERT INTO consulta (idAnimal,idVeterinario,datahora,pago,formaPagamento,qtdeVezes,valorTotal,valorPago)
VALUES 
(1,9,'2024-06-02 12:30:00',1,'dinheiro',1,100.00,100.00),
(1,1,'2020-08-07 10:30:00',1,'débito',1,80.00,40.00);

/*Inserir 1 procedimento para um mesmo animal*/
INSERT INTO consultatiposervico (idConsulta,idTipoServico,ValorServico)
VALUES 
(3,1,100.00),
(4,1,100.00);

/*2- Inserir 1 consulta com 2 procedimentos para um mesmo animal da clínica. 
(2 coins por linha afetada corretamente)*/

INSERT INTO consulta (idAnimal,idVeterinario,datahora,pago,formaPagamento,qtdeVezes,valorTotal,valorPago)
VALUES 
(1,2,'2024-06-20 12:30:00',1,'dinheiro',1,180.00,180.00);

INSERT INTO consultatiposervico (idConsulta,idTipoServico,ValorServico)
VALUES 
(5,6,80.00),
(5,6,80.00);


/* Veterinários (nome,CRMV) apenas dos que atenderam uma consulta (datahora,valortotal) */
SELECT * FROM cliente
SELECT * FROM tiposervico
SELECT * FROM consulta
SELECT * FROM consultatiposervico
SELECT * FROM tiposervico
SELECT * FROM veterinario
SELECT * FROM animal

/*JOIN*/
SELECT nomeVeterinario,crmv,datahora,valorTotal FROM veterinario
INNER JOIN consulta
ON veterinario.idVeterinario = consulta.idVeterinario

/*left JOIN*/
SELECT nomeVeterinario,crmv,datahora,valorTotal 
FROM veterinario LEFT JOIN consulta
ON veterinario.idVeterinario = consulta.idVeterinario
WHERE nomeVeterinario LIKE 'P%'
ORDER BY nomeVeterinario,datahora ASC

/*/*Nome do animal, nome do cliente, contatos do cliente 
em ordem alfabética por nome do animal
apenas clientes que morem no estado SP*/ */

SELECT * FROM cliente
SELECT * FROM animal

SELECT nomeAnimal,nomeCliente,celular,email
FROM animal LEFT JOIN cliente
ON animal.idCliente = cliente.idCliente
WHERE estado LIKE 'SP'
ORDER BY nomeAnimal ASC




