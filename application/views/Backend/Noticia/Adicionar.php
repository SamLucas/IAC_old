<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Cadastro de Noticias</h4>
			</div>
		</div>

		<div class="white-box">
			<div class="row">
				
				<?php if($type != null): ?>
                <div class="col-sm-12 <?=$type?>">
                    <strong><?=$titulo?></strong> <?=$mensage?>
                </div>
                <?php endif; ?>

				<?php $caminho_form = base_url('Backend/Noticia/');?>
				<form action="<?php echo $noticias == null ? $caminho_form.'cadastrar':$caminho_form.'update' ?>"  method="post">
					<input type="hidden" name="id" value="<?php if($noticias != null) echo $noticias[0]['not_id']; ?>">
					<div class="form-group">
						<label for="titulo">Titulo:</label>
						<input type="text" class="form-control" id="titulo" aria-describedby="emailHelp" name="titulo" value="<?php if($noticias != null) echo $noticias[0]['not_titulo']; ?>">
					</div>
					<div class="form-group">
						<label for="titulo">Descricao:</label>
						<input type="text" class="form-control" id="descricao" aria-describedby="emailHelp" name="descricao" value="<?php if($noticias != null) echo $noticias[0]['not_descri']; ?>">
					</div>
					<div class="form-group">
						<label for="titulo">Autor:</label>
						<input type="text" class="form-control" id="autor" aria-describedby="emailHelp" name="autor" value="<?php if($noticias != null) echo $noticias[0]['not_autor']; ?>">
					</div>
					<div class="form-group">
						<label for="Text">Texto:</label>
						<textarea name="texto" id="texto" cols="80" rows="80"><?php if($noticias != null) echo $noticias[0]['not_texto'];?></textarea>
					</div>
					<button type="submit" class="btn btn-success btn-outline btn-rounded">Salvar</button>
					<a href="<?php echo base_url('Backend/Noticia/Index'); ?>" class="btn-outline btn-rounded btn btn-danger" data-dismiss="modal">Cancelar</a>

				</form>
			</div>
		</div>
	</div>
</div>	
<script>
CKEDITOR.replace('texto', {
	hight: 800,
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