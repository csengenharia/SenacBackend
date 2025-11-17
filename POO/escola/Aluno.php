<?php
// Importa o arquivo 'Pessoa.php', garantindo que a classe Pessoa esteja disponível antes de usá-la.
require_once 'Pessoa.php';

// Define a classe 'Aluno' que herda todas as características da classe base 'Pessoa'.
class Aluno extends Pessoa {
    // Propriedade privada para armazenar o curso, com tipo definido como string.
    private string $curso;
    // Propriedade privada para armazenar a nota, com tipo definido como float (decimal).
    private float $nota;

    // Construtor da classe Aluno que recebe nome, idade, curso e nota na instanciação.
    public function __construct(string $nome, int $idade, string $curso, float $nota) {
        // Chama o construtor da classe pai (Pessoa) para inicializar nome e idade.
        parent::__construct($nome, $idade);
        // Inicializa a propriedade específica do Aluno: curso.
        $this->curso = $curso;
        // Inicializa a propriedade específica do Aluno: nota.
        $this->nota = $nota;
    }

    // Implementa o método abstrato da classe pai, retornando uma string descritiva.
    public function getDescricao(): string {
        // Usa um operador ternário para definir o status baseado na nota (>= 6 é Aprovado, senão Reprovado).
        $status = $this->nota >= 6 ? "Aprovado" : "Reprovado";
        // Retorna a string final concatenando os dados herdados e os específicos desta classe.
        return "Aluno: " . $this->getNome() . ", Idade: " . $this->getIdade() . ", Curso: " . $this->curso . ", Nota: " . $this->nota . " - " . $status;
    }   

    // Método adicional para retornar o tipo específico desta classe como string.
    public function getTipo(): string
    {
        // Retorna a string fixa "Aluno".
        return "Aluno";
    }
}
?>