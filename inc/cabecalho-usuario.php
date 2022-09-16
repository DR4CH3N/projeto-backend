<?php
ob_start();
use CalorDado\ControleDeAcesso;
require_once "../vendor/autoload.php";
$sessao = new ControleDeAcesso;
 $sessao->verfificaAcesso();
if(isset($_GET['sair'])){
    $sessao->logout();
}
?>
<!DOCTYPE html>
<html lang="pt-br"  class="h-100">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calor Dado</title>  
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/img-logos/Favicon_png-min.png">
  <!-- Descrição resumida da página -->
  <meta name="description" content="Somos uma instituição que busca ajudar as pessoas de extrema necessidade que moram nas ruas e passam por situações difícil, ainda mais em tempo de inverno.">   
  <!-- Palavras-chave da página -->
  <meta name="keywords" content="Doação, doação de agasalhos, doação de calçados"> 
  <!-- Inserindo o Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- Linkando para CSS externo-->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <!-- Início do cabeçalho --> 
  <header >
    <div class="limitador">
      <a href="index.php" title="Página Inicial"><img src="../img/img-logos/logo-calor-dado-min.png" alt="Calor Dado"></a>
      <!-- Menu de navegação -->
      <nav>
        <h2 class="icone"><a href="" title="Abra menu de navegação">Menu &equiv;</a></h2>
          <ul class="menu"></a>
            <li><a href="../index.php" title="página inicial">Home</a></li>
            <li><a href="../quemsomos.php" title="página quem somos">QUEM SOMOS</a></li>
            <li><a href="../contato.php" title="página contato">CONTATO</a></li>
            <li><a href="../admin/" title="página quero doar">Doações</a></li>
            <li class="nav-item">
                <a class="nav-link fw-bold" href="?sair"> <i class="bi bi-x-circle"></i> Sair</a>
            </li>
          </ul>
      </nav>
    </div>
  </header>
    <section class="container-fluid m-auto p-0">
  
  