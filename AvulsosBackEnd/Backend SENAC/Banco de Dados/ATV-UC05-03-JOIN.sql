/*Parte 3 – Manipulação Avançada de Dados
1.Criar um aluguel de equipamento para o mês de novembro (qualquer data e hora), 
qualquer equipamento, qualquer funcionário e qualquer cliente, mas cujo pagamento não tenha sido feito (ficou em aberto).

2.Listar nome de todos os funcionários, cpf e os aluguéis feitos por ele (apenas a data e que equipamento alugou). 

3.Listar nome do cliente, cpf, datas que ele esteve na praia, quem atendeu este
cliente, tudo isto, ordenado por data, da mais nova para a mais antiga, apenas no mês de DEZ24.  

4.Lista do nome dos equipamentos que foram mais alugados em ordem decrescente, do equipamento mais alugado para o menos alugado. Equipamentos não alugados devem sair no relatório. 
5.Listar a arrecadação bruta da barraca de praia entre Natal e Ano Novo.
6.Reajustar preço por hora de todos os equipamentos em 10%.
7.Listar a quantidade de clientes que pagaram utilizando determinada forma de pagamento, em ordem crescente, do método mais usado para o menos usado. Também é necessário que pagamentos não realizados sejam apontados. 
8.Listar quanto a barraca faturou por dia, em cada um dos dias do mês de dezembro apenas. 
9.Excluir o pagamento e todas as referências a ele criadas no item 1. Se tentar excluir direto da tabela aluguel teremos um problema? Por que isto ocorre? Como resolver (escrever o código usado)?
10.Listar todos os equipamentos que tiveram a quantidade de aluguéis inferiores a 5 unidades, durante o mês de DEZ24.*/

/*
1.Criar um aluguel de equipamento para o mês de novembro (qualquer data e hora), 
qualquer equipamento, qualquer funcionário e qualquer cliente, mas cujo pagamento não tenha sido feito (ficou em aberto).*/

INSERT INTO Aluguel(idCliente,idFuncionario,dataHoraRetirada,dataHoraDevolucao,valorAPagar,valorPago,pago,formaPagamento,qtVezes)
VALUES (16, 3, '2025-11-27 17:20:00', '2025-11-27 17:20:00', 85.00, NULL, NULL, NULL, NULL);
INSERT INTO AluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd)
VALUE (4, 21, 10.00, 10.00, 1);

UPDATE equipamento
SET qtd = qtd - 1
WHERE idEquipamento = 4

/*2.Listar nome de todos os funcionários, cpf e os aluguéis feitos por ele (apenas a data e que equipamento alugou).*/
SELECT funcionario.nomeFuncionario,funcionario.cpf,aluguel.dataHoraRetirada,equipamento.nomeEquipamento
FROM funcionario INNER JOIN aluguel 
ON funcionario.idFuncionario = aluguel.idFuncionario
INNER JOIN aluguelequipamento 
ON aluguel.idAluguel = AluguelEquipamento.idAluguel
INNER JOIN equipamento 
ON AluguelEquipamento.idEquipamento = equipamento.idEquipamento
WHERE aluguel.dataHoraRetirada = '2025-11-27 17:20:00' 
AND AluguelEquipamento.idEquipamento = 4;


/*3.Listar nome do cliente, cpf, datas que ele esteve na praia, quem atendeu este
cliente, tudo isto, ordenado por data, da mais nova para a mais antiga, apenas no mês de DEZ24.  */

SELECT cliente.nomeCliente,cliente.cpf,aluguel.dataHoraRetirada
FROM cliente INNER JOIN aluguel 
ON cliente.idCliente = aluguel.idCliente
INNER JOIN aluguelequipamento 
ON aluguel.idAluguel = AluguelEquipamento.idAluguel
INNER JOIN equipamento 
ON AluguelEquipamento.idEquipamento = equipamento.idEquipamento
WHERE dataHoraRetirada =  '2025-12-01 14:00:00'
ORDER BY dataHoraRetirada DESC;

/*4.Lista do nome dos equipamentos que foram mais alugados em ordem decrescente, do equipamento mais alugado para o menos alugado. 
Equipamentos não alugados devem sair no relatório. */











