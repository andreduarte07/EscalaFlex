<?php
use \Firebase\JWT\JWT;

class UsuarioController {

    private $secretkey = "s3n4c";

    public function autenticar($req, $resp, $args){
        $var = $req->getParsedBody();
        $dao = new UsuarioDAO();
        $usuario = $dao->buscarPorLogin($var["email"]);
        

        if($usuario == false){
            return $resp->withStatus(401);
        } else{
            if($usuario->senha == $var["senha"] and $usuario->status == 1 ){
                $tokenpayload = array(
                    "usuario_id" => $usuario->id,
                    "usuario_nome" => $usuario->nome
                );

                $token = JWT::encode($tokenpayload, $this->secretkey);

                return $resp->withJson(["token" => $token], 201)
                            ->withHeader("Content-type", "application/json");
            }
        }
    }

    public function validarToken($req, $resp, $next){

    
        $token = str_replace("Bearer ", "", $req->getHeader('Authorization')[0]);
        
        
        if($token){
            try{
                $decoded = JWT::decode($token, $this->secretkey, array("HS256"));
                if($decoded){
                    return($next($req, $resp));
                }
            } catch(Exception $error){
                return $resp->withStatus(401);
            }
        }

        return $resp->withStatus(401);
    }
    public function listar($req, $resp, $args) {
        $dao = new UsuarioDAO();
        $lista = $dao->listar();
        $resp = $resp->withJson($lista);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function buscarPorId($req, $resp, $args) {
        $id = (int) $args["id"];
        $dao = new UsuarioDAO();
        $usuario = $dao->buscarPorId($id);
        $resp = $resp->withJson($usuario);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function inserir($req, $resp, $args) {
        $var = $req->getParsedBody();
        $usuario = new Usuario(0, $var["nome"], $var["email"], $var["senha"], $var["status"], $var["matricula"]);
        $dao = new UsuarioDAO();
        $dao->inserir($usuario);
        $resp = $resp->withJson($usuario);
        $resp = $resp->withHeader("Content-type", "application/json");
        $resp = $resp->withStatus(201);
        return $resp;
    }


    public function atualizar($req, $resp, $args) {
        $idUsuario = (int) $args["id"];
        $var = $req->getParsedBody();
        $usuario = new Usuario($idUsuario, $var["nome"], $var["email"], $var["senha"], $var["status"], $var["matricula"]);
        $dao = new UsuarioDAO();
        $dao->atualizar($usuario);
        $resp = $resp->withJson($usuario);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

    public function deletar($req, $resp, $args) {
        $idUsuario = (int) $args["id"];
        $dao = new UsuarioDAO();
        $usuario = $dao->buscarPorId($idUsuario);
        $dao->deletar($idUsuario);
        $resp = $resp->withJson($usuario);
        $resp = $resp->withHeader("Content-type", "application/json");
        return $resp;
    }

}
?>
