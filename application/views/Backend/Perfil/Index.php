<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Perfil do Administrador</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(isset($type)): ?>
                        <div class="col-sm-12" style="margin-bottom: 10px;">
                            <div class="<?=$type ?>">
                                <strong><?=$title ?></strong>
                                <i><?=$memsage ?></i>
                            </div>
                        </div> 
                    <?php endif; ?>

                </div>


                <div class="col-md-6 col-xs-6">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                <h4 class="title">Alteração de dados</h4><hr>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">Nome Completo</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $this->session->nome; ?>" name="nome" id="nomeantigo" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="email" class="form-control form-control-line" id="emailantigo" value="<?= $this->session->email; ?>" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button  class="btn btn-outline btn-rounded btn-success pull-right" data-toggle="modal" data-target="#modal-dados">Alterar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                <h4 class="title">Alteração de senha</h4><hr>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-horizontal form-material">

                                    <div class="form-group">

                                        <label class="col-md-12">Nova senha</label>
                                        <div class="col-md-12">
                                            <input type="password" name="senha1" id="senha" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Confirme sua senha</label>
                                        <div class="col-md-11">
                                            <input type="password" name="senha2" id="conf_senha" onkeyup="verifica()" autocomplete="off" class="form-control form-control-line">
                                        </div>
                                        <div class="col-md-1">
                                            <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button data-toggle="modal" data-target="#modal-senha"  class="btn btn-outline btn-rounded btn-success pull-right" disabled="true" id="btnalterar">Alterar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Confirmação de Alteração</h4>
            </div>
            <div class="modal-body">
                <form name="formaltsenha" method="post" action="<?=base_url('Backend/Perfil/senha') ?>" class="form-horizontal">
                    <p for="">Digite sua senha atual para confirmar a alteração.</p>
                    <input type="hidden" name="senha1" id="senhamodal">
                    <div class="form-group">

                        <div class="col-md-12">
                            <input type="password" name="senhaatual" autocomplete="off" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-outline btn-rounded" onclick="document.formaltsenha.submit();">Alterar</button>
                <button type="button" class="btn btn-danger btn-outline btn-rounded" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-dados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Confirmação de Alteração</h4>
            </div>
            <div class="modal-body">
                <form name="formaltdados" action="<?=base_url('Backend/Perfil/dados')?>" method="post" class="form-horizontal">
                    <p>Digite sua senha atual para confirmar a alteração.</p>
                    <input type="hidden" name="nome" id="nomenovo">
                    <input type="hidden" name="email" id="emailnovo">
                    <div class="form-group">

                        <div class="col-md-12">
                            <input type="password" name="senhaatual" autocomplete="off" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-outline btn-rounded" onclick="document.formaltdados.submit();">Alterar</button>
                <button type="button" class="btn btn-danger btn-outline btn-rounded" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<script>
    

    $('#modal-dados').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var modal = $(this)
        modal.find('.modal-body form input#emailnovo').val(document.getElementById('emailantigo').value)
        modal.find('.modal-body form input#nomenovo').val(document.getElementById('nomeantigo').value)
    })

    $('#modal-senha').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var modal = $(this)
        modal.find('.modal-body form input#senhamodal').val(document.getElementById('conf_senha').value)
    })

    function verifica(){
        if($("#senha").val() == $("#conf_senha").val()){
            $("#pwmatch").removeClass("glyphicon-remove");
            $("#pwmatch").addClass("glyphicon-ok");
            $("#pwmatch").css("color","#00A41E");
            $('#btnalterar').attr('disabled', false);
        }else{
            $('#btnalterar').attr('disabled', true);
            $("#pwmatch").removeClass("glyphicon-ok");
            $("#pwmatch").addClass("glyphicon-remove");
            $("#pwmatch").css("color","#FF0004");
        }
    }
</script>