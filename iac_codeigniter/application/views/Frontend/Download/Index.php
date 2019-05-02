
<style>
p {text-indent: 20px;}
.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
	color: #fff;
	background-color: var(--corpadrao);
}
a, a:hover	{
	color: rgba(0,0,0,0.6);
}
.corrilates a {color: var(--corpadrao)}
.corrilates {text-indent: 0;}
.pc{height: 600px;}
.admin-content {
	border-left: 1px solid var(--corpadrao);
	padding-left: 30px;
}
</style>


<div class="container computador">
	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked admin-menu">
				<?php $cont = 0; foreach($download as $dow): ?>	
				<li <?php if($cont == 0): ?>class="active" <?php endif; $cont++;?>>
					<a href="#" data-target-id="downloads-<?= $dow->dow_id?>">
						<i class="fa fa-home fa-fw"></i>
						<?= $dow->dow_identificacao?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<?php foreach($download as $dow): ?>	
		<div class="col-md-9 admin-content" id="downloads-<?= $dow->dow_id?>">
			<h1 style="text-align: center;margin-bottom: 20px"><?= $dow->dow_identificacao?></h1>
			<p><?= $dow->dow_descricao?></p>
			<?php if($cont == 0): ?>
				<p class="text-center" style="margin-top: 10px;font-size: 10px;">Nenhum arquivo cadastrado!</p>
			<?php endif; ?>
			<a href="<?=base_url("upload/download/").$dow->dow_nome?>" class="btn btn-lg btn-success" style="margin: 50px 35%;" download>
				<span class="glyphicon glyphicon-cloud-download"></span> Download do arquivo
			</a>
		</div>
	<?php endforeach; ?>
</div>
</div>

<div class="container celular">
	<div class="panel-group" id="accordion">
		<?php foreach($download as $dow): ?>	
			<div class="panel panel-default">
				<div class="panel-heading" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?=$dow->dow_id?>">
					<h4 class="panel-title text-center">
						<a style="text-decoration: none;"><?=$dow->dow_identificacao?></a>
					</h4>
				</div>
				<div id="<?=$dow->dow_id?>" class="panel-collapse collapse out">
					<div class="panel-body" style="text-align: justify;">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<?= $dow->dow_descricao?>
									<a href="<?=base_url("upload/download/").$dow->dow_nome?>" class="btn btn-lg btn-success" style="margin: 50px 35%;" download>
				<span class="glyphicon glyphicon-cloud-download"></span> Download do arquivo
			</a>
								</div>
							</div>
						</div>
						<?php if($cont == 0): ?>
							<p class="text-center" style="margin-top: 10px;font-size: 10px;">Nenhum arquivo cadastrado!</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>