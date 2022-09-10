<?php
use CalorDado\ControleDeAcesso;
use CalorDado\Usuario;
require_once "../vendor/autoload.php";
$sessao = new ControleDeAcesso;
$sessao->verfificaAcesso();
$sessao->verfificaAcessoAdmin();
$usuario = new Usuario;
$usuario->setId($_GET['id']);
$usuario->excluir();
header("location:usuarios.php");

?>