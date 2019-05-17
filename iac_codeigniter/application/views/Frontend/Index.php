<style>
#myCarousel .nav a small
{
    display: block;
}
#myCarousel .nav
{
    background: #eee;
}
.nav-justified > li > a
{
    color: var(--corpadrao);
    border-radius: 0px;
}


.nav-pills>li[data-slide-to="0"].active a { background-color: #16a085; }
.nav-pills>li[data-slide-to="1"].active a { background-color: #e67e22; }
.nav-pills>li[data-slide-to="2"].active a { background-color: #2980b9; }
.nav-pills>li[data-slide-to="3"].active a { background-color: #8e44ad; }
.carousel-inner {border-bottom: 3px solid var(--corpadrao);}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-xs-12" style="margin-top: 10px;">
            <h4>Noticias</h4>
            <table class="table table-striped">
                <tbody>
                    <?php $cont = 0; foreach($noticias as $not): ?>
                    <?php if($not->not_ativo%2!=0): ?>
                        <?php $cont++; ?>
                        <tr onclick="window.location = '<?=base_url('Frontend/Noticias').'?id='.$not->not_id ?>'" style="cursor: pointer;">
                            <th> 
                                <h4><?=$not->not_titulo?></h4>
                                <?=$not->not_descri?>
                            </th>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php if($cont == 0): ?>
                <h5 class="text-center">Nenhuma noticia cadastrada.</h5>
            <?php endif; ?>
        </div>
        <div class="col-md-3 col-xs-12 sobrehome">
            <h4>Sobre nós</h4><hr>
            <p style="margin-top: 20px;margin-bottom: 20px;text-align: justify;text-indent: 20px;line-height: 1.8;">
                O Grupo de Pesquisas Informática Aplicada às Ciências (IAC) se formou em 2013 idealizado pelo Prof.
                Dr. José Antônio Dias Garcia que possuía o interesse de criar ferramentas e metodologias para
                computação e análise de dados oriundos das ciências agrárias. 
            </p>
            <a href="<?php echo site_url('index.php/Frontend/Contato'); ?>" class="btn btn-sm btn-success col-xs-12" style="margin-top: -2px;white: 100%;background: var(--corpadrao);border-color: var(--varpadrao);font-size: 14pt;">Saiba mais</a>
        </div>
    </div>
</div>


<!-- <div class="col-md-9 col-xs-12">	
<div id="myCarousel" class="carousel slide" data-ride="carousel" >
<div class="carousel-inner">
<div class="item imgslider active">
<img src="<?php echo base_url('img/slide/formatura.jpg') ?>" >
</div>
<div class="item imgslider">
<img src="<?php echo base_url('img/slide/corrida.jpg') ?>" >
</div>
<div class="item imgslider">
<img src="<?php echo base_url('img/slide/edital.jpg') ?>" >
</div>
<div class="item imgslider">
<img src="<?php echo base_url('img/slide/nossocafe.jpg') ?>" >
</div>
</div>
<ul class=" nav aux nav-pills nav-justified">
<li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">Formaturas EaD</a></li>
<li data-target="#myCarousel" data-slide-to="1"><a href="#">Corrida de Rua</small></a></li>
<li data-target="#myCarousel" data-slide-to="2"><a href="#">Editais Abertos</small></a></li>
<li data-target="#myCarousel" data-slide-to="3"><a href="#">Prazo Final 25/08</small></a></li>
</ul>
</div>
</div> -->
