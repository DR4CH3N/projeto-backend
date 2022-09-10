<?php
use CalorDado\Cadastro;
use CalorDado\Doacao;
use CalorDado\Usuario;
use CalorDado\Utilitarios;

require_once "../inc/cabecalho-usuario.php";
if (isset($_GET['id'])) {
	$usuario = new Usuario;
  $cadastro = new Cadastro;
  $usuario->setId($_GET['id']);
  $dados = $usuario->listarUm();
}
if(isset($_POST['enviar'])){
  $cadastro->setTelefone($_POST['telefone']);
  $cadastro->setEndereco($_POST['endereco']);
  $cadastro->setNumero($_POST['numero']);
  $cadastro->setCep($_POST['cep']);
  $cadastro->setComplemento($_POST['complemento']);
  $cadastro->setBairro($_POST['bairro']);
  $cadastro->setCidade($_POST['cidade']);
  $cadastro->setUsuarioId($_GET['id']);
  $calcados = intval($_POST['calcados']);
  $cobertores = intval($_POST['cobertores']);
  $roupas = intval($_POST['roupas']);
  $doacao = new Doacao;

		  $doacao->setCobertores($cobertores);
      $doacao->setCalcados($calcados);
      $doacao->setRoupas($roupas);

      
 
   
  $doacao->setUsuarioId($_GET['id']);
  $doacao->inserir();  
  $cadastro->inserir();
}  
$listar = new Cadastro;
$listar->setId($_GET['id']);

?>
  <!-- Espaço do conteudo e fomulário, seguir como esta no layout, as imagens ja estao na pasta-->
    <section class="container mt-lg-4 pt-4">
      <form action="" method="post" class="row g-3">
        <h2 class="text-center mt-5 mt-md-0">QUERO FAZER MINHA DOAÇÃO</h2> 

          <div class="col-md-6">
            <label for="inputEmail4" class="form-label"></label>

            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-person-fill"></i></div>
              <input type="text" class="form-control" id="nome" value="<?=$dados['nome']?>" placeholder="Nome:" name="nome">
            </div>
          </div>

          <div class="col-md-6">
            <label for="inputPassword4" class="form-label"></label>
            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-telephone-fill"></i></div>
              <input type="tel" class="form-control" id="telefone" placeholder="Tefefone:" name="telefone" value="<?=$listarUm['telefone']?>">
            </div>  
          </div>

          <div class="col-md-12">
            <label for="inputPassword4" class="form-label"></label> 
            <div class="input-group">
              <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-envelope-fill"></i></div>
              <input type="email" class="form-control" id="email" placeholder="E-mail:" value="<?=$dados['email']?>" name="email">
            </div>  
          </div>
          

              <h2 class="text-center">O que deseja doar?</h2>
           <section class="d-flex justify-content-between">
              <div class="form-check form-check-inline text-center">
                <input class="form-check-input" type="checkbox" id="roupas" name="roupas" value="1">
                <label class="form-check-label" for="roupas">Roupas</label>
              </div>

              <div class="form-check form-check-inline text-center">
                <input class="form-check-input" type="checkbox" id="cobertores" name="cobertores"  value="1">
                <label class="form-check-label" for="cobertores">Cobertores</label>
              </div>

              <div class="form-check form-check-inline text-center">
                <input class="form-check-input" type="checkbox" id="calcados" name="calcados" value="1">
                <label class="form-check-label" for="calcados">Calçados</label>
              </div>
           </section>

           
            <!-- Endereço  -->

           
            </div>  
          <h2 class="text-center mt-5">Endereço</h2>  
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label"></label>
            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-123"></i></div>
              <input type="text" class="form-control" id="cep" maxlength="10" placeholder="CEP: " name="cep" required>
              
            </div>
          </div>

          <div class="col-md-6">
            <label for="inputPassword4" class="form-label"></label> 
            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-geo-alt-fill"></i></div>
              <input type="text" class="form-control" id="endereco" placeholder="Endereço:" name="endereco">
            </div>  
          </div>
          
          <div class="col-md-6">
            <label for="inputAddress" class="form-label"></label>
            <div class="input-group">
              <div class="input-group-text bg-transparent"><i class="bi bi-123"></i></div>
              <input type="number" class="form-control" id="numero" placeholder="Número:" name="numero">
            </div>
          </div>

          <div class="col-md-6">
            <label for="inputAddress" class="form-label"></label>
            <div class="input-group ">
              <div class="input-group-text bg-transparent"><i class="bi bi-geo-alt-fill"></i></div>
              <input type="text" class="form-control" id="complemento" placeholder="Complemento:" name="complemento">
            </div>
          </div>

          <div class="col-md-6">
            <label for="inputAddress" class="form-label"></label>
            <div class="input-group ">
              <div class="input-group-text bg-transparent"><i class="bi bi-house-fill"></i></div>
              <input type="text" class="form-control" id="bairro" placeholder="Bairro:" name="bairro">
            </div>
          </div>

          <div class="col-md-6 ">
            <label for="inputCity" class="form-label"></label>
            <div class="input-group ">
              <div class="input-group-text bg-transparent"><i class="bi bi-house-door-fill"></i></div>
              <input type="text" class="form-control" id="cidade" placeholder="Cidade: " name="cidade">
            </div>
          </div>
      
          <a href="lgpd.php" class="politica" title="Página de Política de Privacidade">Política de Privacidade</a>
          
          <div class="col-12 mt-4 mb-4 text-end">
            <button name="enviar" type="submit" id="enviar" class="btn btn-primary">Enviar</button>
          </div>


      </form>
    </section>
    <script src="../js/jquery-3.6.0min.js"></script>
    <script src="../js/vanilla-masker.min.js"></script>
    <script src="../js/cep.js"></script>
    <?php require_once "../inc/rodape-admin.php"; ?>