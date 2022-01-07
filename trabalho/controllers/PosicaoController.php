<?php

class PosicaoController {

    public function listar($req, $resp, $args) {
        $dao = new PosicaoDAO();
        $lista = $dao->listar();
        $resp = $resp->withJson($lista);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function listar2($req, $resp, $args) {
        $dao = new PosicaoDAO();
        $lista = $dao->listar2();
        $resp = $resp->withJson($lista);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function buscarPorId($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new PosicaoDAO();
        $horario = $dao->buscarPorId($id);
        $resp = $resp->withJson($horario);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function inserir($req, $resp, $args) {
        $var = $req->getParsedBody();
        $posicao = new Posicao(0, $var["descricao"], $var["fk_idUnidade"], "");
        $dao = new PosicaoDAO();
        $dao->inserir($posicao);
        $resp = $resp->withJson($posicao);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    public function atualizar($req, $resp, $args) {
        $idPosicao = (int) $args["id"];
        $var = $req->getParsedBody();
        $posicao = new Posicao($idPosicao, $var["descricao"], $var["fk_idUnidade"], "");
        $dao = new PosicaoDAO();
        $dao->atualizar($posicao);
        $resp = $resp->withJson($posicao);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }


    public function deletar($req, $resp, $args) {
        $idPosicao = (int) $args["id"];
        $dao = new PosicaoDAO();
        $posicao = $dao->buscarPorId($idPosicao);
        $dao->deletar($idPosicao);
        $resp = $resp->withJson($posicao);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }
}
?>