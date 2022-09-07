<?php
use CalorDado\Cadastro;
use CalorDado\Usuario;
use CalorDado\Utilitarios;
require_once "../inc/cabecalho-admin.php";
$cadastro = new Cadastro;
$listaDeCadastro = $cadastro->listarUsuario();
$sessao->verfificaAcessoAdmin();
?>
<div class="row container-fluid m-auto">
	<article class="col-12 bg-white rounded  my-1 py-4">
		
		<h2 class="text-center">
		Cadastros <span class="badge bg-dark"><?=count($listaDeCadastro)?></span>
		</h2>

		
				
		<div class="table-responsive">
		
			<table class="table table-hover text-center">
				<thead class="table-dark">
					<tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Telefone</th>
                        <th>Endereço</th>
                        <th>Cep</th>
                        <th>Cidade</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Bairro</th>
						
					</tr>
				</thead>

				<tbody>
<?php foreach($listaDeCadastro as $usuario){?>
					<tr>
						<td> <?=$usuario['nome']?> </td>
						<td> <?=$usuario['email']?> </td>
						<td> <?=$usuario['telefone']?> </td>
                        <td> <?=$usuario['endereco']?> </td>
                        <td> <?=$usuario['cep']?> </td>
                        <td> <?=$usuario['cidade']?> </td>
                        <td> <?=$usuario['numero']?> </td>
                        <td> <?=$usuario['complemento']?></td>
                        <td> <?=$usuario['bairro']?> </td>
				
					</tr>
<?php } ?>
				</tbody>                
			</table>
	</div>
		
	</article>
</div>

