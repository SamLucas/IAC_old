
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
				<?php $cont = 0; foreach($artigos as $art): ?>	
				<li <?php if($cont == 0): ?>class="active" <?php endif; $cont++;?>>
					<a href="#" data-target-id="pesq-<?= $art->ldp_id?>">
						<i class="fa fa-home fa-fw"></i>
						<?= $art->ldp_titulo?>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php foreach($artigos as $art): ?>	
		<div class="col-md-9 admin-content" id="pesq-<?= $art->ldp_id?>">
			<h1 style="text-align: center;margin-bottom: 20px"><?= $art->ldp_titulo?></h1>
			<p><?= $art->ldp_descricao?></p>
			<p>Professor participante: <?= $art->ldp_professores?></p><hr>
			
			<table>
				<tr>
					<th colspan="3">Papers</th>
				</tr>
				<tr class="yellow"> 
					<td class="width">Nome</td>
					<td class="adjacent">Autor</td>
					<td class="adjacent">Arquivo</td>
				</tr>
				<?php $cont = 0;for($k=0;$k<sizeof($papers);$k++):
					if($papers[$k]['ldp_id'] == $art->ldp_id): 
						$cont++;?>
						<tr>
							<td><?=$papers[$k]['pap_nome'];?></td>
							<td><?=$papers[$k]['pap_autor'];?></td>
							<td><a href="<?=base_url("./upload/papers/").$art->ldp_id?>/<?=$papers[$k]['pap_arquivo'];?>" download><?=$papers[$k]['pap_arquivo'];?></a></td>
						</tr>
					<?php endif; ?>
				<?php endfor; ?>
			</table>
			<?php if($cont == 0): ?>
				<p class="text-center" style="margin-top: 10px;font-size: 10px;">Nenhum paper cadastrado!</p>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="container celular">
	<div class="panel-group" id="accordion">
		<?php foreach($artigos as $art): ?>	
		<div class="panel panel-default">
			<div class="panel-heading" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?= $art->ldp_id?>">
				<h4 class="panel-title text-center">
					<a style="text-decoration: none;"><?= $art->ldp_titulo?></a>
				</h4>
			</div>
			<div id="<?= $art->ldp_id?>" class="panel-collapse collapse out">
				<div class="panel-body" style="text-align: justify;">
					<p><?= $art->ldp_descricao?></p>
					<p>Professor participante: <?= $art->ldp_professores?></p><hr>
					<table>
						<tr>
					<th colspan="3">Papers</th>
				</tr>
				<tr class="yellow"> 
					<td class="width">Nome</td>
					<td class="adjacent">Autor</td>
					<td class="adjacent">Arquivo</td>
				</tr>
				<?php $cont = 0;for($k=0;$k<sizeof($papers);$k++):
					if($papers[$k]['ldp_id'] == $art->ldp_id): 
						$cont++;?>
						<tr>
							<td><?=$papers[$k]['pap_nome'];?></td>
							<td><?=$papers[$k]['pap_autor'];?></td>
							<td><a href="<?=base_url("./upload/papers/").$art->ldp_id?>/<?=$papers[$k]['pap_arquivo'];?>" download><?=$papers[$k]['pap_arquivo'];?></a></td>
						</tr>
					<?php endif; ?>
				<?php endfor; ?>
			</table>
			<?php if($cont == 0): ?>
				<p class="text-center" style="margin-top: 10px;font-size: 10px;">Nenhum paper cadastrado!</p>
			<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>