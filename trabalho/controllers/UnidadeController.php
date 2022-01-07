<?php


class UnidadeController {

    public function listar($req, $resp, $args) {
        $dao = new UnidadeDAO();
        $lista = $dao->listar();
        $resp = $resp->withJson($lista);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }


    public function buscarPorId($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new UnidadeDao();
        $unidade = $dao->buscarPorId($id);
        $resp = $resp->withJson($unidade);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function inserir($req, $resp, $args) {
        $var = $req->getParsedBody();
        $unidade = new Unidade(0, $var["nome"], $var["endereco"], $var["telefone"], $var["cep"], $var["email"], $var["responsavel"], $var["cidade"], $var["estado"], $var["fk_Categoria"], "");
        $dao = new UnidadeDao();
        $dao->inserir($unidade);
        $resp = $resp->withJson($unidade);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withStatus(201);
        return $resp;
    }

    public function atualizar($req, $resp, $args) {
        $idUnidade = (int) $args["id"];
        $var = $req->getParsedBody();
        $unidade = new Unidade($idUnidade, $var["nome"], $var["endereco"], $var["telefone"], $var["cep"], $var["email"], $var["responsavel"], $var["cidade"], $var["estado"], $var["fk_Categoria"], "");
        $dao = new UnidadeDAO();
        $dao->atualizar($unidade);
        $resp = $resp->withJson($unidade);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function deletar($req, $resp, $args) {
        $idUnidade = (int) $args["id"];
        $dao = new UnidadeDAO();
        $unidade = $dao->buscarPorId($idUnidade);
        $dao->deletar($idUnidade);
        $resp = $resp->withJson($unidade);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }
}
?>