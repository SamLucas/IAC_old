<!DOCTYPE html>
<html lang="pt-br">
<head>

	
	<meta charset="utf-8">
	<title><?= $title; ?></title>
	<link rel="icon" href="<?= base_url('img/icones/icon.png'); ?>" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="stylesheet" href="<?= base_url('conf/Frontend/css/mycss.css');?>">
	<link rel="stylesheet" href="<?= base_url('conf/Frontend/css/modalis.css');?>">
	<link rel="stylesheet" href="<?= base_url('conf/Frontend/css/media_query.css');?>">
	<link rel="stylesheet" href="<?= base_url('conf/Frontend/css/bootstrap.min.css');?>">

	<style>

	* {
		margin: 0;
		padding: 0;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	.navbar {background-color: var(--corpadrao);}
	.mudacor li  a{color: red;}


	/*scroll bar*/
	::-webkit-scrollbar-track {background-color: #F4F4F4;}
	::-webkit-scrollbar {width: 6px;background: #F4F4F4;}
	::-webkit-scrollbar-thumb {background: var(--corpadrao)/*//#d6e9c6*/;}

	.dropdown>a>.glyphicon, .modal-body a {color: var(--corpadrao);}

</style>

<script src="<?= base_url('conf/Frontend/js/material.min.js');?>"></script>
<script src="<?= base_url('conf/Frontend/js/jquery-1.11.1.min.js');?>"></script>
<script src="<?= base_url('conf/Frontend/js/boot.min.js');?>"></script>

</head>
<body style="background: url('<?=site_url('/img/bacgroud/map.png')?>'); background-repeat: no-repeat;background-attachment: fixed;">
	<header>
		
		<!-- <div class="container">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span></a>
					<ul class="dropdown-menu menulang">
						<li>
							<a href="">
								<span class="bra"></span>
								<span class="pais">Português</span>
								<span id="ps" class="ps glyphicon glyphicon-pushpin active" style="float: right"></span>
							</a>
						</li>
						<li>
							<a href="">
								<span class="es"></span>
								<span class="pais">Espanhol</span>
								<span class="ps glyphicon glyphicon-pushpin" style="float: right"></span>
							</a>
						</li>
						<li>
							<a href="">
								<span class="eua"></span>
								<span class="pais">Inglês</span>	
								<span class="ps glyphicon glyphicon-pushpin" style="float: right"></span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
 -->
		<div class="container">
			<div class="row">
				<div class="col-md-2 computador"><center><img height="200px" style="padding:20px;" src="<?= base_url('img/icones/topo2.png');?>" alt=""></center ></div>
				<div class="col-md-10 txtgrupo celular titulo"><center>Grupo de Pesquisa <br> Informática Aplicada às Ciências (IAC)</center></div>
				<div class="col-md-10 txtgrupo computador">
					<center  class="titulo" style="margin-bottom: -50px;">Grupo de Pesquisa</center>
				 	<center  class="titulo">Informática Aplicada às Ciências (IAC)</center>
				 </div>
			</div>
		</div>
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<!-- Para maiores informações, clique aqui -> -->
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>    
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-left mudacor">
						<li><a href="<?= base_url(''); ?>" style="color: white; font-size: 14pt;" >Inicio</a></li>
						<li><a href="<?= base_url('Frontend/Linha'); ?>" style="color: white; font-size: 14pt;"  >Linhas de Pesquisa</a></li>
						<li><a href="<?= base_url('Frontend/Membros'); ?>" style="color: white; font-size: 14pt;"  >Membros</a></li>
						<li><a href="<?= base_url('Frontend/Download'); ?>" style="color: white; font-size: 14pt;" >Ferramentas</a></li>
						<li><a href="<?= base_url('Frontend/Contato'); ?>" style="color: white; font-size: 14pt;"  >Contato</a></li>
						<!-- <li><a href="<?= base_url('Frontend/forum'); ?>" style="color: white;"  >Forum</a></li> -->
					</ul>
				</div>
			</nav>
		</div>
	</header>