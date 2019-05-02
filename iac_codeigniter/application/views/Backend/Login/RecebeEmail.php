<style>
.rec{margin-right: 20px;}    
</style>

<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Login</h4>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6 white-box " style="margin-top: 100px;">
            <div class="configdiv">

                <?php if(isset($mensagem)): ?>
                    <div class="<?= $type?>">
                        <strong><?= $title?></strong> <?= $mensagem; ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('Backend/Login/MandaCodigo');?>" method="post">
                    <h3>Recuperação de conta</h3>
                    <p>Podemos ajudá-lo a redefinir sua senha e informações de segurança. Primeiro, insira seu email de cadastrado siga as instruções a seguir.</p>
                    <div class="form-group" style="margin-top: 20px;">
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entre com o email do usuario">
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded btn-outline">Enviar</button>
                    <a href="<?=base_url("Backend/Login/Index")?>" class="pull-right">voltar</a>
                </form>
            </div>
        </div>  
    </div>
</div>

