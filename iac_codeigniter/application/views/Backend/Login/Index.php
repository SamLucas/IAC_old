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
                <form action="<?= base_url('Backend/Login/verificar');?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email do Usuario</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entre com o nome do usuario">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded btn-outline">Enviar</button>
                    <div class="pull-right">
                        <a href="<?= base_url('Backend/Login/altsenha');?>" class="rec">Esqueceu sua senha?</a>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>

