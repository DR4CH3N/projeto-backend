<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "./inc/cabecalho.php";
if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = 0; // 2 exibe log/mensagens de erro ou sucesso

    try {
        // Confifurações do servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'smtp.titan.email';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl'; 
        $mail->Username = 'lucasmendes@sunioweb.com.br';
        $mail->Password = 'Teste@123';

        // Quem envia
        $mail->setFrom('lucasmendes@sunioweb.com.br', 'Admin');

        // Quem recebe
        $mail->addAddress('lucasmendes@sunioweb.com.br', 'Admin');
        
        // Para quem responder
        $mail->addReplyTo($email, 'Retorno do contato');

        // Content
        $mail->isHTML(true);

        // Set email format to HTML
        $mail->Subject = "Contato Site Calor Dado";

        // Corpo da mensagem em formato HTML
        $mail->Body    = "<b>Nome:</b>.$nome <br> <b>E-mail:</b> $email <br> <b>Telefone:</b> $telefone</b> <br> <b>Mensagem:</b> $mensagem";

        // Corpo da mensagem em formato texto puro
        $mail->AltBody = "Nome: $nome \ E-mail: $email \n Telefone: $telefone: \n Mensagem: $mensagem";

        $mail->send();
        echo 'Mensagem enviada com sucesso!';
        // echo "<script>alert('enviado')</script>"; Testando
    } catch (Exception $e) {
        echo "Ops! Deu ruim: {$mail->ErrorInfo}";
    }
} // Final do IF
?>

    <!-- TITULO E DESCRIÇÃO -->
    <div class="container-fluid mb-4">
      <div class="row align-items-center destaque text-light">
        <h1 class="text-center pb-4 py-3 text-light">Como posso ajudar?</h1>
        <p class="text-center">Você tem uma pergunta ou está interessado em trabalhar conosco e com nossa equipe? Basta preencher os campos do formulario abaixo:</p>
      </div>
    </div>
    <!--  FORMULARIO PRA PODER INSERIR OS DADOS -->

<div class="row m-auto">
  <div class="col-lg-6 col-xxl-5 m-auto mt-5">
    <form action="" method="post" class="contatenos form-control">    
                    
      <h2 class="text-center">Contate-nos</h2>     
      
      <div class="pb-2">
        <label for="inputPassword4" class="form-label"></label> 
        <div class="input-group">
          <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-person-fill"></i></div>
          <input type="nome" class="form-control" id="nome" placeholder="Nome:" name="nome">
        </div>  
      </div>
      
      <div class="my-2">
        <label for="inputPassword4" class="form-label"></label> 
        <div class="input-group">
          <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-envelope-fill"></i></div>
          <input type="email" class="form-control" id="email" placeholder="E-mail:" name="email">
        </div>  
      </div>
      
      <div class="my-2">
        <label for="inputPassword4" class="form-label"></label> 
        <div class="input-group">
          <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-telephone-fill"></i></div>
          <input type="tel" class="form-control" id="telefone" placeholder="Telefone:" maxlength="12" name="telefone">
        </div>  
      </div>

    	<div class="mb-3">
				<label class="form-label" for="resumo">Resumo (máximo de 300 caracteres):</label>
				<span id="maximo" class="badge bg-danger">0</span>
        <div class="input-group">
          <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-envelope-paper-fill"></i></div>
				  <textarea class="form-control" required name="resumo" id="resumo" cols="50" rows="2" maxlength="300"></textarea>
        </div>  
			</div>

      
    
      <div class="pb-2">
        <p><a href="lgpd.php" class="politica" title="Página de Política de Privacidade">Política de Privacidade</a></p>
        <div class="text-end">
          <button name="enviar" type="submit" class="btn btn-primary text-center" title="enviar formulário de contato">Enviar</button>
        </div>   
      </div>
     </form>
  </div>

  <div class="col-lg-6 mt-5 mb-5">
    <div class="text-center">
      <h2>Localização</h2>
        <p>Av.paulista, 1500 - Bela Vista, são paulo - SP</P>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1784274189363!2d-46.65746628255615!3d-23.562034400000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c925263541%3A0x4b30df73fca5a36b!2sAv.%20Paulista%2C%201500%20-%20Bela%20Vista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001310-100!5e0!3m2!1spt-BR!2sbr!4v1653573464097!5m2!1spt-BR!2sbr" width="80%" height="485" class="border" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>


<?php require_once "./inc/rodape.php"; ?>
<!-- Linkando para o JS -->
    <script src="js/contador.js"></script>
    <script src="js/jquery-3.6.0min.js"></script>
    <script src="js/vanilla-masker.min.js"></script>
    <script src="js/cep.js"></script>
</body>
</html>