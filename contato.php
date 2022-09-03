<?php require_once "./inc/cabecalho.php"; ?>
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
    <form action="https://formspree.io/f/mnqwrraj" method="post" class="contatenos form-control">    
                    
      <h2 class="text-center">Contate-nos</h2>     
      
      <div class="pb-2">
        <label for="inputPassword4" class="form-label"></label> 
        <div class="input-group">
          <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-person-fill"></i></div>
          <input type="nome" class="form-control" id="inputPassword4" placeholder="Nome:" name="nome">
        </div>  
      </div>
      
      <div class="my-2">
        <label for="inputPassword4" class="form-label"></label> 
        <div class="input-group">
          <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-envelope-fill"></i></div>
          <input type="email" class="form-control" id="inputPassword4" placeholder="E-mail:" name="E-mail">
        </div>  
      </div>
      
      <div class="my-2">
        <label for="inputPassword4" class="form-label"></label> 
        <div class="input-group">
          <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-telephone-fill"></i></div>
          <input type="tel" class="form-control" id="inputPassword4" placeholder="Telefone:" name="telefone">
        </div>  
      </div>
      <div class="my-2 mb-3">
        <label for="inputPassword4" class="form-label"></label> 
        <div class="input-group">
          <div class="input-group-text bg-transparent aleatorio"><i class="bi bi-envelope-paper-fill"></i></div>
         <textarea  placeholder="Digite aqui sua menssagem:" name="mensagem" id="mensagem" rows="3" class="form-control"></textarea>
        </div>  
      </div>
    
      <div class="pb-2">
        <p><a href="lgpd.php" class="politica" title="Página de Política de Privacidade">Política de Privacidade</a></p>
        <div class="text-end">
          <button type="submit" class="btn btn-primary text-center" title="enviar formulário de contato">Enviar</button>
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