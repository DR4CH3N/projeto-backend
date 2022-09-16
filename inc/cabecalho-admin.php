<?php
ob_start();
use CalorDado\ControleDeAcesso;
require_once "../vendor/autoload.php";
/* Criamos objeto para acessar os recursos de sessão PHP na classe ControleDeAcesso */
$sessao = new ControleDeAcesso;
/* Executamos VerificaAcesso para checar se tem alguém logado */
$sessao->verfificaAcesso();
/* Se o parâmetro ?sair existir, então faça o logout */
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
  <link rel="shortcut icon" href="../img/img-logos/Favicon_png-min.png">
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
<header>
    <div class="limitador">
        <h1><a class="navbar-brand" href="index.php">   <?php if($_SESSION['tipo'] === 'admin') { ?> <i class="bi bi-unlock"></i> Admin <?php } else { ?> Usúario <?php } ?> | Calor Dado</a></h1>
      <!-- Menu de navegação -->
        <nav>
            <h2 class="icone"><a href="" title="Abra menu de navegação">Menu &equiv;</a></h2>
            <ul class="menu justify-content-end p-0"></a>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="meu-perfil.php">Perfil</a>
                </li>
                <?php if($_SESSION['tipo'] === 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="doacoes.php">Doações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Usuários</a>
                </li>            
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Cadastros</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="?sair"> <i class="bi bi-x-circle"></i> Sair</a>
                </li> 
            </ul>
        </nav>
    </div>
</header>
    <section class="container-fluid m-auto p-0">



    