<?php


class HorarioController {

    public function listar($req, $resp, $args) {
        $dao = new HorarioDAO();
        $lista = $dao->listar();
        $resp = $resp->withJson($lista);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function buscarPorId($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new HorarioDAO();
        $horario = $dao->buscarPorId($id);
        $resp = $resp->withJson($horario);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function inserir($req, $resp, $args) {
        $var = $req->getParsedBody();
        $horario = new Horario(0, $var["hrAberturaSemanal"], $var["hrFechamentoSemanal"], $var["hrAberturaSabado"], $var["hrFechamentoSabado"], $var["hrAberturaDomingo"], $var["hrFechamentoDomingo"], $var["fk_idUnidade"], "");
        $dao = new HorarioDAO();
        $dao->inserir($horario);
        $resp = $resp->withJson($horario);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    public function atualizar($req, $resp, $args) {
        $idHorario = (int) $args["id"];
        $var = $req->getParsedBody();
        $horario = new Horario(0, $var["hrAberturaSemanal"], $var["hrFechamentoSemanal"], $var["hrAberturaSabado"], $var["hrFechamentoSabado"], $var["hrAberturaDomingo"], $var["hrFechamentoDomingo"], $var["fk_idUnidade"], "");
        $dao = new HorarioDAO();
        $dao->atualizar($horario);
        $resp = $resp->withJson($horario);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }


    public function deletar($req, $resp, $args) {
        $idHorario = (int) $args["id"];
        $dao = new HorarioDAO();
        $horario = $dao->buscarPorId($idHorario);
        $dao->deletar($idHorario);
        $resp = $resp->withJson($horario);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }
}
?>