
<?php 
$conf = array("name" => "formulario");
$Cadastro = base_url('Backend/Download/dados');
$update = base_url('Backend/Download/update');
$caminhofinal = isset($arquivos) ? $update:$Cadastro;
?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Cadastro de Download</h4>
			</div>	
		</div>
		<div class="white-box">
			<form action="<?=$caminhofinal?>" name="formulario" enctype="multipart/form-data" method="post">
				<input type="text" name="id" id="id" value="<?php echo $arquivos != NULL ? $arquivos[0]['dow_id']:''; ?>" style="display: none;">

				<div class="form-group">
					<label for="nome">Nome:</label>
					<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $arquivos != NULL ? $arquivos[0]['dow_identificacao']:''; ?>">

				</div>
				<div class="form-group">
					<label for="mensagem">Descricao:</label>
					<textarea name="mensagem" id="editor1" cols="80" rows="80">
						<?php echo $arquivos != NULL ? $arquivos[0]['dow_descricao']:''; ?>
					</textarea>
				</div>

				<div class="form-group row">
					<?php if($arquivos != NULL): ?>
						<p href="" class="m-l-5">Arquivo anexado: (<?php echo $arquivos != NULL ? $arquivos[0]['dow_nome']:''; ?>) para alterar, basta addicionar o novo arquivo abaixo.</p>
					<?php endif; ?>
					<input type="file" name="arquivo" class="form-control">
				</div>

				<input type="submit" class="btn btn-success btn-rounded btn-outline " value="Salvar">
				<a href="<?php echo base_url('Backend/Download/'); ?>" class="btn btn-danger m-l-10 btn-rounded btn-outline ">Candelar</a>
			</form>


			<script data-sample="1">
				CKEDITOR.replace( 'editor1', {
					
					height: 500
				} );
			</script>

		</div>
	</div>
</div>