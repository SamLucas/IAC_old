<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row bg-title">
			<div class="col-lg-10 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Papers - <?=substr($linha_nome,0,60)."..."; ?></h4>
			</div>
			<div class="col-lg-2 col-sm-8 col-md-8 col-xs-12">
				<a class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light btn-rounded btn-outline" data-toggle="modal" data-target="#cadastrar">
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
										<th>AUTOR</th>
										<th>ARQUIVO</th>
										<th>AÇÃO</th>
									</tr>
								</thead>
								<tbody>

									<?php if(isset($papers)): ?>
										<?php foreach($papers as $pap): ?>	
										<tr>
												
											<td><?=$pap->pap_nome ?></td>
											<td><?=$pap->pap_autor ?></td>
											<td><?=$pap->pap_arquivo ?></td>
											<td>
												<button class="btn btn-outline btn-rounded btn-danger"  data-toggle="modal" data-target="#deletar" data-nome="<?=$pap->pap_nome ?>" data-id="<?=$pap->pap_id ?>">Deletar</button>
												<button class="btn btn-outline btn-rounded btn-success" data-toggle="modal" data-target="#alterar" data-nome='<?=$pap->pap_nome ?>' data-descricao='<?=$pap->pap_descricao ?>' data-arquivo='<?=$pap->pap_arquivo?>' data-autor='<?=$pap->pap_autor ?>' data-id='<?=$pap->pap_id ?>'>Alterar</button>
											</td>
											<!-- <button class="btn btn-outline btn-rounded btn-info">asd</button> -->
										</tr>
										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
							<?php if($papers == NULL): ?>
								<p class="text-center">Nenhum paper cadastrado!</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>Cadastro de Papers</h4>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Backend/Papers/cadastro_papers');?>" method="post" id="cadastro" enctype="multipart/form-data">
					<input type="hidden" name="linha_nome" value="<?=$linha_nome?>">
					<input type="hidden" name="id_linha" value="<?=$id_linha?>">
					<div class="form-group">
						<label for="">Nome:</label>
						<input type="text" class="form-control" name="nome">
					</div>
					<div class="form-group">
						<label for="">Autor:</label>
						<input type="text" class="form-control" name="autor">
					</div>
					<div class="form-group">
						<label for="">Descrição:</label>
						<textarea style="height: 125px;" name="descricao" id="adicionar" class="form-control"  cols="30" rows="10"></textarea>
					</div>
					<div class="form-group">
						<label for="">Arquivo:</label>
						<input type="file" class="form-control" name="arquivo">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success btn-rounded btn-outline" onclick="document.forms['cadastro'].submit();">Adicionar</button>
				<button type="button" class="btn btn-danger btn-rounded btn-outline" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="alterar" tabindex="-1" role="dialog" aria-labelledby="alterar" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>Alteração de Papers</h4>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Backend/Papers/alterar_papers');?>" method="post" id="alterar" enctype="multipart/form-data">
					<input type="hidden" name="linha_nome" value="<?=$linha_nome?>">
					<input type="hidden" name="id_linha" value="<?=$id_linha?>">
					<input type="hidden" name="id_paper" id="id_paper_alt">
					<div class="form-group">
						<label for="">Nome:</label>
						<input type="text" class="form-control" name="nome" id="alt_nome">
					</div>
					<div class="form-group">
						<label for="">Autor:</label>
						<input type="text" class="form-control" name="autor" id="alt_autor">
					</div>
					<div class="form-group">
						<label for="">Descrição:</label>
						<textarea style="height: 125px;" name="descricao" id="alt_descricao" class="form-control"  cols="30" rows="10"></textarea>
					</div>
					<div class="form-group">
						<label for="">Arquivo: <i id="alt_arquivo"></i></label>
						<input type="file" class="form-control" name="arquivo">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success btn-rounded btn-outline" onclick="document.forms['alterar'].submit();">Alterar</button>
				<button type="button" class="btn btn-danger btn-rounded btn-outline" data-dismiss="modal">Cancelar</button>
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
				<p>Deseja deletar o paper "<i class="name_paper"></i>"?</p>
			</div>
			<div class="modal-footer">
				<form action="<?=base_url('Backend/Papers/deletar_paper')?>" method="post" id="form_deletar">
					<input type="hidden" name="id_paper" id="id_deletar">
					<input type="hidden" name="id_linha" value="<?=$id_linha?>">
					<input type="hidden" name="linha_nome" value="<?=$linha_nome?>">
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

	$('#alterar').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var id = button.data('id')
		var nome = button.data('nome') 
		var autor = button.data('autor')
		var descricao = button.data('descricao')
		var arquivo = button.data('arquivo')

		var modal = $(this)
		modal.find('.modal-body form input#alt_nome').val(nome)
		modal.find('.modal-body form input#alt_autor').val(autor)
		CKEDITOR.instances['alt_descricao'].setData(descricao)
		modal.find('.modal-body form label i#alt_arquivo').text(arquivo)
		modal.find('.modal-body form input#id_paper_alt').val(id)

	})

	CKEDITOR.replace('adicionar', {
		height: 250,
	toolbarGroups: [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'insert', groups: [ 'insert' ] }
		]
	});


CKEDITOR.replace('alt_descricao', {
height: 250,
toolbarGroups: [
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
	{ name: 'forms', groups: [ 'forms' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'paragraph' ] },
	{ name: 'links', groups: [ 'links' ] },
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	{ name: 'styles', groups: [ 'styles' ] },
	{ name: 'colors', groups: [ 'colors' ] },
	{ name: 'insert', groups: [ 'insert' ] }
	]
});
</script>

</script>