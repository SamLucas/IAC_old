

<style>

.text-sobre {
    text-align: justify;
    padding: 0 40px;
    line-height: 2;
}
.text-sobre-celular {
    text-align: justify;
    line-height: 2;
}
.title{ margin-bottom: 40px;}
.text-center a {color: var(--corpadrao)}
.form-group {
    margin-top: 20px;
    position: relative;
    display: flex;
    height: 45px;
    float: left;
    width: 100%;
}
.form-group::after {
    height: 2px; 
    background:#0091FF; 
    position: absolute; 
    left:0; 
    bottom:0; 
    content: ''; 
    transform: scaleX(0); 
    transition: ease-in-out 240ms all;
}
.form-group.focused::after {
    transform:scaleX(1);
}
.control-label {
    opacity: 0.4;
    pointer-events: none;
    position: absolute;
    transform: translate3d(5px, 22px, 0) scale(1);
    transform-origin: left top;
    transition: 240ms;
    margin-top: -10px;
    font-size: 16px;
}
.control-label-texarea {
    font-size: 16px;
    opacity: 0.4;
    pointer-events: none;
    position: absolute;
    transform: translate3d(5px, 22px, 0) scale(1);
    transform-origin: left top;
    transition: 240ms;
    margin-top: -50px;
    margin-bottom: 40px;
    border-color: rgba(0,0,0,0.4);
}
.form-group.focused .control-label, .form-group-select.focused .control-label, .form-group.focused .control-label-texarea {
    opacity: 1;
    transform: scale(0.75);
    color: var(--corpadrao);
    border-color: rgba(0,0,0,0.4);
}
.form_campos {
    height: 31px;
    color: #484848;
    align-self: flex-end;
    padding: 5px;
    outline: none;
    border: 0 solid rgba(0,0,0,0.4);
    border-bottom-width: 1px;
    background: transparent;
    border-radius: 0;
}
.form_campos:hover, .form_campos:focus {
    border-color: var(--corpadrao)/*#0091FF*/;
}
.form_disabled, .form_disabled:hover, .form_disabled:focus {
    border-color: rgba(0,0,0,0.4);
}
input {
    width: 100%;
}

</style>



<div class="container computador" style="margin-bottom: 20px;margin-top: 10px;">
    <div class="row">
        <div class="col-md-8" >

            <?php foreach ($dados as $dad): ?>
                <h4 class="computador text-center title" style="margin-top: 40px;"><?= $dad->perfil_titulo ?></h4>
                <h4 class="celular text-center title"><?= $dad->perfil_titulo ?></h4>
                <style> p {text-indent: 20px; margin: 0 auto; } </style>	
                <div class="text-sobre"><?= $dad->perfil_textocontato ?></div>
                <p class="text-center" style="margin-top: 20px;padding: 0 40px;">
                    <strong>
                        <a href="<?= $dad->perfil_lates ?>">Grupo de Pesquisas Informática Aplicada às Ciências no Lattes</a>
                    </strong>
                </p>

            <?php endforeach; ?>
        </div>
        <div class="col-md-4">

            <?php if(isset($type)): ?>
                <div class="col-sm-12 <?=$type?>">
                    <strong><?=$titulo?></strong> <?=$mensage?>
                </div>
            <?php endif; ?>

            <h3 class="text-center">Formulário para contato</h3><br>
            <div class="pc" padding: 30px;">
                <form action="<?= base_url('Frontend/Contato/mensagem'); ?>" method="post">
                    <div class='form-group' style="margin-top: -30px;">
                        <label class='control-label' for='nome'>Nome</label>
                        <input type='text' class='form_campos' pattern="[A-Z,a-z\s]+$" id='nome' name='nome'>
                        <!-- <span class="">Digite apenas letras.</span> -->
                    </div>
                    <div class='form-group'>
                        <label class='control-label' for='email'>E-mail</label>
                        <input type='text' class='form_campos' id='email' pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" name='email'>
                        <!-- <span class="">Digite apenas letras.</span> -->
                    </div>
                    <div class='form-group'>
                        <label class="control-label" for="assunto">Assunto</label>
                        <input type="text" class="form_campos" id="assunto" name='assunto'>
                    </div>
                    <div class="form-group" style="margin-top: 50px;">
                        <label class="control-label-texarea" for="exampleTextarea">Mensagem</label>
                        <textarea class="form-control form_campos" id="exampleTextarea" rows="3" name="mensagem"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success col-md-12" style="margin-top: 10px;">Enviar</button>
                </form>
            </div>
        </div>

    </div>
    

</div>
<div class="container celular" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12" >
            <?php foreach ($dados as $dad): ?>
                <h4 class="computador text-center title" style="margin-top: 40px;"><?= $dad->perfil_titulo ?></h4>
                <h4 class="celular text-center title"><?= $dad->perfil_titulo ?></h4>
                <style> p {text-indent: 20px; margin: 0 auto; } </style>    
                <div class="text-sobre-celular"><?= $dad->perfil_textocontato ?></div>
                <p class="text-center" style="margin-top: 20px;padding: 0 40px;"><strong><a href="<?= $dad->perfil_lates ?>">Grupo de Pesquisas Informática Aplicada às Ciências no Lattes</a></strong></p>.
            <?php endforeach; ?>

            <?php if(isset($type)): ?>
                <div class="col-sm-12 <?=$type?>">
                    <strong><?=$titulo?></strong> <?=$mensage?>
                </div>
            <?php endif; ?>
            
            <form action="<?= base_url('Frontend/Contato/mensagem'); ?>" method="post">
                <br><h3 class="text-center">Formulário para contato</h3>
                <div class='form-group'>
                    <label class='control-label' for='nome'>Nome</label>
                    <input type='text' class='form_campos' pattern="[A-Z,a-z\s]+$" id='nome' name='nome'>
                    <!-- <span class="">Digite apenas letras.</span> -->
                </div>
                <div class='form-group'>
                    <label class='control-label' for='email'>E-mail</label>
                    <input type='text' class='form_campos' id='email' pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" name='email'>
                    <!-- <span class="">Digite apenas letras.</span> -->
                </div>
                <div class='form-group'>
                    <label class="control-label" for="assunto">Assunto</label>
                    <input type="text" class="form_campos" id="assunto" name='assunto'>
                </div>
                <div class="form-group" style="margin-top: 50px;">
                    <label class="control-label-texarea" for="exampleTextarea">Mensagem</label>
                    <textarea class="form-control form_campos" id="exampleTextarea" rows="3" name="mensagem"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>
