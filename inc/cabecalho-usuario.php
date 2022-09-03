<?php
ob_start();
use CalorDado\ControleDeAcesso;
require_once "./vendor/autoload.php";
/* Criamos objeto para acessar os recursos de sessão PHP na classe ControleDeAcesso */
$sessao = new ControleDeAcesso;
/* Executamos VerificaAcesso para checar se tem alguém logado */
/* $sessao->verfificaAcesso(); */
/* Se o parâmetro ?sair existir, então faça o logout */
if(isset($_GET['sair'])){
    $sessao->logout();
}
$pagina = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calor Dado</title>
   
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/img-logos/Favicon_png-min.png">

  <!-- Descrição resumida da página -->
  <meta name="description" content="Somos uma instituição que busca ajudar as pessoas de extrema necessidade que moram nas ruas e passam por situações difícil, ainda mais em tempo de inverno.">
    
  <!-- Palavras-chave da página -->
  <meta name="keywords" content="Doação, doação de agasalhos, doação de calçados">
  
  <!-- Inserindo o Bootstrap-->
  <link rel="stylesheet" href="../bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">

  <!-- Linkando para CSS externo-->
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <!-- Início do cabeçalho --> 
  <header >
    <div class="limitador">
      <a href="../index.php" title="Página Inicial"><img src="../img/img-logos/logo-calor-dado-min.png" alt="Calor Dado"></a>

    <!-- Menu de navegação -->
      <nav>
        <h2 class="icone"><a href="" title="Abra menu de navegação">Menu &equiv;</a></h2>
          <ul class="menu"></a>
            <li><a href="../index.php" title="página inicial">Home</a></li>
            <li><a href="../quemsomos.php" title="página quem somos">QUEM SOMOS</a></li>
            <li><a href="../querodoar.php" title="página quero doar">QUERO DOAR</a></li>
            <li><a href="../contato.php" title="página contato">CONTATO</a></li>
            <li class="nav-item">
                <a class="nav-link fw-bold" href="?sair"> <i class="bi bi-x-circle"></i> Sair</a>
            </li>
            </li>
          </ul>
      </nav>
    </div>
  </header>
  
<main class="flex-shrink-0">
    <div class="container">

  
  