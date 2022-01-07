<?php
class Horario {

    public $id;
    public $hrAberturaSemanal;
    public $hrFechamentoSemanal;
    public $hrAberturaSabado;
    public $hrFechamentoSabado;
    public $hrAberturaDomingo;
    public $hrFechamentoDomingo;
    public $fk_idUnidade;
    public $nome;


    function __construct($id, $hrAberturaSemanal, $hrFechamentoSemanal, $hrAberturaSabado, $hrFechamentoSabado, $hrAberturaDomingo, $hrFechamentoDomingo, $fk_idUnidade, $nome) {
        $this->id = $id;
        $this->hrAberturaSemanal = $hrAberturaSemanal;
        $this->hrFechamentoSemanal = $hrFechamentoSemanal;
        $this->hrAberturaSabado = $hrAberturaSabado;
        $this->hrFechamentoSabado = $hrFechamentoSabado;
        $this->hrAberturaDomingo = $hrAberturaDomingo;
        $this->hrFechamentoDomingo = $hrFechamentoDomingo;
        $this->fk_idUnidade = $fk_idUnidade;
        $this->nome = $nome;
    }
}
?>