<?php
use CalorDado\Cadastro;
use CalorDado\Usuario;
use CalorDado\Utilitarios;

require_once "./vendor/autoload.php";
require_once "./inc/cabecalho.php";
if (isset($_GET['id'])) {
	$usuario = new Usuario;
  $cadastro = new Cadastro;
  $usuario->setId($_GET['id']);
  $dados = $usuario->listarUm();
  if(isset($_POST['enviar'])){
    $cadastro->setId($_GET['id']);
    $cadastro->setTelefone($_POST['telefone']);
    $cadastro->setEndereco($_POST['endereco']);
    $cadastro->setNumero($_POST['numero']);
    $cadastro->setCep($_POST['cep']);
    $cadastro->setComplemento($_POST['complemento']);
    $cadastro->setBairro($_POST['bairro']);
    $cadastro->setCidade($_POST['cidade']);
    $cadastro->inserir();
  }  
}
/* 

} */
?>

    <article class="container row m-auto">
      <div class="text-center col-md-6 p-3 p-md-2 p-lg-4 mt-xxl-4">
        <div class="mt-xxl-3"><img src="img/icones/caminhao-calor-dado-min.png" title="ícone de um caminhão"></div>
          <h2 class="mt-1 mt-md-3 mt-lg-0">O QUE EU POSSO DOAR?</h2>
          <p class="text-center mt-5"> A nossa OSC arrecada tanto roupas, cobertores, calçados e também aceitamos doações em dinheiro para a compra das mesmas em condição nova.</p>
          <div class="col-12 mt-4 mb-4 text-center">
            <a class="btn btn-outline-primary" href="login.php" title="Ir para formulário de doação de roupas, cobertores ou tênis" role="button">Quero Doar</a>
          </div>  
        </div>
      </div>
      <div class="text-center col-md-6 p-4 p-md-1 mt-md-4 mt-xxl-5 p-xl-2">
        <div class="pb-4 mt-lg-1"><img src="img/icones/mao-quero-doar-min.png" title="ícone de uma mão aberta, com um coração em cima"></div>
        <h2 class="p-xxl-3">O QUE É FEITO COM A MINHA DOAÇÃO</h2>
        <p class="text-start mt-4 mt-md-1 p-md-2 p-lg-2 mt-lg-2 p-xl-1 p-xxl-3 text-center"> Tudo que será arrecadado será distribuido para moradores de rua, que em tempos de inverno sofrem com o intenso frio e ventos gelados, instituições onde abrigam crianças, adolecentes, adultos e idosos, que através da nossa ajuda podem ter uma vida melhor.</p>
      </div>
      <div class="text-center col-md-6 mb-5">
          <h2 class="mt-3 mt-md-0">DOAÇÃO PELO PIX</h2>
          <p class="mt-4 mt-lg-5 mt-xl-4 text-center p-xl-4"> As doações realizadas pelo <strong>PIX</strong>, são identificadas e compensadas no mesmo dia. Isso possibilita que com o valor arrecadado, já esteja na conta da nossa OSC ou disponível no dia seguinte.</p>
          <p>Flexibilidade: você pode sugerir valores mais baixos para doação sem sair no prejuízo com as altas taxas de processamento.</p>
      </div>
    
      <div class="text-center col-md-6 mb-xxl-5 mb-5">
        <h2 class="mb-4 mb-md-4"> LER QR CODE</h2>
        <p class="text-center"><strong>Chave PIX:</strong> (11) 98312-5076</p>

        <div class="mt-4 mt-md-4 mt-lg-3 mt-xl-0"><a href="https://nubank.com.br/pagar/169vv5/n6vqpJGoOB"><img src="https://api.qrserver.com/v1/create-qr-code/?data=https://nubank.com.br/pagar/169vv5/n6vqpJGoOB &size=250x2500" title="QR CODE para fazer doação em dinheiro"></a></div>

      </div>
    </article>

          
  <section class="delcelulares container my-xxl-5 mb-5">
    <div class="row m-auto ms-5">
      <div class="col-4 text-center row ms-1">
        <div class="mb-2"><img src="img/icones/celular-quero-doar-min.png" title="ícone de um celular"></div>
        <div class="col-1 mt-3 mt-xl-4"><h1>1</h1></div>
        <div class="col-10 col-xl-9 mt-xl-1 ms-xl-2"><p>Abra o aplicativo do seu banco e selecione a opção de pagar com QR CODE.</p></div>
      </div> 
      <div class="col-4 text-center row">
        <div class="mb-2"><img src="img/icones/celular-quero-doar-min.png" title="ícone de uma celular"></div>
        <div class="col-1 mt-4 mt-xl-5"><h1>2</h1></div>
        <div class="col-10 col-xl-9 mt-xl-3 ms-xl-3"><p>Aproxime a câmera do celular para escanear o QR CODE e depois escolha a quantia que irá doar.</p></div>
      </div>
      <div class="col-4 text-center row">
        <div class=""><img src="img/icones/celular-quero-doar-min.png" title="ícone de um celular"></div>
        <div class="col-2 mt-1 mt-md-4 mt-xl-5 col-xl-1 ms-xl-2 mt-xxl-5"><h1>3</h1></div>
        <div class="col-9 col-xl-9 col-lg-8 mt-xl-3 p-xxl-2 ms-xl-1 ms-xxl-3"><p>Pronto! Depois de confirmar a transferência, sua doação foi realizada com sucesso.</p></div>
      </div>
    </div>
  </section>
      

    <script src="js/jquery-3.6.0min.js"></script>
    <script src="js/vanilla-masker.min.js"></script>
    <script src="js/cep.js"></script>
    <?php require_once "./inc/rodape.php"; ?>