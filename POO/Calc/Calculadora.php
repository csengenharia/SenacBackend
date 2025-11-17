<?php
class Calculadora{
    private $numero1;
    private $numero2;
    //metodo construtor
    public function __construct($numero1,$numero2){
        $this->numero1 = $numero1;
         $this->numero2 = $numero2;
 
    }
    //metodo somar
    public function somar(){
        return $this->numero1 + $this->numero2;
    }
    public function subtrair(){
        return $this->numero1 - $this->numero2;
    }
    public function multiplicar(){
        return $this->numero1 * $this->numero2;
    }
    public function dividir(){
        if($this ->numero2 ==0){
            return "Erro: Divisão por zero!";
        }
        return $this->numero1 / $this->numero2;
    }
   
}
?>