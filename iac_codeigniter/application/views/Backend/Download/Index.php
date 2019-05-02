<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row bg-title">
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-8">
				<h4 class="page-title">Download</h4>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
				<a href="<?php echo base_url('Backend/Download/cadastra') ?>" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">
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
								<div class="<?=$type?>">
									<strong><?=$titulo?></strong> <?=$mensagem?>
								</div>
							<?php endif; ?>

							<table class="table ">
								<thead>
									<tr>
										<th>NOME</th>
										<th>TAMANHO</th>
										<th>TIPO</th>
										<th width="160px;">AÇÃO</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if($arquivos)
											foreach ($arquivos as $arq):
									?>

									<tr>
										<td class="txt-oflo"><?= $arq->dow_identificacao ?></td>
										<td class="txt-oflo"><?= $arq->dow_tamanho ?> Mb</td>
										<td class="txt-oflo"><?= $arq->dow_tipo ?></td>
										<td>
											<a href="<?= base_url('Backend/Download/busca');?>?id=<?= $arq->dow_id ?>" class="btn btn-success btn-rounded btn-outline" title="Editar"><i class="fa fa-edit"></i></a>
											<button class="btn btn-danger btn-rounded btn-outline" data-toggle="modal" data-target="#deletar" data-id="<?= $arq->dow_id ?>" data-nome='<?= $arq->dow_identificacao ?>' title="Deletar cadastro"><i class="fa fa-trash"></i></button>
										</td>
									</tr>

									<?php endforeach; ?>
								</tbody>
							</table>
							<?php if(!$arquivos) echo "<br><p class='text-center'>Nenhum arquivo cadastrado</p>"; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<div class="modal fade" id="deletar" tabindex="-1" role="dialog" aria-labelledby="deletar" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>Deletar</h4>
			</div>
			<div class="modal-body">
				<p>Deseja deletar o item "<i class="name_paper"></i>"?</p>
			</div>
			<div class="modal-footer">

				<form id="form_deletar" action="<?php echo base_url('Backend/Download/deletar');?>" method="post">
					<input type="hidden" name="id" id="id_deletar">
				</form>
				<button class="btn btn-danger btn-rounded btn-outline" onclick="document.forms['form_deletar'].submit();">Deletar</button>
				<button type="button" class="btn btn-info btn-rounded btn-outline" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#deletar').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var nome = button.data('nome') 
		var id = button.data('id')

		var modal = $(this)
		modal.find('.modal-body p i').text(nome)
		modal.find('.modal-footer form input#id_deletar').val(id)

	})
</script>