<?php
// Define a classe 'Pessoa' como abstrata, ou seja, ela é um modelo base e não pode ser instanciada diretamente.
abstract class Pessoa
{
    // Declara 'nome' como protegido: acessível apenas aqui e nas classes que herdarem de Pessoa.
    protected $nome;

    // Declara 'idade' como protegida.
    protected $idade;

    // Método construtor: executado automaticamente sempre que uma classe filha for instanciada.
    public function __construct($nome, $idade)
    {
        // Usa '$this->' para acessar a propriedade do objeto atual e atribui o valor recebido no parâmetro.
        $this->nome = $nome;
        // Atribui o valor do parâmetro '$idade' à propriedade do objeto.
        $this->idade = $idade;
    }

    // Método público (Getter) para permitir que o valor de '$nome' seja lido fora da classe.
    public function getNome()
    {
        // Retorna o valor atual da propriedade nome.
        return $this->nome;
    }

    // Getter para idade com ': int', garantindo que o retorno deste método seja sempre um número inteiro.
    public function getIdade(): int
    {
        // Retorna o valor atual da propriedade idade.
        return $this->idade;
    }

    // Método abstrato: define apenas a assinatura (sem corpo), obrigando as classes filhas a criarem sua própria implementação.
    abstract public function getDescricao(): string;
}