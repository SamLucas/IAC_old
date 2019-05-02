<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Mensagens</h4>
			</div>
		</div>

		<div class="white-box">
			<div class="row">
				
				<div>
					<p><strong>Assunto:</strong> <?= $mensagem[0]['con_assunto']?></p>
					<p><strong>Nome:</strong> <?= $mensagem[0]['con_nome']?></p>
					<p><strong>Email:</strong> <?= $mensagem[0]['con_email']?></p>
					<div style="padding: 20px;border: solid 0.2px silver;margin-bottom: 20px;">
						<i><?= $mensagem[0]['con_mensagem']?>		</i>
					</div>
				</div>

				<form action="<?=base_url('Backend/Contato/resposta') ?>" method="post" class="form">
					<div class="form-group">
						<input type="hidden" name="email" value="<?= $mensagem[0]['con_email']?>">
						<textarea name="resposta" id="editor" cols="30" rows="10"></textarea>
					</div>
					<button type="submit" class="btn btn-success btn-outline btn-rounded">Enviar</button>
				</form>

			</div>
		</div>
	</div>	

	<script>
		CKEDITOR.replace('editor', {
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
