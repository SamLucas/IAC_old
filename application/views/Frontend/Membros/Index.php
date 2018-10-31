<style>
.imagemmembro {width: 100%;}
.nometitle {padding: 20px;}
p {text-indent: 20px;}
.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
    color: #fff;
    background-color: var(--corpadrao);
}

a {
    color: rgba(0,0,0,0.4);
    text-decoration: none;
}
a:hover{
    color: rgba(0,0,0,0.6);
    text-decoration: none;
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
                <?php $cont = 0; foreach($membros as $mem): ?>
                    <li <?php if($cont == 0): ?>class="active" <?php endif; $cont++;?>>
                        <a href="#" data-target-id="mem-<?php echo $mem->mem_id; ?>">
                            <i class="fa fa-list-alt fa-fw"></i>
                            <?php echo $mem->mem_nome; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <?php foreach($membros as $mem): ?>
        <div class="col-md-9 admin-content" id="mem-<?php echo $mem->mem_id; ?>">
            <div class="row">
                <h4 class="nometitle"><?php echo $mem->mem_nome; ?></h4>
                <div class="col-md-5">
                    <img class="imagemmembro" src="<?php echo base_url('img/membros/').$mem->mem_foto;?>">
                </div>
                <div class="col-md-7">
                    <p class="textcorriculum">
                        <?php echo $mem->mem_descricao; ?>
                    </p>
                    <p class="corrilates">
                        <strong>
                            <a href="<?php echo $mem->mem_lattes; ?>">Link corriculum lates</a>
                        </strong>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<div class="container celular">
    <div class="panel-group" id="accordion">
        <?php foreach($membros as $mem): ?>
        <div class="panel panel-default">
            <div class="panel-heading" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?= $mem->mem_id;?>">
                <h4 class="panel-title text-center">
                    <a style="text-decoration: none;"><?= $mem->mem_nome;?></a>
                </h4>
            </div>
            <div id="<?=$mem->mem_id;?>" class="panel-collapse collapse out">
                <div class="panel-body" style="text-align: justify;">
                    <div class="col-md-5 col-sm-5"><img class="imagemmembro" src="<?php echo base_url('img/membros/').$mem->mem_foto?>"></div>
                    <div class="col-md-7 col-sm-7">
                        <p class="textcorriculum">
                            <?= $mem->mem_descricao;?>
                        </p>
                        <p><strong><a href="<?= $mem->mem_lattes;?>">Link corriculum lates</a></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>