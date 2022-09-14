<?php
require_once "./inc/cabecalho.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use CalorDado\Usuario;
if( isset($_GET['campo_obrigatorio'])) {
	$feedback = 'Preencha o campo "Email"!';
} elseif ( isset($_GET['nao_encontrado'])){
	$feedback = 'Usuário não encontrado';
} elseif ( isset($_GET['email_enviado'])){
	$feedback = 'Email enviado com sucesso!';
} 
?>
<section class="row d-flex justify-content-center p-5 login">
  <div class=" row delimagens text-center col-lg-6 col-xxl-4 bg-white rounded-start">
    <h1 class="mb-4 mt-4">Bem-Vindo de volta!</h1>
    <p>Para se manter conectado conosco faça login com suas informações pessoais.</p>
    <img  src="img/icones/img-login-desk.png" alt=""> 
  </div>
  <div class="row bg-black col-12 col-md-8 col-lg-6 col-xxl-4 rounded-end">
    <div class="m-auto col-11 py-5">
      <div class="text-center">
        <img src="img/img-logos/Favicon_png-min.png" alt="">
      </div>
      <h2 class="text-center text-white  mb-4">Recuperar senha</h2>
      <p class="text-white text-center">Coloque o E-mail relacionado a conta abaixo que mandaremos um email com sua senha nova.</p>
      <?php if(isset($feedback)){?>
				<p class="my-2 alert alert-warning text-center">
			  <?= $feedback?> <i class=""></i> </p>
      <?php } ?>
      <form action="" method="post" id="form-login" name="form-login">
        <!-- Email input -->
        <div class="form-outline mb-2">
          <input type="email" name="email" id="email" class="form-control form-control-lg"
          placeholder="Email"/>
          <label class="form-label" for="form3Example3"></label>
        </div>
        <button class="btn btn-primary btn-lg mt-3 col-12" name="recuperar" id="enviar" type="submit">Enviar</button>
        <div class="d-flex justify-content-between align-items-center">
          <p class="small mt-2 pt-1 mb-0 text-white">Não tem uma conta ainda? </p>
          <a href="cadastro.php" class="politica col-6 text-end">Inscrever-se</a>   
        </div> 
      </form>
    </div>  
  </div>    
</section> 
<?php
// Verificação de email
if (isset($_POST['recuperar'])){
if (empty($_POST['email'])){
	header("location:recuperar-senha.php?campo_obrigatorio");
} else {
  // Buscando um usuário no banco de dados para fazer o login 
  $usuario = new Usuario;
	$usuario->setEmail($_POST['email']);
  $dados = $usuario->buscar();
	if (!$dados)	{
		header ("location:recuperar-senha.php?nao_encontrado");
	} else {
    $usuario->setId($dados['id']);
    $recuperar = $usuario->novaSenha();
    // var_dump($recuperar);
    // die();
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $recuperaEmail = $_POST['email']; 
        try{
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = '7fb659e987c901';
        $mail->Password = '95e59bc2a080bf';
        $mail->Port = 2525;       
        // Quem envia
        $mail->setFrom('suporte@calordado.com.br');
        // Para quem responder
        $mail->addReplyTo('no-reply@email.com.br');
        // Quem recebe
        $mail->addAddress($recuperaEmail, $dados['nome']);             
        $mail->isHTML(true);
        $mail->Subject = 'Recuperação de Senha - Calor dado';
        $mail->Body=
        '<div class="container text-center">       
        Olá,'.$dados['nome'].'!<br><br>
        Você fez uma solicitação de recuperação de senha.<br><br>
        Caso você tenha recebido esse email por engano, desconsidere. E não se preocupe! Essa mensagem foi enviada apenas para o seu email.<br><br>
        Para voltar a acessar nossos recursos, utilize a senha abaixo. Não se esqueça de diferenciar os caracteres maiúsculos e minúsculos.<br><br>       
        '.$recuperar.'<br><br>        
        </div>
        ';
        $mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
        // $mail->addAttachment('/tmp/image.jpg', 'nome.jpg');       
        $mail->send();
          echo 'Mensagem enviada com sucesso.<br>';        
        } catch (Exception $e) {
          echo 'Erro: ' . $mail->ErrorInfo;
        };
        header("location:recuperar-senha.php?email_enviado");
		} }
	}
?>
<?php require_once "./inc/rodape-admin.php"; ?>