<?php
namespace CalorDado;

final class ControleDeAcesso {
    public function __construct() {
        /* Se não existir uma sessão em funcionamento */
        if(!isset($_SESSION)) {
            /* Então iniciamos a sessão */
            session_start();
        }
    }

    public function verfificaAcesso():void{
        /* Se NÃO EXISTIR uma variável de sessão relacionada ao id do usuário logado.. */
        if (!isset($_SESSION['id'])) {
            /* Então significa que o usuário não está logado, portando apqgue qualquer resquício de sessão e force o usuário a ir para o login.php */
            session_destroy();
            header("location:../login.php?acesso_proibido");
            die();
        }
    }

    public function login(int $id, string $nome, string $tipo):void{
        /* No momento em que ocorrer o login, adicionamos a sessão variáveis de sessão contendo dados necessários para o sistema */
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = $tipo;
    }

    public function logout():void{
        session_start();
        session_destroy();
        header("location:../login.php?logout");
        die();
    }

    public function verfificaAcessoAdmin():void{
        /* !== diferente */
        if ($_SESSION['tipo'] !== 'admin' ) {
            header("location:nao-autorizado.php");
            die();
        }
    }
}

?>