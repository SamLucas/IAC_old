<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Cadastro de Pesquisa</h4>
			</div>
		</div>

		<div class="white-box">
			<div class="row">
				
				<?php $caminho_form = base_url('Backend/Pesquisa/');?>
				<form action="<?php echo $artigos == null ? $caminho_form.'cadastrar':$caminho_form.'update' ?>"  method="post">
					<input type="hidden" name="id" value="<?php if($artigos != null) echo $artigos[0]['ldp_id']; ?>">
					<div class="form-group">
						<label for="titulo">Titulo:</label>
						<input type="text" class="form-control" id="titulo" aria-describedby="emailHelp" name="titulo" value="<?php if($artigos != null) echo $artigos[0]['ldp_titulo']; ?>">
					</div>
					<div class="form-group">
						<label for="Text">Texto:</label>
						<textarea name="descricao" id="descricao" cols="80" rows="80"><?php if($artigos != null) echo $artigos[0]['ldp_descricao']; ?></textarea>

					</div>
					<div class="form-group">
						<label for="professores">Professor participantes:</label>
						<input type="text" name="professores" id="professores" class="form-control" value="<?php if($artigos != null) echo $artigos[0]['ldp_professores']; ?>">
					</div>

					
					<button type="submit" class="btn btn-success btn-outline btn-rounded">Salvar</button>
					<a href="<?php echo base_url('Backend/Pesquisa'); ?>" class="btn-outline btn-rounded btn btn-danger" data-dismiss="modal">Cancelar</a>

				</form>
			</div>
		</div>
	</div>
</div>	
<script>
CKEDITOR.replace('descricao', {
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