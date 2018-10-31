<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Linhas de Pesquisa</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<a href="<?php echo base_url('Backend/Pesquisa/adicionar'); ?>" class="btn btn-success pull-right m-l-20 c btn-outline btn-rounded hidden-xs hidden-sm waves-effect waves-light">
					Adicionar
				</a>
			</div>
		</div>
		<div class="white-box">
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<div class="table-responsive">

							<?php if(isset($type)): ?>
								<div class="col-sm-12 <?=$type?>">
									<strong><?=$titulo?></strong> <?=$mensagem?>
								</div>
							<?php endif; ?>

							<table class="table ">
								<thead>
									<tr>
										<th>NOME</th>
										<th>PROFESSORES</th>
										<th>AÇÃO</th>
									</tr>
								</thead>
								<tbody>

									<?php foreach($artigos as $art): ?>
										<tr>
											<td class="txt-oflo"><?= substr($art->ldp_titulo, 0, 30).'...'; ?></td>
											<td class="txt-oflo"><?= substr($art->ldp_professores, 0, 30).'...';?></td>
											<td>
												<a href="<?=base_url('Backend/Papers')?>/index/?id=<?=$art->ldp_id?>&nome=<?=$art->ldp_titulo?>" class="btn btn-primary btn-outline btn-rounded">Papers</a>
												<button class="btn btn-primary btn-outline btn-rounded" data-toggle="modal" data-target="<?php echo '#'.$art->ldp_id; ?>">
												Visualizar</button>
												<a class="btn btn-success btn-outline btn-rounded" href="<?php echo base_url('Backend/Pesquisa/alterar/') ?>?id=<?php echo $art->ldp_id ?>">Alterar</a>
												<a class="btn btn-danger btn-outline btn-rounded" data-toggle="modal" data-target="#modalexcluir" data-id="<?php echo $art->ldp_id; ?>" data-nome='<?php echo $art->ldp_titulo; ?>' >Excluir</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<?php foreach($artigos as $art): ?>
	<div class="modal fade " id="<?= $art->ldp_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="exampleModalLabel">Visualização do artigo</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid text-center">
						<h4><?= $art->ldp_titulo;?></h4>
						<div><?= $art->ldp_descricao; ?></div>
						<div>Porfessores: <?= $art->ldp_professores; ?></div>

						<table class="table" style="margin-top: 20px;">
							<thead>
								<tr style="border-bottom: 0.5px solid gray;">
									<td>NOME</td>
									<td>AUTOR</td>
									<td>ARQUIVO</td>
								</tr>
							</thead>
							<tbody>
								<?php $cont = 0;for($k=0;$k<sizeof($papers);$k++):
								if($papers[$k]['ldp_id'] == $art->ldp_id): 
									$cont++;?>
									<tr>
										<td><?=$papers[$k]['pap_nome'];?></td>
										<td><?=$papers[$k]['pap_autor'];?></td>
										<td><?=$papers[$k]['pap_arquivo'];?></td>
									</tr>
								<?php endif; ?>
							<?php endfor; ?>
						</tbody>
					</table>

					<?php if($cont == 0): ?>
						<p>Nenhum Paper adicionado!</p>
					<?php endif; ?>
				</div>
			</div>	
		</div>
	</div>
</div>
<?php endforeach; ?>

<div class="modal fade" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="exampleModalLabel">Deseja Excluir a pesquisa:</h5>
			</div>
			<div class="modal-body">
				<p>Atenção ao remover a pesquisa, os papers cadastrados serão deletados. Deseja remover a pesquisa: "<aa id="campo-nome-excluir"></aa>" ?</p>
				<form action="<?= base_url('Backend/Pesquisa/deletar');?>" method="post" id="comfirmar_exclusao">
					<input type="hidden" name="id">
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger  btn-outline btn-rounded" onclick="document.forms['comfirmar_exclusao'].submit();">Excluir</button>
				<button type="button" class="btn btn-success btn-outline btn-rounded" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#modalexcluir').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var nome = button.data('nome') 
		var id = button.data('id')

		var modal = $(this)
		modal.find('.modal-body #campo-nome-excluir').text(nome)
		modal.find('.modal-body form input').val(id)

	})
</script>