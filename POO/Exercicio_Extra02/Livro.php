<?php
class Livro {
    public $titulo;
    public $autor;
    public $isbn;
    public $genero;

    public function __construct($titulo, $autor, $isbn, $genero) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->genero = $genero;
    }

    public function exibirCatalogo() {
        echo "<h3>Informações do Livro</h3>";
        echo "<strong>Título:</strong> {$this->titulo}<br>";
        echo "Autor: {$this->autor}<br>";
        echo "ISBN: {$this->isbn}<br>";
        echo "Gênero: {$this->genero}<br><hr>";
    }
}
?>
