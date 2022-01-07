<?php
class Posicao {

    public $id;
    public $descricao;
    public $fk_idUnidade;
    public $nome;
    

    function __construct($id, $descricao, $fk_idUnidade, $nome) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->fk_idUnidade = $fk_idUnidade;
        $this->nome = $nome;
        
    }
}
?>