<?php
// Importa o arquivo da classe pai 'Pessoa' para permitir a herança.
require_once 'Pessoa.php';

// Define a classe 'Professor' que herda de 'Pessoa'.
class Professor extends Pessoa {
    // Propriedade privada para armazenar a disciplina que o professor leciona.
    private $disciplina;
    // Propriedade privada para armazenar o salário.
    private $salario;

    // Método construtor padrão, recebendo os dados necessários para criar um Professor.
    public function __construct($nome, $idade, $disciplina, $salario) {
        // Chama o construtor da classe pai (Pessoa) para definir nome e idade.
        parent::__construct($nome, $idade);
        // Define a disciplina específica deste objeto Professor.
        $this->disciplina = $disciplina;
        // Define o salário específico deste objeto.
        $this->salario = $salario;
    }

    // Método público para recuperar o valor da disciplina (Getter).
    public function getDisciplina() {
        return $this->disciplina;
    }

    // Método público para alterar o valor da disciplina (Setter).
    public function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

    // Método público para recuperar o valor do salário (Getter).
    public function getSalario() {
        return $this->salario;
    }

    // Método público para alterar o valor do salário (Setter).
    public function setSalario($salario) {
        $this->salario = $salario;
    }

    // Implementação do método abstrato obrigatório 'getDescricao' (substitui o 'apresentar' da imagem).
    public function getDescricao(): string {
        // Retorna uma string formatada, usando number_format para deixar o salário no padrão brasileiro (R$ 1.000,00).
        return "Professor: " . $this->getNome() . ", Idade: " . $this->getIdade() . ", Disciplina: " . $this->disciplina . ", Salário: R$ " . number_format($this->salario, 2, ',', '.');
    }

    // Método adicional necessário para que a tabela no index.php funcione corretamente.
    public function getTipo(): string {
        return "Professor";
    }

    // Método específico apenas da classe Professor, que não existe em Aluno.
    public function darAula() {
       return "O professor " . $this->getNome() . " está ministrando a aula de " . $this->disciplina . ".";
    }
}
?>