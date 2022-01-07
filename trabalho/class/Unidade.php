<?php
class Unidade {

    public $id;
    public $nome;
    public $endereco;
    public $telefone;
    public $cep;
    public $email;
    public $responsavel;
    public $cidade;
    public $estado;
    public $fk_Categoria;
    public $categoria_descricao;

    function __construct($id, $nome, $endereco, $telefone, $cep, $email, $responsavel, $cidade, $estado, $fk_Categoria, $categoria_descricao = "") {
        $this->id = $id;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->cep = $cep;
        $this->email = $email;
        $this->responsavel = $responsavel;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->fk_Categoria = $fk_Categoria;
        $this->categoria_descricao = $categoria_descricao;        
    }
}
?>
