<?php
use CalorDado\Cadastro;
use CalorDado\Utilitarios;
require_once "./vendor/autoload.php";
$dados = new Cadastro;
$listaDeDados = $dados->listarCadastro();
if(isset($_POST['enviar'])){
  $cadastro = new Cadastro;
  $cadastro->setEndereco($_POST['endereco']);
  $cadastro->setNumero($_POST['numero']);
  $cadastro->setCep($_POST['cep']);
  $cadastro->setComplemento($_POST['complemento']);
  $cadastro->setBairro($_POST['bairro']);
  $cadastro->setCidade($_POST['cidade']);
  $cadastro->inserir();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calor Dado - Quero Doar</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/img-logos/Favicon_png-min.png">

     <!-- Descrição resumida da página -->
    <meta name="description" content="Tem uma roupa, cobertores, calçados que nao usa mais? Que tal fazer uma doação para quem mais precisa em tempos de inverno?">

    <!-- Palavras-chave da página -->
    <meta name="keywords" content="Doação, caridade, instituição">

     <!-- Inserindo o Bootstrap-->
     <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.css"> 

    <!-- Linkando para CSS externo-->
    <link rel="stylesheet" href="style.css">

    <!-- Icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
</head>
<body>
  
    <!-- Menu --> 
    <header>
        <div class="limitador">
            <a href="index.html" title="Página Inicial"><img src="img/img-logos/logo-calor-dado-min.png" alt=""></a>
            <nav>
                <h2 class="icone"><a href="" title="Abra menu de navegação">Menu &equiv;</a></h2>
                <ul class="menu"></a>
                    <li><a href="index.html" title="página inicial">Home</a></li>
                    <li><a href="quemsomos.html" title="página quem somos">QUEM SOMOS</a></li>
                    <li><a href="querodoar.php" title="página quero doar">QUERO DOAR</a></li>
                    <li><a href="contato.html" title="página contato">CONTATO</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Fim Menu -->

    <section class="container row m-auto">
      <div class="text-center col-md-6 p-3 p-md-2 p-lg-4 mt-xxl-4">
        <div class="mt-xxl-3"><img src="img/icones/caminhao-calor-dado-min.png" title="ícone de um caminhão"></div>
          <h2 class="mt-1 mt-md-3 mt-lg-0">O QUE EU POSSO DOAR?</h2>
          <p class="text-center mt-5"> A nossa OSC arrecada tanto roupas, cobertores, calçados e também aceitamos doações em dinheiro para a compra das mesmas em condição nova.</p>
          <div class="col-12 mt-4 mb-4 text-center">
            <a class="btn btn-outline-primary" href="#formulario" title="Ir para formulário de doação de roupas, cobertores ou tênis" role="button">Quero Doar</a>
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
    
      <div class="text-center col-md-6 mb-xxl-5">
        <h2 class="mb-4 mb-md-4"> LER QR CODE</h2>
        <p class="text-center"><strong>Chave PIX:</strong> (11) 98312-5076</p>

        <div class="mt-4 mt-md-4 mt-lg-3 mt-xl-0"><a href="https://nubank.com.br/pagar/169vv5/n6vqpJGoOB"><img src="https://api.qrserver.com/v1/create-qr-code/?data=https://nubank.com.br/pagar/169vv5/n6vqpJGoOB &size=250x2500" title="QR CODE para fazer doação em dinheiro"></a></div>

      </div>
    </section>

          
  <section class="delcelulares container my-xxl-5">
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
      
  <!-- Espaço do conteudo e fomulário, seguir como esta no layout, as imagens ja estao na pasta-->

    <section class="container mt-lg-4 pt-4" 
    >
      <form action="" method="post" id="formulario" class="row g-3">
        <h2 class="text-center mt-5 mt-md-0">QUERO FAZER MINHA DOAÇÃO</h2> 

          <div class="col-md-6">
            <label for="inputEmail4" class="form-label"></label>

            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-person-fill"></i></div>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Nome:" name="Nome">
            </div>
          </div>

          <div class="col-md-6">
            <label for="inputPassword4" class="form-label"></label>
            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-telephone-fill"></i></div>
              <input type="tel" class="form-control" id="inputPassword4" placeholder="Tefefone:" name="Telefone">
            </div>  
          </div>

          <div class="col-md-12">
            <label for="inputPassword4" class="form-label"></label> 
            <div class="input-group">
              <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-envelope-fill"></i></div>
              <input type="email" class="form-control" id="inputPassword4" placeholder="E-mail:" name="E-mail">
            </div>  
          </div>
          

              <h2 class="text-center">O que deseja doar?</h2>
           <section class="d-flex justify-content-between">
              <div class="form-check form-check-inline text-center">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Roupas">
                <label class="form-check-label" for="inlineCheckbox1">Roupas</label>
              </div>

              <div class="form-check form-check-inline text-center">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Cobertores">
                <label class="form-check-label" for="inlineCheckbox2">Cobertores</label>
              </div>

              <div class="form-check form-check-inline text-center">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Calçados">
                <label class="form-check-label" for="inlineCheckbox3">Calçados</label>
              </div>
           </section>


            <!-- Endereço  -->

            </div>  
          <h2 class="text-center mt-5">Endereço</h2>  
          
          <div class="col-md-12">
            <label for="inputPassword4" class="form-label"></label> 
            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-geo-alt-fill"></i></div>
              <input type="text" class="form-control" id="inputPassword4" placeholder="Endereço:" name="endereco">
            </div>  
          </div>
          
          <div class="col-md-6">
            <label for="inputAddress" class="form-label"></label>
            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-123"></i></div>
              <input type="number" class="form-control" id="inputAddress" placeholder="Número:" name="numero">
            </div>
          </div>


          <div class="col-md-6">
            <label for="inputEmail4" class="form-label"></label>
            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-123"></i></div>
              <input type="number" class="form-control" id="inputEmail4" maxlength="9" placeholder="CEP: " name="cep">
            </div>
          </div>

          <div class="col-md-6">
            <label for="inputAddress" class="form-label"></label>
            <div class="input-group ">
              <div class="input-group-text bg-transparent"><i class="bi bi-geo-alt-fill"></i></div>
              <input type="text" class="form-control" id="inputAddress" placeholder="Complemento:" name="complemento">
            </div>
          </div>

          <div class="col-md-6">
            <label for="inputAddress" class="form-label"></label>
            <div class="input-group ">
              <div class="input-group-text bg-transparent"><i class="bi bi-house-fill"></i></div>
              <input type="text" class="form-control" id="inputAddress" placeholder="Bairro:" name="bairro">
            </div>
          </div>

          <div class="col-12 ">
            <label for="inputCity" class="form-label"></label>
            <div class="input-group ">
              <div class="input-group-text bg-transparent"><i class="bi bi-house-door-fill"></i></div>
              <input type="text" class="form-control" id="inputCity" placeholder="Cidade: " name="cidade">
            </div>
          </div>
      
          <a href="lgpd.html" class="politica" title="Página de Política de Privacidade">Política de Privacidade</a>
          
          <div class="col-12 mt-4 mb-4 text-end">
            <button name="enviar" type="submit" class="btn btn-primary">Enviar</button>
          </div>

      </form>
    </section>


<!-- Início Footer -->
<footer class="text-center">
  <section class="container-fluid row m-auto border-top">
    <div class="col-md-4 col-xl-4 col-xxl-4 mt-5 ms-md-3 ms-xl-0 ms-xxl-4 ps-xxl-5 pt-xxl-2">
      <img src="img/img-logos/coracao_logo_1.ico" alt="Logo-calor-dado">
      <div class="m-1 p-2 p-md-0 m-md-0 p-lg-1 m-lg-0 p-xl-3 p-xxl-2 m-xxl-2">  
        <span>Somos a Quero Doar, uma organização voltada para facilitar a coleta e distribuição de doações.</span>
      </div>
    </div>      
    
    <div class="col-md-4 col-xl-4 col-xxl-4 mb-3 mt-5 pt-md-4">
      <h5>Contato</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="https://www.bing.com/maps?osid=098d5f2d-50f8-4638-adc8-79863c0c76c2&cp=-22.687322~-50.101381&lvl=7&imgid=07691d95-1785-4eb6-b01d-249f14c75ee5&v=2&sV=2&form=S00027" class="nav-link p-0 text-muted">São Paulo - SP, BR</a></li>
          <li class="nav-item mb-2"><a href="mailto:calordado@gmail.com" class="nav-link p-0 text-muted">Calordado@gmail.com</a></li>
          <li class="nav-item mb-2"><a href="tel:1122222222" class="nav-link p-0 text-muted">+(11) 2222-2222</a></li>
          <li class="nav-item mb-2"><a href="https://api.whatsapp.com/send?phone=5511969520059&text=Envie%20sua%20Mesagem%3A" class="nav-link p-0 text-muted">+(11) 99999-9999</a></li>
        </ul>
    </div>

    <div class="col-md-3  col-xl-4 col-xxl-3 mt-5 pt-md-4  mb-5">
      <h5>Mapa do site</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="index.html" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="quemsomos.html" class="nav-link p-0 text-muted">Quem somos</a></li>
          <li class="nav-item mb-2"><a href="querodoar.html" class="nav-link p-0 text-muted">Quero doar</a></li>
          <li class="nav-item mb-2"><a href="contato.html" class="nav-link p-0 text-muted">Contato</a></li>
        </ul>
    </div>
  </section>
</footer>

<!-- Copyright -->
<section class="container-fluid copy py-3">
  <div class="text-center">  
    <div class="col">
        <p class="">
          <a class="ms-3" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a>
          <a class="ms-3" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a>
          <a class="ms-3" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a>
          <a class="ms-3" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-whatsapp" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
          </svg></a>
        </p>
    </div>
  
    <div class="col">
      <span class="text-light">&copy; Calor Dado 2022 - Todos direitos reservados</span>
    </div>
  </div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="facebook" viewBox="0 0 16 16">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
      </symbol>
      <symbol id="instagram" viewBox="0 0 16 16">
        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
      </symbol>
      <symbol id="twitter" viewBox="0 0 16 16">
        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
      </symbol>
    </svg>
</section>
<!-- FIM DO Footer -->

        
    <!-- Linkando para o JS -->
    <script src="js/menu.js"></script>
    <script src="bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/bootstrap.js"></script>
</body>
</html>