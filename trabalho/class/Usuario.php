<?php
class Usuario {

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $status;
    public $matricula;
 

    function __construct($id, $nome, $email, $senha, $status, $matricula) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->status = $status;
        $this->matricula = $matricula;
    }
}
?>
