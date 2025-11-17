<?php
class Imovel {
    public $tipo;
    public $endereco;
    public $areaMetrosQuadrados;
    public $numeroQuartos;

    public function __construct($tipo, $endereco, $areaMetrosQuadrados, $numeroQuartos) {
        $this->tipo = $tipo;
        $this->endereco = $endereco;
        $this->areaMetrosQuadrados = $areaMetrosQuadrados;
        $this->numeroQuartos = $numeroQuartos;
    }

    public function exibirInformacoes() {
        echo "<h3>Informações do Imóvel</h3>";
        echo "<strong>Tipo:</strong> {$this->tipo}<br>";
        echo "Endereço: {$this->endereco}<br>";
        echo "Área: {$this->areaMetrosQuadrados} m²<br>";
        echo "Número de Quartos: {$this->numeroQuartos}<br><hr>";
    }
}
?>
