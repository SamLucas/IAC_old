<!DOCTYPE html>
<html lang="en">

<?php $caminho = base_url('conf/Backend'); ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?=base_url('img/icones/icon.png'); ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <script src="<?=base_url('conf/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?=base_url('conf/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css'); ?>"></script>

    <link href="<?= $caminho ?>/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    
    <script src="<?=base_url('conf/ckeditor/samples/js/sample.js'); ?>"></script>
    
    <title><?=$title?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('conf/Backend/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?=base_url('conf/Backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css'); ?>" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?=base_url('conf/Backend/plugins/bower_components/toast-master/css/jquery.toast.css'); ?>" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?=base_url('conf/Backend/plugins/bower_components/morrisjs/morris.css'); ?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?=base_url('conf/Backend/css/animate.css'); ?>" rel="stylesheet">
    <link href="<?=base_url('conf/font-awesome-4.7.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('conf/Backend/css/style.css'); ?>" rel="stylesheet">
    
    <link href="<?=base_url('conf/Backend/css/my_css_back.css'); ?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=base_url('conf/Backend/css/colors/green-dark.css'); ?>" id="theme" rel="stylesheet">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" href="<?=base_url('Backend/Home'); ?>">
                        <b>
                            <img src="<?=base_url('conf/Backend/plugins/images/pixeladmin-logo.png'); ?>" alt="home" />
                        </b>
                        <span class="hidden-xs">
                            <img src="<?=base_url('conf/Backend/plugins/images/pixeladmin-text.png'); ?>" alt="home" />
                        </span>
                    </a>
                </div>
                <?php if(isset($this->session->logado)): ?>
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                            <a href="#" class="profile-pic dropdown-toggle" data-toggle="dropdown">
                                <b class="">Bem vindo!</b> 
                                <span class="caret"></span>
                            </a>             
                            <ul class="dropdown-menu pull-left" role="menu">
                                <li><a href="<?=base_url(''); ?>">Site</a></li>
                                <li><a href="<?=base_url('Backend/Perfil'); ?>">Perfil</a></li>
                                <li class="divider"></li>
                                <li><a href="<?=base_url('Backend/Login/Logout'); ?>">Sair</a></li>
                            </ul>        
                        </li>
                    </ul>
                <?php endif; ?>
                </div>
            </nav>
        </div>


        <div id="wrapper">
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                    <ul class="nav" id="side-menu">
                        <?php if(isset($this->session->logado)): ?>
                            <style>.hide-menu{margin-left:10px; }</style>
                            <li>
                                <a href="<?=base_url('Backend/Index'); ?>" class="waves-effect">
                                    <i class="fa fa-tachometer fa-fw" aria-hidden="true"></i> 
                                    <span class="hide-menu">Painel</span></a>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('Backend/Download'); ?>" class="waves-effect">
                                    <i class="fa fa-download fa-fw" aria-hidden="true"></i> 
                                    <span class="hide-menu">Downloads</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('Backend/Pesquisa'); ?>" class="waves-effect">
                                    <i class="fa fa-search fa-fw" aria-hidden="true"></i> 
                                    <span class="hide-menu">Linha De Pesquisa</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('Backend/Membros'); ?>" class="waves-effect">
                                    <i class="fa fa-users fa-fw" aria-hidden="true"></i> 
                                    <span class="hide-menu">Membros</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('Backend/Noticia'); ?>" class="waves-effect">
                                    <i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i> 
                                    <span class="hide-menu">Noticias</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('Index'); ?>" target="_blank" class="waves-effect">
                                    <i class="fa fa-chrome fa-fw" aria-hidden="true"></i> 
                                    <span class="hide-menu">Site</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>