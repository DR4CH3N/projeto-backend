<?php
require_once "vendor/autoload.php";
require_once "./inc/cabecalho.php";
use CalorDado\ControleDeAcesso;
use CalorDado\Usuario;
if (isset($_POST['entrar'])) {
	if (empty($_POST['email']) || empty($_POST['senha'])) {
		header("location:login.php?campos_obrigatorios");
	} else {
    $usuario = new Usuario;
    $usuario->setEmail($_POST['email']);
    $dados = $usuario->buscar();
    if(!$dados){
      header("location:login.php?nao_encontrado");
    } else {
      if(password_verify($_POST['senha'], $dados['senha'])){
        $sessao = new ControleDeAcesso;
				$sessao->login($dados['id'], $dados['nome'], $dados['tipo']);
        header("location:admin/");
      } else {
        header("location:login.php?senha_incorreta");
      }
    }
  }
} 
if (isset($_GET['acesso_proibido'])) {
	$feedback = "Você deve logar primeiro!";
} elseif (isset($_GET['campos_obrigatorios'])) {
	$feedback = "Você deve preencher todos os campos!";
} elseif (isset($_GET['nao_encontrado'])) {
	$feedback = "Usúario não encontrado!";
} elseif (isset($_GET['senha_incorreta'])) {
	$feedback = "Senha incorreta!";
}
?>
<!-- área de login -->
<section class="row d-flex justify-content-center p-5 login ">
  <?php if(isset($feedback)){?>
		<p class="my-2 alert alert-warning text-center">
			<?=$feedback?>
		</p>
  <?php } ?>
  <div class=" row delimagens text-center col-lg-6 col-xxl-4 bg-white rounded-start">
    <h1 class="mb-4 mt-4">Bem-Vindo de volta!</h1>
    <p>Para se manter conectado conosco faça login com suas informações pessoais.</p>
    <img  src="img/icones/img-login-desk.png" alt=""> 
  </div>
  <div class="row bg-black col-12 col-md-8 col-lg-6 col-xxl-4 rounded-end">
    <div class="m-auto col-11  py-5">
      <div class="text-center">
        <img src="img/img-logos/Favicon_png-min.png" alt="">
      </div>
      <h2 class="text-center text-white  mb-4">Entrar</h2>
      <form  action="" method="post" id="form-login" name="form-login">
        <!-- Email input -->
        <div class="form-outline mb-2">
          <input type="email" name="email" id="email" class="form-control form-control-lg"
          placeholder="Email " />
          <label class="form-label" for="form3Example3"></label>
        </div>
        <!-- Password input -->
        <div class="form-outline mb-2">
          <input type="password" name="senha" id="senha" class="form-control form-control-lg"
          placeholder="Senha" />
          <label class="form-label" for="form3Example4"></label>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <a href="recuperar-senha.php" class="politica col-12 text-start">Esqueceu a senha?</a>
        </div>
        <button class="btn btn-primary btn-lg mt-3 col-12" name="entrar" type="submit">Entrar</button>
        <div class="d-flex justify-content-between align-items-center">
          <p class="small mt-2 pt-1 mb-0 text-white">Não tem uma conta ainda? </p>
          <a href="cadastro.php" class="politica col-6 text-end">Inscrever-se</a>   
        </div> 
      </form>
    </div>  
  </div>    
</section> 
<?php require_once "./inc/rodape-admin.php"; ?>
 