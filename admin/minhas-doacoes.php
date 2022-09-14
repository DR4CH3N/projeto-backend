<?php
use CalorDado\Doacao;
use CalorDado\Utilitarios;
require_once "../inc/cabecalho-admin.php";
$doacao = new Doacao;
$doacao->setUsuarioId($_GET['id']);
$dado = $doacao->listarUm();
?>
<div class="row container m-auto">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		<h2 class="text-center">
		Doações <span class="badge bg-dark"></span>
		</h2>	
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="table-dark">
					<tr>
						<th>Roupas</th>
						<th>Cobertores</th>
						<th>Calçados</th>
                        <th>Pix</th>
					</tr>
				</thead>
				<tbody>
					<tr>	
					</tr>
				</tbody>                
			</table>
		</div>
	</article>
</div>

