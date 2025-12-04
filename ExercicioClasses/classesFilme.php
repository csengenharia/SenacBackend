<?php

    abstract class ClasseFilme{
        //Atributos
        public $genero, $classificacao, $anoLancamento, $diretor, $duracao, $titulo,$sinopse, 
        $elenco, $imagem, $trailer, $avaliacao, $comentarios, $premios, $idiomaOriginal, $legenda, $disponibilidade;

        //Métodos
        public function assistir(){echo('Assistir filme <br>');}
        public function favoritar(){echo('Adicionar aos favoritos <br>');}
        public function avaliar(){echo('Avaliar filme <br>');}
        public function comentar(){echo('Comentar filme <br>');}   
        
        public function __set($atributo,$valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this -> $atributo;
        }
    }

    //Classes filhas da Classe Classe
    class Guerreiro extends Classe{
        public $forca = 100; 
        public $defesa = 75; 
        public $esquiva = 75;
        public $velocidade = 75;
        public $inteligencia = 30;
        public $vida = 85;
        public $img = 'guerreiro';
        public $descricao = 'Um combatente robusto, especializado em armaduras pesadas e armas de combate corpo a corpo.';

        public function ataqueEspecial(){
            echo 'Espada Flamejante (70) <br>';
            echo 'Corte profundo (50)';
        }
    }