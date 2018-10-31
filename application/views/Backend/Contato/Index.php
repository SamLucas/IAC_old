<div id="page-wrapper">
	<div class="container-fluid">
		<div class="white-box" >
			<div class="row">	
				<div class="col-12 cabecalho-painel">
					<h4 class="">Contato</h4>
				</div><hr>

				<?php if(isset($mensagem)): ?>
					<div class="col-sm-12 alert alert-success" role="alert">
						<?php echo $mensagem; ?>
					</div>
				<?php endif; ?>

				<div class="col-sm-12">
					<form method="get" action="<?=base_url('Backend/Contato/update');?>">
						<?php foreach ($dados as $dad): ?>
							<div class="form-group">
								<label for="titulo">Titulo:</label>
								<input type="text" class="form-control" value="<?= $dad->perfil_titulo ?>" id="titulo" name="titulo">
							</div>
							<div class="form-group">
								<label for="Text">Texto:</label>
								<textarea cols="80" id="editor" name="mensagem" rows="20"><?= $dad->perfil_textocontato ?></textarea>
							</div>
							<div class="form-group">
								<label for="lates">Link do Grupo na plataforma lates:</label>
								<input type="text" class="form-control" id="late" value="<?= $dad->perfil_lates ?>" name="lates">
							</div>
						<?php endforeach; ?>
						<input type="submit" name="Salvar" value="Salvar" class=" btn btn-success btn-rounded btn-outline">	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	CKEDITOR.replace('editor', {
		heghit: 500,
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