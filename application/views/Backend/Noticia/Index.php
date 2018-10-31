<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-8">
                    <h4 class="page-title">Minhas Noticias</h4>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                    <a href="<?=base_url('Backend/Noticia/adicionar')?>" class="btn btn-rounded btn-outline btn-success pull-right">Nova noticía</a>

                </div>
            </div>

            <div class="white-box col-sm-12 ">
                
               <div class="table-responsive">
                <?php if($type != null): ?>
                   <div class="col-sm-12 <?=$type?>">
                       <strong><?=$titulo?></strong> <?=$mensage?>
                   </div>
                   <?php endif; ?>
                   
                   <table class="table">
                       <thead>
                           <tr>
                               <th>TITULO</th>
                               <th>AUTOR</th>
                               <th>AÇÃO</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($noticias as $not): ?>
                              <tr>
                                   <td><?=$not->not_titulo?></td>
                                   <td><?=$not->not_autor?></td>
                                   <td>
                                       <a href="<?= base_url('Backend/Noticia/ativa')."?id=".$not->not_id ?>" class="btn btn-rounded <?php echo $not->not_ativo%2!=0 ? 'btn-success':'btn-danger' ?> btn-outline "><?php echo $not->not_ativo%2!=0 ? 'Ativado':'Desativado' ?></a>
                                       <a href="<?=base_url('Backend/Noticia/alterar')."?id=".$not->not_id?>" class="btn btn-rounded btn-info btn-outline" title="Editar"><i class="fa fa-edit"></i></a>
                                       <button class="btn btn-rounded btn-danger btn-outline" data-toggle="modal" data-nome="<?=$not->not_titulo?>" data-id="<?=$not->not_id?>" data-target="#modal-excluir" title="Deletar cadastro"><i class="fa fa-trash"></i></button>
                                   </td>
                               </tr>
                           <?php endforeach; ?>
                       </tbody>
                   </table>
                           <?php if(!$noticias) echo "<br><p class='text-center'>Nenhum arquivo cadastrado</p>"; ?></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Confirmação de exclusão</h4>
            </div>
            <div class="modal-body">
             <p>Deseja excluir "<i id="nome"></i>" ?</p>
             <form name="formdeletar" action="<?=base_url('Backend/Noticia/deletar')?>" method="POST">
                 <input type="hidden" name="id_noticia" id="id_deletar">
             </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-outline btn-rounded" onclick="document.formdeletar.submit();">Deletar</button>
            <button type="button" class="btn btn-success btn-outline btn-rounded" data-dismiss="modal">Fechar</button>
        </div>
    </div>
</div>
</div>



<script>

    $('#modal-excluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var nome = button.data('nome') 
        var id = button.data('id')

        var modal = $(this)
        modal.find('.modal-body p i').text(nome)
        modal.find('.modal-body form input').val(id)

    })

    $('#editar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var titulo = button.data('titulo')
        var autor = button.data('autor')
        var texto = button.data('texto')
        
        var modal = $(this)
        modal.find('.modal-body form #titulo').val(titulo)
        modal.find('.modal-body form #autor').val(autor)
        modal.find('.modal-body form #texto').val(texto)

    })

    

    var editores = Array('edt1','edt2');
    $.each(editores, function (i, editor) {
        CKEDITOR.replace('editor', {
            toolbarGroups: [
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { name: 'forms', groups: [ 'forms' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'insert', groups: [ 'insert' ] }
            ]
        });
    });


</script>