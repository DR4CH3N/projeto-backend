<?php
require_once "./inc/cabecalho.php";

use CalorDado\ControleDeAcesso;
use CalorDado\Usuario;
use CalorDado\Utilitarios;

require_once "./vendor/autoload.php";
$usuario = new Usuario;

if(isset($_POST['inscrever'])){
  $usuario->setNome($_POST['nome']);
  $usuario->setEmail($_POST['email']);
  $usuario->setTipo('usuario');
  if($_POST['senha'] === $_POST['senha-confirma']) {
    $usuario->setSenha($usuario->codificaSenha($_POST['senha']));
    $usuario->inserir();
    $dados = $usuario->buscar();
    /* if($dados['email'] === $_POST['email']){
      header("location:cadastro.php?ja_existe");
    } */
    
    $sessao = new ControleDeAcesso;
    $sessao->login($dados['id'], $dados['nome'], $dados['tipo']);
    header("location:admin/index.php?cadastrado");
  } else {
    header("location:cadastro.php?senhas_diferentes");
  }
}

?>
  <!-- área de login -->
  <section class="row d-flex justify-content-center p-5 login ">
  <?php if(isset($_GET['ja_existe'])){?>
			<p class="my-2 alert alert-primary text-center">
				E-mail já existe!
			</p>
    <?php } ?>
    <?php if(isset($_GET['senhas_diferentes'])){?>
			<p class="my-2 alert alert-primary text-center">
				Senhas não estão iguais!
			</p>
    <?php } ?>
    <div class=" row delimagens text-center col-lg-6 col-xxl-4 bg-white rounded-start">
      <h1 class="mb-4 mt-5">Bem-Vindo à area de cadastro!</h1>
      <p class="p-4">Faça seu cadastro com suas informações pessoais.</p>
      <img src="img/icones/img-login-desk.png" alt="">  
    </div>
    <div class="row bg-black col-12 col-md-8 col-lg-6 col-xxl-4 rounded-end">
      <div class="m-auto col-11  py-5">
        <div class="text-center">
          <img src="img/img-logos/Favicon_png-min.png" alt="">
        </div>
        <h2 class="text-center text-white  mb-4">Inscrever-se</h2>
        <form action="" method="post">
          <div class="form-outline mb-2">
            <input type="text" id="nome" name="nome" class="form-control form-control-lg"
            placeholder="Nome " />
            <label class="form-label" for="nome"></label>
          </div>
          <!-- Email input -->
          <div class="form-outline mb-2">
            <input type="email" id="email" name="email" class="form-control form-control-lg"
            placeholder="Email " />
            <label class="form-label" for="email"></label>
          </div>
          <!-- Password input -->
          <div class="form-outline mb-2">
            <input type="password" id="senha" name="senha" class="form-control form-control-lg"
            placeholder="Senha" required>
            <label class="form-label" for="senha"></label>
          </div>
          <div class="form-outline mb-2">
            <input type="password" id="senha-confirma" name="senha-confirma" class="form-control form-control-lg"
            placeholder="Confirmar senha" required>
            <label class="form-label" for="senha-confirma"></label>
          </div>
          <div class="text-center text-lg-start mt-4 ">
            <button type="submit" name="inscrever" id="inscrever" class="btn btn-primary col-12 btn-lg"
            >Inscrever-se</button> 
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p class="small mt-2 pt-1 mb-0 text-white">Já tem uma conta? </p>
            <a href="login.php" class="politica ">Entrar</a>
          </div> 
        </form>
      </div>  
    </div>    
  </section> 
<?php require_once "./inc/rodape-admin.php"; ?>  