<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row bg-title">
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-8">
				<h4 class="page-title">Membros</h4>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
				<a href="" data-toggle="modal" data-target="#modal-cadastrar" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">
					Adicionar
				</a>
			</div>
		</div>
		<div class="white-box">
			<div class="row">
				<div class="col-sm-12 table-responsive">
					
					<?php if(isset($type)): ?>
						<div class="col-sm-12 <?=$type?>">
							<strong><?=$titulo?></strong> <?=$mensage?>
						</div>
					<?php endif; ?>

					<table class="table">
						<thead>
							<tr>
								<th>NOME</th>
								<th>LATTES</th>
								<th>AÇÃO</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($cadastros as $mem): ?>
								<tr>
									<td class="txt-oflo"><?=character_limiter($mem->mem_nome, 30); ?></td>
									<td class="txt-oflo"><a href="<?php echo $mem->mem_lattes; ?>"><?=character_limiter($mem->mem_lattes, 10); ?></a></td>
									<td>
										
										<button class="btn btn-primary btn-outline btn-rounded" data-toggle="modal" data-target="<?php echo '#'.$mem->mem_id; ?>" title="visualizar"><i class="fa fa-eye"></i></button>
										<button class="btn btn-success btn-outline btn-rounded" data-toggle="modal" data-target="#modalalterar" data-id='<?=$mem->mem_id; ?>' data-nome='<?=$mem->mem_nome; ?>' data-descricao='<?=$mem->mem_descricao?>' data-lattes='<?=$mem->mem_lattes; ?>' data-foto='<?=$mem->mem_foto?>'  title="Editar"><i class="fa fa-edit"></i></button>
										<button class="btn btn-danger btn-outline btn-rounded"  data-toggle="modal" data-target="#modalexcluir" data-id='<?=$mem->mem_id; ?>' data-nome='<?=$mem->mem_nome; ?>'  title="Deletar cadastro"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<?php if($cadastros == null): ?>
						<p class="text-center" style="margin-top: 30px;">Nenhum membro cadastrado.</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>	

<div class="modal fade " id="modal-cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Adicionar Membros</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">

					<form action="<?= base_url('Backend/Membros/cadastrar') ?>" enctype="multipart/form-data" method="post" id="cadastrar">
						<div class="form-group">
							<label for="name">Nome:</label>
							<input type="text" class="form-control" id="nome" name="nome">
						</div>
						<div class="form-group">
							<label for="Text">Texto:</label>
							<textarea name="descricao" id="adicionar" cols="80" rows="20"></textarea>
						</div>
						<div class="form-group">
							<label for="foto">Selecione uma foto:</label>
							<input type="file" name="foto" id="foto">
						</div>
						<div class="form-group">
							<label for="lates">Link corriculum lates:</label>
							<input type="text" class="form-control" id="lates" name="lattes">
						</div>

					</form>
				</div>
			</div>	
			<div class="modal-footer">
				<button type="submit" class="btn btn-success btn-outline btn-rounded" onclick="document.forms['cadastrar'].submit();">Salvar</button>
				<button type="button" class="btn btn-danger btn-outline btn-rounded" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade " id="modalalterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Ateraração de dados</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">

					<form action="<?= base_url('Backend/Membros/alterar') ?>" enctype="multipart/form-data" method="post" name="alterar">
						<div class="form-group">
							<label for="name">Nome:</label>
							<input type="text" class="form-control" id="nome" name="nome">
						</div>
						<div class="form-group">
							<label for="Text">Texto:</label>
							<textarea name="descricao_alt" class="ckeditor" id="descricao_alt" cols="80" rows="20"></textarea>
						</div>
						<div class="form-group">
							<label class="" for="">Foto atual: <strong id="alt_foto"></strong></label>
							<div class="input-group">
								<a class="btn btn-danger input-group-addon" onclick="tirafoto()" title="Remover foto">
									<i style="color: white;" class="fa fa-trash"></i>
								</a>
								<input class="form-control" type="file" name="foto" id="foto">
							</div>
						</div>
						<div class="input-group" id="foto-altera">
							
							

							
							
						</div>
						<div class="form-group">
							<label for="lates">Link corriculum lates:</label>
							<input type="text" class="form-control" id="lattes" name="lattes">
						</div>
						
						<input type="hidden" name="muda_foto" id="muda_foto">
						<input type="hidden" name="id" id="id">

					</form>
				</div>
			</div>	
			<div class="modal-footer">
				<button type="submit" class="btn btn-success btn-outline btn-rounded" onclick="document.forms['alterar'].submit();">Salvar</button>
				<button type="button" class="btn btn-danger btn-outline btn-rounded" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="exampleModalLabel">Excluir Membro</h5>
			</div>
			<div class="modal-body">
				<p>Deseja excluir o membro: "<aa id="campo-nome-excluir"></aa>" ?</p>
				<form action="<?= base_url('Backend/Membros/deletar');?>" method="post" id="comfirmar_exclusao">
					<input type="hidden" name="id">
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger btn-outline btn-rounded" onclick="document.forms['comfirmar_exclusao'].submit();">Excluir</button>
				<button type="button" class="btn btn-success btn-outline btn-rounded" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<?php foreach($cadastros as $mem): ?>
	<div class="modal fade " id="<?= $mem->mem_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="exampleModalLabel"><?= $mem->mem_nome; ?></h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-4">
								<img class="imagemmembro" style="width: 100%" src="<?php echo base_url('img/membros/').$mem->mem_foto;?>">
							</div>
							<div class="col-sm-8">
								<div><?= $mem->mem_descricao; ?></div>
								<div><?= $mem->mem_lattes;?></div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
<?php endforeach; ?>


<script>

	CKEDITOR.replace('adicionar', {
		height: 300,
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

	$('#modalexcluir').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var nome = button.data('nome') 
		var id = button.data('id')

		var modal = $(this)
		modal.find('.modal-body #campo-nome-excluir').text(nome)
		modal.find('.modal-body form input').val(id)

	})

	function tirafoto(){
		var variavel = "1"
		document.getElementById('alt_foto').innerHTML = "Sem Foto";
		document.getElementById('muda_foto').value = variavel
	}

	$('#modalalterar').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var descricao = button.data('descricao')
		var lattes = button.data('lattes')
		var nome = button.data('nome') 
		var id = button.data('id')
		var descricao = button.data('descricao')
		var foto = button.data('foto')

		var modal = $(this)  
		modal.find('.modal-body form input#id').val(id)
		modal.find('.modal-body form input#nome').val(nome)
		modal.find('.modal-body form input#lattes').val(lattes)
		document.getElementById('alt_foto').innerHTML = foto;
		modal.find('.modal-body form label strong').innerHTML = "sadsd"
		CKEDITOR.instances['descricao_alt'].setData(descricao)
	})


</script>


<!-- <div id="page-wrapper">
	<div class="container-fluid">
		<input type="button" onclick="carrega_text_area('Olas')" value="Olas">
		<input type="button" onclick="carrega_text_area('asdkal')" value="asdkal">
		<div>
			<textarea class="ckeditor" id="texto" name="texto" ></textarea> 
		</div> 
	</div>
</div>
<script>
	var txt_pre_definido='Qualquer coisa que você quera colocar';
	function carrega_text_area﻿(texto){
		// var texto = "Olasdasdas";
		// alert(CKEDITOR.instances['texto'].getData());
		CKEDITOR.instances['texto'].setData(texto);
	}
</script> --> 