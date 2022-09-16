<?php
require_once "../inc/cabecalho-admin.php";
?>
<article class="container p-5 my-4 rounded-3 bg-white shadow ">
    <div class="container-fluid py-1 ">        
        <h2 class="display-4 ">Olá, <?=$_SESSION['nome']?>!</h2>

        <?php if(isset($_GET['perfil-atualizado'])){?>
			<p class="my-2 alert alert-primary text-center">
				Dados atualizados com sucesso!
			</p>
        <?php } ?>

        <?php if(isset($_GET['doacao-enviada'])){?>
			<p class="my-2 alert alert-primary text-center">
				Doação enviada!
			</p>
        <?php } ?>
        <?php if(isset($_GET['cadastrado'])){?>
		    <p class="my-2 alert alert-warning text-center">
			    Cadastrado com sucesso!
		    </p>
        <?php } ?>

        <p class="fs-5">Você está no <b>painel de controle e administração</b> do
		site Calor Dado e seu <b>nível de acesso</b> é <span class="badge bg-dark"> <?=$_SESSION['tipo']?> </span>.</p>
        <div class="text-center ">
            <a class="btn  btn-lg" href="meu-perfil.php">
                <i class="bi bi-person"></i> <br>
                Meu perfil
            </a>
            <?php  if($_SESSION['tipo'] === 'usuario') {  ?>   
            <a class="btn btn-lg" href="../admin/querodoar-inserir.php?id=<?=$_SESSION['id']?>">
                <i class="bi bi-person"></i> <br>
                 Doar 
            </a>
            <a class="btn  btn-lg" href="minhas-doacoes.php?id=<?=$_SESSION['id']?>">
                <i class="bi bi-tags"></i> <br>
                Minhas doações
            </a>
            <?php } ?> 
            <?php  if($_SESSION['tipo'] === 'admin') {  ?>    
			<a class="btn  btn-lg" href="doacoes.php">
                <i class="bi bi-tags"></i> <br>
                Doações
            </a>
            <a class="btn btn-lg" href="usuarios.php">
                <i class="bi bi-people"></i> <br>
                Usuários
            </a>
            <a class="btn  btn-lg" href="cadastro.php">
                <i class="bi bi-people"></i> <br>
                Cadastros
            </a>  
            <?php } ?>                              
        </div>
    </div>
</article>
<?php require_once "../inc/rodape-admin.php"; ?>


